$(function() {
	//导航!=index
	$(".navWrap li[name]").hover(
		function () {
			var navlength=$("#menuBar .navWrap > li").length;
			$(this).removeClass("parentNav").addClass("active");
			if($(this).index()!=0 && $(this).index()!=(navlength-1)){
				$(this).children('.up_nav').show();
				}
			else {
				$(this).removeClass("parentNav").addClass("active");
				}
		},
		function () {
			$(this).removeClass("active");
			$(this).children('.up_nav').hide();
			$("li[name='"+currentNav+"']").removeClass('parentNav').addClass('active_home');
		}
	);
	try{
	$("li[name='"+currentNav+"']").removeClass('parentNav').addClass('active_home');
	$("#chatBox").easydrag();
	}
	catch(e){}
	//右侧按钮
	$(".btnBox a").hover(
		function () {
			$(this).next('div').show();
		},
		function () {
			$(this).next('div').hide();
		}
	);
	$("#moblie_d span").hover(
		function () {
			$(this).children('ul').show();
		},
		function () {
			$(this).children('ul').hide();
		}
	);
	if(window.currentNav!="index"){
		$('.secondary').remove();
	}
	$('.nav .subMenu').remove();
	
	$(".mtf_notice").hover(function(){$(this).find("p").show()},function(){$(this).find("p").hide()})

	showtime();
	tab();
	if(getCookie("user")!=null){
		//$("#userIntro").css("display","none");
	}else{
		//$("#userIntro").css("display","block");
	};
	if(getCookie("notice")!=null){
		//$("#ggnotice").css("display","none");
	}else{
		//$("#ggnotice").css("display","block");
	};	
});

//Menu
$(document).ready(function() {
$("ul.sideMenu>li>a,ul.navWrap>li>a").each(function() {
    if ($(this).attr("href").toLowerCase().replace(/\/|[&#].*/g,"") == document.URL.toLowerCase().replace(/\/|[&#].*/g,"")){
        $(this).attr("class","current");
    }
});
});

//Menu Article
$(document).ready(function() {
    var category = $(".categories").text();
    $("ul.navWrap>li>a").each(function() {
		if($(this).text() == category)
		{
			$(this).attr("class","current");
		}
	});
});

//Menu Article
$(document).ready(function() {
    var category = $(".categori").text();
    $("ul.sideMenu>li>a").each(function() {
		if($(this).text() == category)
		{
			$(this).attr("class","current");
		}
	});
});

function showtime() {
	var today = new Date((new Date()).getTime());
	/*Daylight Saving Time Start*/
	var dst = 0;
	var lsm = new Date;
	var lso = new Date;
	lsm.setMonth(2); // March
	lsm.setDate(31);
	var day = lsm.getDay();// day of week of 31st
	lsm.setDate(31-day); // last Sunday
	lso.setMonth(9); // October
	lso.setDate(31);
	day = lso.getDay();
	lso.setDate(31-day);
	if (today < lsm || today >= lso) dst = 1;
	/*Daylight Saving Time End*/

	var hour = today.getHours();
	var minute = today.getMinutes();
	var second = today.getSeconds();
	if (hour <= 9)
		hour = "0" + hour;
	if (minute <= 9)
		minute = "0" + minute;
	if (second <= 9)
		second = "0" + second;

	var utc = today.getTime() + (today.getTimezoneOffset() * 60000);
	var ldDate = new Date(utc + (3600000 * (1-dst)));
	var nyDate = new Date(utc + (3600000 * (-4-dst)));
	var tyDate = new Date(utc + (3600000 * (9)));
	var sxDate = new Date(utc + (3600000 * (2)));

	var ldhour = ldDate.getHours() < 9 ? ("0" + ldDate.getHours()) : ldDate.getHours();
	var nyhour = nyDate.getHours() < 9 ? ("0" + nyDate.getHours()) : nyDate.getHours();
	var tyhour = tyDate.getHours() < 9 ? ("0" + tyDate.getHours()) : tyDate.getHours();
	var sxhour = sxDate.getHours() < 9 ? ("0" + sxDate.getHours()) : sxDate.getHours();

	var strldtime = ldhour + ":" + minute + ":" + second + "&nbsp;";
	var strnytime = nyhour + ":" + minute + ":" + second + "&nbsp;";
	var strtytime = tyhour + ":" + minute + ":" + second + "&nbsp;";
	var strhktime = hour + ":" + minute + ":" + second + "&nbsp;";
	var strsxtime = sxhour + ":" + minute + ":" + second;

	$('#ldtime').html(strldtime);
	$('#nytime').html(strnytime);
	$('#tytime').html(strtytime);
	$('#hktime').html(strhktime);

	setTimeout("showtime();", 500);
}

//页签淡入淡出
function tab(){
	$(".tabBar").next("div").attr("class","tabshow");
	$(".tabBar li").click(function(i){
		$(this).addClass('active').siblings("li").removeClass("active");
		$(this).parent().next("div").children(".mBox").eq($(this).index()).show().siblings().hide();
	})
};

function QueryString(item){
	var sValue=location.search.match(new RegExp("[\?\&]"+item+"=([^\&]*)(\&?)","i"))
	return sValue?sValue[1]:sValue
}






function getCookie(name){
var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
if(arr != null) return unescape(arr[2]); return null;
}
function closeDiv(obj){
	$("#"+obj).css("display","none");
}
function backg(on, box){
	var ons=on;
	var boxs=box;
	$(boxs).hover(
		function(){
			$(this).attr("class","ons");
		},
		function(){
			$(this).attr("class","");
		}
	)
}
$(function(){
	$(".mBox dl").hover(
	//$(this).css("background","#fbd3d3")
		function(){
			$(this).css({"background":"#f7f7f7","padding":"12px 11px 12px 15px"});
		},
		function(){
			$(this).css({"background":"","padding":""});
		}
	);
	//内页开户按钮
	$(".quickMenu li a").hover(
		function(){
			$(this).find('.bg_chg').stop().animate({opacity: '1'},600);
		},
		function(){
			$(this).find('.bg_chg').stop().animate({opacity: '0'},600);
		}
	);
});
$(window).scroll(function(){
	if($(window).scrollTop() >= 127)
	{
		menuBarfix();
	}
	else
	{
		clearMenuBarfix();
	}
})
var menuBarfix = function(){	
	$("#menuBar").css({"position":"fixed","width":"100%","top":"0","left":"0","z-index":"9999999"})
}
var clearMenuBarfix = function(){	
	$("#menuBar").css({"position":"relative","width":"100%","top":"auto","left":"auto","z-index":"10000"})
}