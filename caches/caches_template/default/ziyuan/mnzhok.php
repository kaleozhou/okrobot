<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>申请模拟提交成功</title>

<style type="text/css">

<!--

.STYLE1 {

color: #FFFF00;

font-size: 20px;

font-weight: bold;


}

.STYLE2 {

color: #0000FF;

font-size: 16px;

font-weight: bold;

font-family: "宋体";


}



body { font:Arial, Helvetica, sans-serif; font-size:12px; }

.STYLE3 {

font-family: "宋体";

font-weight: bold;


}

-->

</style>

</head>

<body>
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=89300f39dd9d28eee4c13af1efc180a4&sql=SELECT+%2A+FROM+phpcms_ziyuan+where+id%3D%28select+max%28id%29+from+phpcms_ziyuan%29&cache=0&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM phpcms_ziyuan where id=(select max(id) from phpcms_ziyuan) LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>

 <?php $n=1; if(is_array($data)) foreach($data AS $key => $val) { ?>

    

<table width="660" border="1" align="center" cellpadding="5" cellspacing="0" bordercolor="#FFCC00" bgcolor="#FFFFEC" class="css03">

  <tr>

    <td height="36" colspan="2" align="center" bgcolor="#FF0000"><h1 class="STYLE1">亲爱的<?php echo $val['realname'];?><?php echo $val['sex'];?>，您已成功提交申请信息！请等待工作人员联系！</h1></td>

  </tr>

  

  

  <tr>

    <td width="107" height="25" align="right" bgcolor="#FFFFCC"><span class="STYLE3">您的姓名:</span></td>

    <td width="621" align="left">&nbsp;<?php echo $val['realname'];?></td>

  </tr>

  

   

  

   <tr>

    <td height="25" align="right" bgcolor="#FFFFCC"><span class="STYLE3">称谓:</span></td>

        <td align="left">&nbsp;<?php echo $val['sex'];?></td>

  </tr>

  

  

   <tr>

    <td height="25" align="right" bgcolor="#FFFFCC"><span class="STYLE3">身份证号:</span></td>

    <td align="left">&nbsp;<?php echo $val['pronum'];?></td>

  </tr>

   

    <tr>

    <td height="25" align="right" bgcolor="#FFFFCC"><span class="STYLE3">通讯地址:</span></td>

    <td align="left">&nbsp;<?php echo $val['address'];?></td>

  </tr> 

  <tr>

    <td height="25" align="right" bgcolor="#FFFFCC"><span class="STYLE3">手机号码:</span></td>

    <td align="left">&nbsp;<?php echo $val['tel'];?></td>

  </tr> 



 

  

   <tr>

    <td height="25" align="right" bgcolor="#FFFFCC"><span class="STYLE3">固定电话:</span></td>

    <td align="left">&nbsp;<?php echo $val['tel2'];?></td>

  </tr>

  

  

   <tr>

    <td height="25" align="right" bgcolor="#FFFFCC"><span class="STYLE3">联系QQ:</span></td>

    <td align="left">&nbsp;<?php echo $val['qq'];?></td>

  </tr>

  

  

   <tr>

    <td height="25" align="right" bgcolor="#FFFFCC"><span class="STYLE3">联系邮箱:</span></td>

    <td align="left">&nbsp;<?php echo $val['mail'];?></td>

  </tr>

  
   <tr>
    <td height="25" align="right" bgcolor="#FFFFCC"><span class="STYLE3">投资经验:</span></td>
    <td align="left">&nbsp;<?php echo $val['tzjy_one'];?></td>
  </tr>

  

   <tr>
    <td height="25" align="right" bgcolor="#FFFFCC"><span class="STYLE3">投资额度:</span></td>
    <td align="left">&nbsp;<?php echo $val['zijin'];?></td>
  </tr>

    

  

  <tr>

    <td height="40" colspan="2" align="center"> 

     <span class="STYLE2">请仔细确认以上申请信息，如有错误，请重新提交申请信息！</span></td>

  </tr>

</table>





<table width="750" border="0" align="center" cellpadding="4" cellspacing="0" class="css03">

  <tr>

    <td align="center"><p><a href="javascript:history.go(-1)"><u>点击返回</u></a></p></td>

  </tr>

</table>






 <?php $n++;}unset($n); ?>
 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>





</body>

</html>




