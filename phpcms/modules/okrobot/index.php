<?php
defined('IN_PHPCMS') or exit('No permission resources.');
require_once (dirname(__FILE__) . '/OKCoin/OKCoin.php');
const API_KEY = "7573fd61-7b8a-4132-814b-9536325c8460";
const SECRET_KEY = "461D47D0FE52B28288E1285D8D899812";
const DOWNLINE=3600;//初始化止损值
const UPLINE=10000;//止盈值
const UPRATE=0.35;//上浮率
const DOWNRATE=0.25;//下浮动率
const UNIT=0.2;//下单单位
const UNITRATE=0.5;//买入，卖出对价值波动的比率
const KLINETYPE="30min";//kline的周期
const SMSUSERNAME="kaleozhou";//短信用户名
const SMSPASSWORD="zh13275747670";//短信密码
const SMSPHONE="13635456575";//短信手机号
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
        $refresh=refresh_userinfo();
        $autoresult=autotrade();
        $str="|";
        if ($autoresult!='upline'&&$autoresult!='downline') {
            // code...
            //取得用户信息
            $data="asset_net,asset_total,free_cny,free_btc";
            $newuserinfo=$this->userinfo_db->get_one('',$data,'id desc');
            foreach ($newuserinfo as $key=>$value) {
                // $str=$str.$key.":".$value."|";
                $str=$str.$key.':'.$value."|";
            }
            //取得行情信息
            $newticker=$this->ticker_db->get_one('','*','id desc');
            $str=$str.'最新价:'."price:".$newticker['last_price']."|";
            //取得设置信息
            $newset=$this->set_db->get_one('','*','id desc');
            $str=$str.'上次成交价:'.$newset['my_last_price']."|";
            $str=$str.'波动:'.$newset['n_price']."|";
            $dif=$newticker['dif_price'];
            $dif=substr($dif,0,6);
            $str=$str.'差价:'.$dif."|";
            $str=$str."\n";
        }
        else
        {
            $str='已经达到止盈线！';
            if ($autoresult=='downline') {
                $str='已经达到止损线！';
            }
        }
        printf($str);
    }
}
