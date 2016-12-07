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
function refresh_userinfo(){
    try{
        $userinfo_db=pc_base::load_model('okrobot_userinfo_model');
        $ticker_db=pc_base::load_model('okrobot_ticker_model');
        $orderinfo_db=pc_base::load_model('okrobot_orderinfo_model');
        $trade_db=pc_base::load_model('okrobot_trade_model');
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
        //   $newid=$userinfo_db->insert_id();
        //净资产，总资产，可用资金，冻结资金
        //   $newuserinfo=$userinfo_db->get_one($newid);
        //获取用户的订单信息
        $params = array('api_key' => API_KEY, 'symbol' => 'btc_cny', 'order_id' => -1);
        $result = $client -> orderInfoApi($params);
        $orders=object_orderinfo($result);
        if(count($orders)>0){
            foreach ($orders as $key) {
                // 验证数据库是否存在存在
                $where=array('order_id'=>$key['order_id']);
                $rs=$orderinfo_db->select($where);
                if (empty($rs)) {
                    // code...
                    $orderinfo_db->insert($key,true);
                }
                else {

                    $orderinfo_db->update($key,$where);
                }
            }
        }else {
            $data=array('status'=>'-1');
            $orderinfo_db->update($data,true);
        }
        if($res){
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
