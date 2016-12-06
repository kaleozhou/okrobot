<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Keywords" content="海南大宗模拟账号" />
<meta name="Description" content="海南大宗模拟账号" />
<meta name="author" content="海南大宗模拟账号" />
<title>申请模拟-海南大宗</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="<?php echo TP;?>css/mnzh.css" media="screen" />
<script type="text/JavaScript">
<!--

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<SCRIPT language=javascript>
function checkform()
{
	var realname=document.form1.realname.value;
	bb=realname.replace(/^\s+|\s+$/g, '');
	if(bb=="" || bb==null)
	{
		alert("姓名栏不能为空,请填写真实姓名");
		document.form1.realname.focus();
		return false;
	}
	if(realname.length<2)
	{
		alert("姓名长度不能少于2位,请填写真实姓名");
		document.form1.realname.focus();
		return false;
	}
	if(realname.length>14)
	{
		alert("姓名长度不能大于14位,请填写真实姓名");
		document.form1.realname.focus();
		return false;
	}
	var pronum=document.form1.pronum.value;;
	bpronum=pronum.replace(/^\s+|\s+$/g, '');
	if(bpronum=="" || bb==null)
	{
		alert("身份证号码不能为空");
		document.form1.pronum.focus();
		return false;
	}
	if(pronum.length<15)
	{
		alert("身份证号码长度不能少于15位");
		document.form1.pronum.focus();
		return false;}
	if(pronum.length>18)
	{
		alert("身份证号码长度不能大于18位");
		document.form1.pronum.focus();
		return false;
	}
	var address=document.form1.address.value;;
	baddress=address.replace(/^\s+|\s+$/g, '');
	if(baddress=="")
	{
		alert("通讯地址不能为空");
		document.form1.address.focus();
		return false;
	}
	if(address.length<2)
	{
		alert("通讯地址长度不能少于2位");
		document.form1.address.focus();
		return false;
	}
	var tel=document.form1.tel.value;
	if(tel=="")
	{
		alert("联系手机不能为空！");
		document.form1.tel.focus();
		return false;
	}
	if(tel.length<11)
	{
		alert("手机号长度不能少于11位");
		document.form1.tel.focus();
		return false;
	}
	if(tel.length>11)
	{
		alert("手机号长度不能大于11位");
		document.form1.tel.focus();
		return false;
	}	
	var reg=/[0-9-]+$/;
	if (!reg.test(tel))
	{
		alert('电话必须为数字!');
		document.form1.tel.focus();
		return false;
	}
	var qq=document.form1.qq.value;;
	bqq=qq.replace(/^\s+|\s+$/g, '');
	if(bqq=="")
	{
		alert("联系QQ不能为空");
		document.form1.qq.focus();
		return false;
	}
	if(qq.length<5)
	{
		alert("QQ号码长度不能少于5位");
		document.form1.qq.focus();
		return false;
	}
	if(qq.length>11)
	{
		alert("QQ号码长度不能大于12位");
		document.form1.qq.focus();
		return false;
	}
        var content=document.form1.content.value;
	if(content.length>50)
	{
		alert("内容字数不得大于50个字符,请简要填写");
		document.form1.content.focus();
		return false;
	}
	return true;
}
//获取多选框的值
function selTzjy(){
	var checkboxs=document.getElementsByName("tzjy_one"); 
	var i;
	var str="";
	var n=1;
	for(i=0;i<checkboxs.length;i++) {
		if(checkboxs[i].type=='checkbox') { 
			if(checkboxs[i].checked==true){
				if(n>1){
					str+=",";
				}
				str+=checkboxs[i].value;
				n++;
			}
		} 
	}
	$("tzjy_one").val(str);
}
</SCRIPT>
</head>
<body id="page">
<div id="container">
<div id="main_content" class="outer">
<div class="html_inner">
<div class="html_content">
<div class="html_left">
<div class="html_login">
<div class="html_widget">
<div class="html_widget_top"></div>
<!-- html_widget_top -->
<div class="html_widget_middle">
<div class="html_inner_container">
<div>请您填写真实、有效的个人信息，您所填写的信息将影响交易帐户的申请及银行卡信息的验证，请务必填写正确！</div>
<form method="post" name="form1" id="form1" onsubmit="return checkform();"action="<?php echo MYFORM;?>mnzh" >
<table class="html_login_table" border="0">
<tbody>
<tr>
<td class="t_left">称　　谓</td>
<td class="t_right">
<span class="STYLE11">
<input type="radio" name="sex" value="先生"  checked="checked"  class="tzjy"/>
先生
<input type="radio" name="sex" value="女士" class="tzjy" />
女士</span></td>
</tr>
<tr>
<td class="t_left">姓　　名<strong> *</strong></td>
<td class="t_right"><input  id="realname" name="realname" placeholder="请输入您的真实姓名"/></td>
</tr>
<tr>
<td class="t_left">证件类型</td>
<td class="t_right">
<select name="product">
  <option value="海南大宗-模拟" selected="selected">身份证</option>
</select>
</td>
</tr>
<tr>
<td class="t_left">证件号码<strong> *</strong></td>
<td class="t_right">
<input id="pronum"  name="pronum"  placeholder="请输入您的证件号码"/>
</td>
</tr>
<tr>
<td class="t_left">通讯地址<strong> *</strong></td>
<td class="t_right">
<input name="address"  id="address" size="40" placeholder="请输入您的通讯地址"/>
</td>
</tr>
<tr>
<td class="t_left">手机号码<strong> *</strong></td>
<td class="t_right">
<input  id="tel" name="tel" placeholder="请输入您的手机号码"/></td>
</tr>
<tr>
<td class="t_left">固定电话</td>
<td class="t_right"><input  id="tel2" name="tel2" placeholder="固定电话可选填"/></td>
</tr>
<tr>
<td class="t_left">联系QQ<strong>&nbsp;&nbsp; *</strong></td>
<td class="t_right">
<input  id="qq" name="qq" placeholder="请输入您的QQ号码"/></td>
</tr>
<tr>
<td class="t_left">联系邮箱</td>
<td class="t_right">
<input  id="mail" name="mail" placeholder="请输入您的邮箱地址"/></td>
</tr>
<tr>
<td class="t_left">投资经验</td>
<td class="t_right">
	      <input type="checkbox" name="tzjy_one" value="银行定期存款" onchange="selTzjy()" class="tzjy"/>
	      银行定期存款
	      <input type="checkbox" name="tzjy_one" value="银行理财产品" onchange="selTzjy()" class="tzjy"/>
	      银行理财产品
	      <input type="checkbox" name="tzjy_one" value="国债" onchange="selTzjy()" class="tzjy"/>
	      国债
	      <input type="checkbox" name="tzjy_one" value="股票" onchange="selTzjy()" class="tzjy1"/>
	      股票<br />
	      <input type="checkbox" name="tzjy_one" value="基金" onchange="selTzjy()" class="tzjy"/>
	      基金
	      <input type="checkbox" name="tzjy_one" value="房地产" onchange="selTzjy()" class="tzjy1"/>
	      房地产<br>
              <input type="checkbox" name="tzjy_one" value="余额宝类" onchange="selTzjy()" class="tzjy"/>
              余额宝类
              <input type="checkbox" name="tzjy_one" value="P2P理财" onchange="selTzjy()" class="tzjy2"/>
              P2P理财<br>
              <input type="checkbox" name="tzjy_one" value="现货" onchange="selTzjy()" class="tzjy"/>
              现货
              <input type="checkbox" name="tzjy_one" value="外汇" onchange="selTzjy()" class="tzjy3"/>
              外汇<br>
              <input type="checkbox" name="tzjy_one" value="期货" onchange="selTzjy()" class="tzjy"/>
              期货
              <input type="checkbox" name="tzjy_one" value="信托" onchange="selTzjy()" class="tzjy1"/>
              信托<br>
              <input type="checkbox" name="tzjy_one" value="其他" onchange="selTzjy()" class="tzjy"/>
              其他
</td>
</tr>
<tr>
<td class="t_left">投资额度</td>
<td class="t_right">
<select name="zijin">
<option value="5万以下"selected="selected">5万以下</option>
<option value="5-10万">5-10万</option>
<option value="10-20万">10-20万</option>
<option value="20万以上">20万以上</option>
</select>
</td>
</tr>

<tr>
<td class="tools" colspan="2"><input type="submit"value=" 提交" class="submit"/>
    <!--<input name="act" type="hidden" id="act" value="ok" />-->
</td>
</tr>
<tr>
<td class="tools" colspan="2">
<b>模拟账户尊享</b><br />
初始10万元虚拟资金进行交易；30天免费试用，让您迅速熟悉平台操作；免费获取独家研究报告及市场资讯。
</td>
</tr>
</tbody></table>
</form> 
</div>
<!-- html_inner_container --></div>
<div class="html_widget_bottom"></div>
<!-- html_widget_bottom --></div>
<!-- html_widget -->
<div class="html_title"><img src="<?php echo TP;?>images/login_title.png" alt="免费开设外汇交易账户,黄金交易账户" /></div>
</div>
<!-- html_login -->
<div class="gif_pic"></div>
</div>
<!-- html_left -->
<div class="html_right">
<div class="html_special">
<div class="html_detail">
<div class="html_widget_middle">
<div class="html_inner_container">
<table class="des_table" border="0">
<tbody>
<tr>
<td class="d_left"></td>
<td class="d_right"></td>
</tr>
<tr>
<td class="d_left">双向交易</td>
<td class="d_right">现货交易不但可以买, 还可以卖；无论涨/跌都能赚钱。</td>
</tr>
<tr>
<td class="d_left">以小博大</td>
<td class="d_right">使用杠杆原理炒现货, 让您花100元办10000元的事儿, 使您收益倍增!</td>
</tr>
<tr>
<td class="d_left">公平环境</td>
<td class="d_right">价格与国际市场同步，全球现货市场交易量, 不存在庄家, 造就公平的交易环境。</td>
</tr>
</tbody>
</table>
</div>
<p><!-- html_inner_container --></p>
</div>
<p><!-- html_widget_bottom --></p>
</div>
<p><!-- html_detail --></p>
<div class="html_special_title"><img src="<?php echo TP;?>images/title_1.png" alt="为什么要炒汇?" /></div>
<p><!-- html_special_title --></p>
</div>
<p><!-- html_special --></p>
<div class="html_special" style="margin-top: 30px;">
<div class="html_detail">
<div class="html_widget_middle">
<div class="html_inner_container">
<table class="des_table" border="0">
<tbody>
<tr>
<td class="d_left">专业的团队</td>
<td class="d_right">我们是一支由现货从业人员组成的专业团队, 熟悉现货交易的各个环节, 帮您避免各种可能的问题。</td>
</tr>
<tr>
<td class="d_left">资金安全</td>
<td class="d_right">银行第三方托管，交易安全，转帐方便。平台接触不到客户的资金，再加上相关部门严格的监管体制, 将保证您资金安全!</td>
</tr>
<tr>
<td class="d_left">特色服务</td>
<td class="d_right">我们将根据客户资金量的大小安排不同的分析师，为客户提供相关行情咨询。</td>
</tr>
</tbody>
</table>
</div>
<p><!-- html_inner_container --></p>
</div>
<p><!-- html_widget_bottom --></p>
</div>
<p><!-- html_detail --></p>
<div class="html_special_title"><img src="<?php echo TP;?>images/title_2.png" alt="为什么选择我们?" /></div>
<p><!-- html_special_title --></p>
</div>
<p><!-- html_special --></p>
<div class="html_special" style="margin-top: 30px;">
<div class="html_detail">
<div class="html_widget_middle">
<div class="html_inner_container">
<table class="des_table" border="0">
<tbody>
<tr>
<td class="d_left">开户免费</td>
<td class="d_right">无论申请模拟帐户还是真实的实盘操作账户，我们都不收取任何费用。</td>
</tr>
</tbody>
</table>
</div>
<p><!-- html_inner_container --></p>
</div>
<p><!-- html_widget_bottom --></p>
</div>
<p><!-- html_detail --></p>
<div class="html_special_title"><img src="<?php echo TP;?>images/title_3.png" alt="开户是否收费?" /></div>
<p><!-- html_special_title --></p>
</div>
<p><!-- html_special --></p>
<div class="html_special" style="margin-top: 30px;">
<div class="html_detail">
<div class="html_widget_middle">
<div class="html_inner_container">
<table class="des_table" border="0">
<tbody>
<tr>
<td class="d_left">附赠课程</td>
<td class="d_right">我们附赠特色交易教程, 让您在最短的时间内上手。</td>
</tr>
<tr>
<td class="d_left">专人答疑</td>
<td class="d_right">我们有一大批现货市场资深从业人员为您指点迷津, 帮您快速赚钱!</td>
</tr>
</tbody>
</table>
</div>
<p><!-- html_inner_container --></p>
</div>
<p><!-- html_widget_bottom --></p>
</div>
<p><!-- html_detail --></p>
<div class="html_special_title"><img src="<?php echo TP;?>images/title_4.png" alt="入手难不难?" /></div>
<p><!-- html_special_title --></p>
</div>
<p><!-- html_special --></p>
</div>
<p><!-- html_right --></p>
<!-- html_content --></div>
<!-- html_main -->


			<div class="clear"></div>
								

	</div><!-- /#main_content .outer -->	

	</div><!-- #main .wrapper -->
</div><!-- #page -->
</body>
</html>
