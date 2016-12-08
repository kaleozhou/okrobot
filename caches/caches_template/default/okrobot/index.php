<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="refresh" content="5">
        <title>okcoin 自动交易机器人</title>
<style type="text/css">

td.red {color: red;}


</style>
    </head>
    <body>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=1face9ff443e500ab787ea8220704cc5&sql=SELECT+%2A+FROM+phpcms_okrobot_userinfo+where+id%3D%28select+max%28id%29+from+phpcms_okrobot_userinfo%29&cache=0&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_okrobot_userinfo where id=(select max(id) from phpcms_okrobot_userinfo) LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <h5>我的资产</h5>
        <table border="1">
        <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        <td class="red">净资产：<?php echo $val['asset_net'];?></td>
        <td>总资产：<?php echo $val['asset_total'];?></td>
        <td>可用人民币：<?php echo $val['free_cny'];?></td>
        <td>可用btc：<?php echo $val['free_btc'];?></td>
        <td>冻结人民币：<?php echo $val['freezed_cny'];?></td>
        <td>冻结btc：<?php echo $val['freezed_btc'];?></td>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </table>
        <table border="1">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=783a94a6b56b8b35a46f6965c048f715&sql=SELECT+%2A+FROM+phpcms_okrobot_set+where+id%3D%28select+max%28id%29+from+phpcms_okrobot_set%29&cache=0&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_okrobot_set where id=(select max(id) from phpcms_okrobot_set) LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        <td class="red">基准价：<?php echo $val['base_price'];?></td>
        <td>上浮动率：<?php echo $val['uprate'];?></td>
        <td>下浮动率：<?php echo $val['uprate'];?></td>
        <td>时间：<?php echo $val['create_date'];?></td>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </table>
        <h5>市场行情</h5>
        <table border="1">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=95e1efc0face06f9c57043281fef89e6&sql=SELECT+%2A+FROM+phpcms_okrobot_ticker+where+id%3D%28select+max%28id%29+from+phpcms_okrobot_ticker%29&cache=0&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_okrobot_ticker where id=(select max(id) from phpcms_okrobot_ticker) LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        <td class="red">最新成交价：<?php echo $val['lastprice'];?></td>
        <td>买一价：<?php echo $val['buy'];?></td>
        <td>卖一价：<?php echo $val['sell'];?></td>
        <td>最高价：<?php echo $val['high'];?></td>
        <td>最低价：<?php echo $val['low'];?></td>
        <td>偏离率：<?php echo $val['base_rate'];?></td>
        <td>24小时成交量：<?php echo $val['vol'];?></td>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </table>
        <h5>前一小时统计</h5>
        <table border="1">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=da7661c457ceb91c0cbc15319baef782&sql=SELECT+%2A+FROM+phpcms_okrobot_kline+where+id%3D%28select+max%28id%29+from+phpcms_okrobot_kline%29&cache=0&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_okrobot_kline where id=(select max(id) from phpcms_okrobot_kline) LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        <td class="red">最高价：<?php echo $val['high_price'];?></td>
        <td class="red">最低价：<?php echo $val['low_price'];?></td>
        <td class="red">差价：<?php echo $val['dif_price'];?></td>
        <td>时间：<?php echo $val['create_date'];?></td>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </table>
        <h5>我的订单</h5>
        <table border="1">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=ab3dd3642c48c5639c1fa511de6a6136&sql=SELECT+%2A+FROM+phpcms_okrobot_orderinfo+where+status%21%3D%27-1%27+order+by+id+desc&cache=0&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_okrobot_orderinfo where status!='-1' order by id desc LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        <tr>
            <td> 订单id：<?php echo $val['order_id'];?></td>
            <td>委托数量：<?php echo $val['amount'];?></td>
            <td>委托价格：<?php echo $val['price'];?></td>
            <td>成交数量：<?php echo $val['deal_amount'];?></td>
            <td>平均成交价：<?php echo $val['avg_price'];?></td>
            <td>委托类型：<?php echo $val['ordertype'];?></td>
            <td>委托时间：<?php echo $val['create_date'];?></br>
        </tr>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </table>


    </body>
</html>
