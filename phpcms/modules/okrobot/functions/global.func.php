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
    //加载model
    $userinfo_db=pc_base::load_model('okrobot_userinfo_model');
    $ticker_db=pc_base::load_model('okrobot_ticker_model');
    $orderinfo_db=pc_base::load_model('okrobot_orderinfo_model');
    $trade_db=pc_base::load_model('okrobot_trade_model');
    $set_db=pc_base::load_model('okrobot_set_model');
    $kline_db=pc_base::load_model('okrobot_kline_model');
    $ticker=array();
    $ticker['buy']=$result->ticker->buy;
    $ticker['high']=$result->ticker->high;
    $ticker['last_price']=$result->ticker->last;
    $ticker['low']=$result->ticker->low;
    $ticker['sell']=$result->ticker->sell;
    $ticker['vol']=$result->ticker->vol;
    //计算偏移率
    $newkline=$kline_db->get_one('','*','id desc');
    $newset=$set_db->get_one('','*','id desc');
    $last_price=$ticker['last_price'];
    $my_last_price=$newset['my_last_price'];
    $n_price=$newset['n_price'];
    if($my_last_price!=0){
        $base_rate=($last_price-$my_last_price)/$my_last_price;
    }
    $ticker['base_rate']=$base_rate;
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
//将数据转换成kline数据
function object_kline($result){
    $klines=array();
    $kline=array();
    $i=0;
    foreach ($result as $reskline) {
        //取出每个kline
        $kline['create_date']=date("Y/m/d H:i:s",substr($reskline[0],0,strlen($reskline[0])-3));  
        $kline['start_price']=$reskline[1];
        $kline['high_price']=$reskline[2];
        $kline['low_price']=$reskline[3];
        $kline['over_price']=$reskline[4];
        $kline['vol']=$reskline[5];
        $kline['dif_price']=$kline['high_price']-$kline['low_price'];
        $klines[$i]=$kline;
        $i++;
    }
    return $klines;
}
//下单函数
function autotrade(){
    try{
        //加载model
        $userinfo_db=pc_base::load_model('okrobot_userinfo_model');
        $ticker_db=pc_base::load_model('okrobot_ticker_model');
        $orderinfo_db=pc_base::load_model('okrobot_orderinfo_model');
        $trade_db=pc_base::load_model('okrobot_trade_model');
        $set_db=pc_base::load_model('okrobot_set_model');
        $trend_db=pc_base::load_model('okrobot_trend_model');
        $kline_db=pc_base::load_model('okrobot_kline_model');
        //创建OKCoinapt客户端
        $client = new OKCoin(new OKCoin_ApiKeyAuthentication(API_KEY, SECRET_KEY));
        //获取当前行情和基最新成交价价
        $newticker=$ticker_db->get_one('','*','id desc');
        $last_price=$newticker['last_price'];
        //获取kline前一小时的记录
        $newkline=$kline_db->get_one('','*','id desc');
        $base_dif=$newkline['dif_price'];
        //获取趋势
        $newtrend=$trend_db->get_one('','*','id desc');
        $last_trade_type=$newtrend['last_trade_type'];
        $last_trade_hits=$newtrend['last_trade_hits'];
        //获取设置
        $newset=$set_db->get_one('','*','id desc');
        $my_last_price=$newset['my_last_price'];
        $unit=$newset['unit'];
        $n_price=$newset['n_price'];
        $uprate=$newset['uprate'];
        $downrate=$newset['downrate'];
        //获取当前用户信息
        $newuserinfo=$userinfo_db->get_one('','*','id desc');
        $free_cny=$newuserinfo['free_cny'];
        $free_btc=$newuserinfo['free_btc'];
        $freezed_btc=$newuserinfo['freezed_btc'];
        $asset_total=$newuserinfo['asset_total'];
        $asset_net=$newuserinfo['asset_net'];
        //创建订单
        $trade=array();
        //判断接下来是买还是卖
        $dif=$last_price - $my_last_price;
        $autoresult_order_id="";
        //设置止盈止损
        $downline=DOWNLINE;
        $upline=UPLINE;
        //创建趋势单
        $trend=array();
        if ($asset_net>$downline&&$asset_net<$upline)
        {
            if ($dif>0)
            {
                //应该价格在上升，下卖单
                //判断是否达到触发值
                //如果当前价格$last_price低于$my_last_price价值波动一个$n_price,
                if(abs($dif)>=UNITRATE*$n_price)
                {
                    //计算卖出btc的数量
                    $amount=UNIT*$free_btc;
                    //判断是否是连击,如果是则
                    if ($last_trade_type=='up_1') {
                        if ($last_trade_hits>1) {
                            $amount=UNIT*$free_btc*$last_trade_hits;   
                        }
                        $trend['last_trade_hits']=$last_trade_hits+1;
                    }
                    if ($amount>$free_btc) {
                        $amount=$free_btc;
                    }
                    if($amount>0.01&&$amount<=$free_btc)
                    {
                        $symbol='btc_cny';
                        $tradetype='sell_market';
                        $params = array('api_key' => API_KEY, 'symbol' => $symbol, 'type' => $tradetype,  'amount' => $amount);
                        $result = $client->tradeApi($params);
                        //插入数据库
                        $trade['amount']=$amount;
                        $trade['symbol']=$symbol;
                        $trade['tradetype']=$tradetype;
                        $trade['result']=strval($result->result);
                        $trade_db->insert($trade,true);
                        //插入trend的
                        $trend['last_trade_type']='up_1';
                        $trend['last_trade_hits']=1;
                        $trend['create_date'] =date("Y/m/d H:i:s");
                        $trend_db->insert($trend,true); 
                    }
                    else
                    {
                        //判断是否是连击
                        $price=60;
                        if ($last_trade_type=='up_2') {
                            if ($last_trade_hits>1) {
                                $price=$free_cny;
                            }
                            $trend['last_trade_hits']=$last_trade_hits+1;
                        }
                        $symbol='btc_cny';
                        $tradetype='buy_market';
                        $params = array('api_key' => API_KEY, 'symbol' => $symbol, 'type' => $tradetype,  'price' => $price);
                        $result = $client -> tradeApi($params);
                        //插入数据库
                        $trade['price']=$price;
                        $trade['symbol']=$symbol;
                        $trade['tradetype']=$tradetype;
                        $trade['result']=strval($result->result);
                        $trade_db->insert($trade,true);
                        //插入trend的
                        $trend['last_trade_type']='up_2';
                        $trend['last_trade_hits']=1;
                        $trend['create_date'] =date("Y/m/d H:i:s");
                        $trend_db->insert($trend,true); 
                    }
                }
            }
            else
            {
                //价格在下降，买单
                //判断是否达到出发值
                if(abs($dif)>=UNITRATE*$n_price)
                {
                    //计算买入金额
                    $price=UNIT*$free_cny;
                    //判断是否是连击,如果是则
                    if ($last_trade_type=='down_1') {
                        if ($last_trade_hits>1) {
                            $price=UNIT*$free_cny*$last_trade_hits;   
                        }
                        $trend['last_trade_hits']=$last_trade_hits+1;
                    }
                    if ($price>$free_cny) {
                        // 如果大于证明偏离过大
                        $price=$free_cny;
                    }
                    if($price>=60&&$price<=$free_cny)
                    {
                        $symbol='btc_cny';
                        $tradetype='buy_market';
                        $params = array('api_key' => API_KEY, 'symbol' => $symbol, 'type' => $tradetype,  'price' => $price);
                        $result = $client -> tradeApi($params);
                        //插入数据库
                        $trade['price']=$price;
                        $trade['symbol']=$symbol;
                        $trade['tradetype']=$tradetype;
                        $trade['result']=strval($result->result);
                        $trade_db->insert($trade,true);
                        //插入trend的
                        $trend['last_trade_type']='down_1';
                        $trend['last_trade_hits']=1;
                        $trend['create_date'] =date("Y/m/d H:i:s");
                        $trend_db->insert($trend,true); 
                    }
                    else if($price<60)
                    {
                        //卖出0.01btc比更新价格
                        $amount=0.01;
                        //判断是否是3连击,如果是则
                        if ($last_trade_type=='down_2') {
                            if ($last_trade_hits>1) {
                                $amount=$free_btc;   
                            }
                            $trend['last_trade_hits']=$last_trade_hits+1;
                        }
                        $symbol='btc_cny';
                        $tradetype='sell_market';
                        $params = array('api_key' => API_KEY, 'symbol' => $symbol, 'type' => $tradetype,  'amount' => $amount);
                        $result = $client->tradeApi($params);
                        //插入数据库
                        $trade['amount']=$amount;
                        $trade['symbol']=$symbol;
                        $trade['tradetype']=$tradetype;
                        $trade['result']=strval($result->result);
                        $trade_db->insert($trade,true);
                        //插入trend的
                        $trend['last_trade_type']='down_2';
                        $trend['last_trade_hits']=1;
                        $trend['create_date'] =date("Y/m/d H:i:s");
                        $trend_db->insert($trend,true); 
                    }
                }
            }
        }
        else
        {
            //卖出所有的币止损
            $price=$free_cny;
            if($price>=60&&$price<=$free_cny)
            {
                $symbol='btc_cny';
                $tradetype='buy_market';
                $params = array('api_key' => API_KEY, 'symbol' => $symbol, 'type' => $tradetype,  'price' => $price);
                $result = $client -> tradeApi($params);
                //插入数据库
                $trade['price']=$price;
                $trade['symbol']=$symbol;
                $trade['tradetype']=$tradetype;
                $trade['result']=strval($result->result);
                $trade_db->insert($trade,true);
                //插入trend的
                $trend['last_trade_type']='down_1';
                $trend['last_trade_hits']=1;
                $trend['create_date'] =date("Y/m/d H:i:s");
                $trend_db->insert($trend,true); 
            }
            //停止工作
            $autoresult_order_id='upline';
            if ($asset_net<=DOWNLINE) {
                $autoresult_order_id='downline';
            }
        }
        return $autoresult_order_id;
    }catch(Exception $e)
    {
        return $e;
    }
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
        $trend_db=pc_base::load_model('okrobot_trend_model');
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
        //获取用户的订单信息
        // $params = array('api_key' => API_KEY, 'symbol' => 'btc_cny', 'order_id' => -1);
        // $result = $client -> orderInfoApi($params);
        //批量获取用户订单
        $params = array('api_key' => API_KEY, 'symbol' => 'btc_cny', 'status' => 1, 'current_page' => '1', 'page_length' => '15');
        $result = $client -> orderHistoryApi($params);
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
        //获取比特币5分钟k线图数据20条
        $type=KLINETYPE;
        $params = array('symbol' => 'btc_cny', 'type' =>$type, 'size' => 20);
        $result = $client -> klineDataApi($params);
        $klines=object_kline($result);
        if (count($klines)>0) {
            foreach ($klines as $key) {
                //如果时间戳相等，不插入否则插入
                $where=array('create_date'=>$key['create_date']);
                $rs=$kline_db->select($where);
                if(empty($rs))
                {
                    //插入数据库
                    $res=$kline_db->insert($key,true);
                    //计算除平均值添加近基准价格中
                }
            }
        }
        //更新上次设置set，上次成交价my_last_price，成交单位unit，价值波动n_price
        $set=array();
        //获取上次成交金额
        $where=array('status'=>'2');
        $lastorder=$orderinfo_db->get_one($where,'*','create_date desc');
        $set['my_last_price']=$lastorder['avg_price'];
        //根据kline计算价值波数值20条信息
        //$n_price=$kline_db->query("select avg(dif_price)from v9_okrobot_kline order by id desc limit 0,20");
        $avgarray=$kline_db->select('','AVG(dif_price)','0,20','id desc');
        $n_price=$avgarray[0]['AVG(dif_price)'];
        $set['n_price']=$n_price;
        $set['uprate']=UPRATE;
        $set['unit']=UNIT;
        $set['downrate']=DOWNRATE;
        $set['create_date']=$key['create_date'];
        $set_db->insert($set,true);
        return $res;
    }
    catch (Exception $e)
    {
        printf("更新用户信息超时！");
        return 1;
    }
}
?>
