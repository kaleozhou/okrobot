<?php 
//将获取的数据转换成userinfo数据
function object_userinfo($result){
    $userinfo=array();
    $userinfo['asset_net']=$result->info->funds->asset->net;
    $userinfo['asset_total']=$result->info->funds->asset->total;
    $userinfo['borrow_btc']=$result->info->funds->borrow->btc;
    $userinfo['borrow_cny']=$result->info->funds->borrow->cny;
    $userinfo['borrow_ltc']=$result->info->funds->borrow->ltc;
    $userinfo['free_btc']=$result->info->funds->free->btc;
    $userinfo['free_cny']=$result->info->funds->free->cny;
    $userinfo['free_ltc']=$result->info->funds->free->ltc;
    $userinfo['freezed_btc']=$result->info->funds->freezed->btc;
    $userinfo['freezed_cny']=$result->info->funds->freezed->cny;
    $userinfo['freezed_ltc']=$result->info->funds->freezed->ltc;
    $userinfo['union_fund']=date("Y/m/d H:i:s");
    return $userinfo;
} 
//将数据转换成ticker数据
function object_ticker($result){
    $ticker=array();
    $ticker['buy']=$result->ticker->buy;
    $ticker['high']=$result->ticker->high;
    $ticker['lastprice']=$result->ticker->last;
    $ticker['low']=$result->ticker->low;
    $ticker['sell']=$result->ticker->sell;
    $ticker['vol']=$result->ticker->vol;
    $ticker['tickerdate']=date("Y/m/d H:i:s");
    return $ticker;
}
//将数据转换成orderinfo数据
function object_orderinfo($result){
    $orderinfo=array();
    $orders=array();
    $ordersresult=$result->orders;
    $i=0;
    foreach ($ordersresult as $key) {
        //取出api结果
        $orderinfo['amount']=$key->amount;  
        $orderinfo['deal_amount']=$key->deal_amount;  
        $orderinfo['avg_price']=$key->avg_price;
        //由于获取的是java时间戳，去掉后三位  
        $orderinfo['create_date']=date("Y/m/d H:i:s",substr($key->create_date,0,strlen($key->create_date)-3));  
        $orderinfo['order_id']=$key->order_id;  
        $orderinfo['price']=$key->price;  
        $orderinfo['status']=$key->status;  
        $orderinfo['symbol']=$key->symbol;  
        $orderinfo['ordertype']=$key->type;  
        $orders[$i]=$orderinfo;
        $i++;
    }
    return $orders;
}
//将数据转换成trade数据
function object_trade($result){
    $trade=array();
    $trade['buy']=$result->trade->buy;
    $trade['high']=$result->trade->high;
    $trade['last']=$result->trade->last;
    $trade['low']=$result->trade->low;
    $trade['sell']=$result->trade->sell;
    $trade['vol']=$result->trade->vol;
    return $trade;
}
//将数据转换成kline数据
function object_kline($result){
    $kline=array();
    if(!empty($result[0][1]))
    {

        $kline['create_date']=date("Y/m/d H:i:s",substr($result[0][0],0,strlen($result[0][0])-3));  
        $kline['start_price']=$result[0][1];
        $kline['high_price']=$result[0][2];
        $kline['low_price']=$result[0][3];
        $kline['over_price']=$result[0][4];
        $kline['vol']=$result[0][5];
    }

    return $kline;
}
//刷新数据
function refresh_userinfo(){
    try{
        //加载model
        $userinfo_db=pc_base::load_model('okrobot_userinfo_model');
        $ticker_db=pc_base::load_model('okrobot_ticker_model');
        $orderinfo_db=pc_base::load_model('okrobot_orderinfo_model');
        $trade_db=pc_base::load_model('okrobot_trade_model');
        $set_db=pc_base::load_model('okrobot_set_model');
        $kline_db=pc_base::load_model('okrobot_kline_model');
        //创建OKCoinapt客户端
        $client = new OKCoin(new OKCoin_ApiKeyAuthentication(API_KEY, SECRET_KEY));
        //获取用户信息
        $params = array('api_key' => API_KEY);
        $result = $client -> userinfoApi($params);
        $userinfo=object_userinfo($result);
        $res=$userinfo_db->insert($userinfo,true);
        //获取OKCoin行情（盘口数据）
        $params = array('symbol' => 'btc_cny');
        $result = $client -> tickerApi($params);
        $ticker=object_ticker($result);
        $res=$ticker_db->insert($ticker,true);
        //$newid=$userinfo_db->insert_id();
        //净资产，总资产，可用资金，冻结资金
        // $newuserinfo=$userinfo_db->get_one($newid);
        //获取用户的订单信息
        $params = array('api_key' => API_KEY, 'symbol' => 'btc_cny', 'order_id' => -1);
        $result = $client -> orderInfoApi($params);
        $orders=object_orderinfo($result);
        //将订单插入数据库
        if(count($orders)>0){
            foreach ($orders as $key) {
                // 验证数据库是否存在存在
                $where=array('order_id'=>$key['order_id']);
                $rs=$orderinfo_db->select($where);
                if (empty($rs)) {
                    // 如果空插入数据
                    $orderinfo_db->insert($key,true);
                }
                else {
                    //更新数据
                    $orderinfo_db->update($key,$where);
                }
            }
        }else {
            $data=array('status'=>'-1');
            $orderinfo_db->update($data,true);
        }
        //获取比特币上一小时的k线图数据
        $params = array('symbol' => 'btc_cny', 'type' => '1hour', 'size' => 2);
        $result = $client -> klineDataApi($params);
        $kline=object_kline($result);
        //如果时间戳相等，不插入否则插入
        $where=array('create_date'=>$kline['create_date']);
        $rs=$kline_db->select($where);
        if(empty($rs))
        {
            //插入数据库
            $res=$kline_db->insert($kline,true);
            //计算除平均值添加近基准价格中
            $set=array();
            $set['base_price']=strval((floatval($kline['high_price'])+floatval($kline['low_price']))/2);
            $set['uprate']=$set['downrate']="0.005";
            $set['create_date']=date("Y/m/d H:i:s");
            $set_db->insert($set,true);

        }
        //判断当前价高根据策略算出下单金额及类型
        //
        
        if($res)
        {
            return 0;
        }
        else {
            // code... 
            return 1;
        }
    }
    catch (Exception $e)
    {
        printf("更新用户信息超时！");
        return 1;
    }
}
?>
