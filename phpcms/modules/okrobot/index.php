<?php
defined('IN_PHPCMS') or exit('No permission resources.');
require_once (dirname(__FILE__) . '/OKCoin/OKCoin.php');
const API_KEY = "7573fd61-7b8a-4132-814b-9536325c8460";
const SECRET_KEY = "461D47D0FE52B28288E1285D8D899812";
class index {
    private $userinfo_db;
    function __construct() {
           //加载model
        $this-> userinfo_db=pc_base::load_model('okrobot_userinfo_model');
        $this-> ticker_db=pc_base::load_model('okrobot_ticker_model');
        $this-> orderinfo_db=pc_base::load_model('okrobot_orderinfo_model');
        $this-> trade_db=pc_base::load_model('okrobot_trade_model');
        $this-> set_db=pc_base::load_model('okrobot_set_model');
        $this-> kline_db=pc_base::load_model('okrobot_kline_model');
        pc_base::load_app_func('global','okrobot');
    }
    public function init() 
    {
            $res=refresh_userinfo();
            $res=autotrade();
            //取得用户信息
            $data="asset_net,asset_total,free_cny,free_btc";
            $newuserinfo=$this->userinfo_db->get_one('',$data,'id desc');
            $str="";
            foreach ($newuserinfo as $key=>$value) {
                // code...
                $str=$str.$key.":".$value."|";
            }
            //取得行情信息
            $newticker=$this->ticker_db->get_one('','*','id desc');
            $str=$str."price:".$newticker['lastprice']."|";
            //取得设置信息
            $newset=$this->set_db->get_one('','*','id desc');
            $str=$str."baseprice:".$newset['base_price']."|";
            $str=$str.$newticker['base_rate']."|";
            //取得kline信息
            $newkline=$this->kline_db->get_one('','*','id desc');
            $str=$str."dif".$newkline['dif_price']."|";
            $str=$str."\n";
            printf($str);
    }
}
