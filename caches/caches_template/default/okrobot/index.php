<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="refresh" content="2">
        <title>okcoin 自动交易机器人</title>

    </head>
    <body>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=1face9ff443e500ab787ea8220704cc5&sql=SELECT+%2A+FROM+phpcms_okrobot_userinfo+where+id%3D%28select+max%28id%29+from+phpcms_okrobot_userinfo%29&cache=0&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_okrobot_userinfo where id=(select max(id) from phpcms_okrobot_userinfo) LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <h1>我的资产</h1>
        <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        净资产：<?php echo $val['asset_net'];?></br>
        总资产：<?php echo $val['asset_total'];?></br>
        <?php $n++;}unset($n); ?>
        <h1>市场行情</h1>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=95e1efc0face06f9c57043281fef89e6&sql=SELECT+%2A+FROM+phpcms_okrobot_ticker+where+id%3D%28select+max%28id%29+from+phpcms_okrobot_ticker%29&cache=0&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_okrobot_ticker where id=(select max(id) from phpcms_okrobot_ticker) LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        买一价：<?php echo $val['buy'];?></br>
        卖一价：<?php echo $val['sell'];?></br>
        最高价：<?php echo $val['high'];?></br>
        最低价：<?php echo $val['low'];?></br>
        最新成交价：<?php echo $val['lastprice'];?></br>
        24小时成交量：<?php echo $val['vol'];?></br>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <h1>我的订单</h1>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=e1d13fcfdbbf694329d1118a8db5c06a&sql=SELECT+%2A+FROM+phpcms_okrobot_orderinfo+where+status%3D%270%27&cache=0&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_okrobot_orderinfo where status='0' LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        订单id：<?php echo $val['order_id'];?>
        委托数量：<?php echo $val['amount'];?>
        委托价格：<?php echo $val['price'];?>
        成交数量：<?php echo $val['deal_amount'];?>
        平均成交价：<?php echo $val['avg_price'];?>
        委托时间：<?php echo $val['create_date'];?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

    </body>
</html>
