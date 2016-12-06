<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">

        <title>okcoin 自动交易机器人</title>

    </head>
    <body>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=1face9ff443e500ab787ea8220704cc5&sql=SELECT+%2A+FROM+phpcms_okrobot_userinfo+where+id%3D%28select+max%28id%29+from+phpcms_okrobot_userinfo%29&cache=0&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_okrobot_userinfo where id=(select max(id) from phpcms_okrobot_userinfo) LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>
        okcoin 自动交易机器人
        净资产：<?php echo $val['asset_net'];?>
        总资产：<?php echo $val['asset_total'];?>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </body>
</html>
