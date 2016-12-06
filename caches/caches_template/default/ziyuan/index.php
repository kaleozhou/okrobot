<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("ziyuan","header"); ?>

<div class="boxShade"></div>
<div id="khMenu">
    <ul class="khMenuBox">
        <li style="padding:0px;"><a href="<?php echo MYLINK;?>10836" class="real"><h3><img src="<?php echo TP;?>images/ico_real.png">开立模拟账户</img></h3><span class="khbtn_hov"></span></a><span id="icon_free"></span></li>
        <li><a href="<?php echo MYLINK;?>10837" class="demo" target="_blank"><h3><img src="<?php echo TP;?>images/ico_demo.png">网上自助开户</img></h3><span class="khbtn_hov" style="opacity: 0;"></span></a></li>
        <li style=" width:116px; height:43px;"><a href="<?php echo MYLINK;?>10833" class="deposit"><h3>软件下载</h3><span class="khbtn_hov"></span></a></li>
        <li style="width:116px; height:43px; padding-left:8px;"><a href="<?php echo MYLINK;?>10835" class="qk"><h3>开户指南</h3><span class="khbtn_hov"></span></a></li>
        <li><a href="<?php echo MYLINK;?>10825" class="users"><h3 style="color: rgb(69, 69, 69);"><img src="<?php echo TP;?>images/ico_user.png">我要加盟/代理</img></h3><span class="khbtn_hov" style="opacity: 0;"></span></a></li>
    </ul>
</div>
<div class="body_boxbg" style="display: none;"></div>
<script type="text/javascript">
$(".khMenuBox li a").append("<span class='khbtn_hov'></span>")
var len = $(".khMenuBox li").length;
$(".khMenuBox a").hover(function(){
    if($(this).parent().index()==(len-1))
    {
        $(this).find("h3").css({color:"#fa8219"},600);
    }
    $(this).find('.khbtn_hov').stop().animate({opacity: '1'},600);
},function(){
    if($(this).parent().index()==(len-1))
    {
        $(this).find("h3").css({color:"#454545"},600);
    }
    $(this).find('.khbtn_hov').stop().animate({opacity: '0'},600);
})
$(".khMenuBox").hover(
        function(){
            $(".body_boxbg").show();
            $(".navWrap li").css({"z-index":"99"});
        },
        function(){
            $(".body_boxbg").hide();
            $(".navWrap li").css({"z-index":"10000"});
        }
        )
$("#menuBar li.active").mouseover(function(){$(this).css({"background-color":""})});
</script>
<div id="slideshow">
    <div class="index_focus">
        <a href="javascript:;" class="index_focus_pre" style="opacity: 1; display: none;">上一张</a> <a href="javascript:;" class="index_focus_next" style="opacity: 1; display: none;">下一张</a>
        <div class="bd">
            <ul style="position: relative; width: 1920px; height: 360px;">
                <li style="position: absolute; width: 1920px; left: 0px; top: 0px; display: none;"><a class="pic"><img src="<?php echo TP;?>images/banner4.jpg" class="pic" height="360"></a></li>
                <li style="position: absolute; width: 1920px; left: 0px; top: 0px; display: none;"><a class="pic"><img src="<?php echo TP;?>images/banner3.jpg" class="pic" height="360"></a></li>
                <li style="position: absolute; width: 1920px; left: 0px; top: 0px;"><a class="pic"><img src="<?php echo TP;?>images/banner1.jpg" class="pic" height="360"></a></li>
                <li style="position: absolute; width: 1920px; left: 0px; top: 0px; display: none;"><a class="pic"><img src="<?php echo TP;?>images/banner2.jpg" class="pic" height="360"></a></li>
                <div class="clear" style="position: absolute; width: 1920px; left: 0px; top: 0px; display: none;"></div>
            </ul>
        </div>
        <div class="slide_nav">
            <a href="javascript:;" class="">●</a>
            <a href="javascript:;" class="">●</a>
            <a href="javascript:;" class="on">●</a>
            <a href="javascript:;">●</a>
        </div>
    </div>
    <script type="text/javascript">
jQuery(".index_focus").hover(function(){
    jQuery(this).find(".index_focus_pre,.index_focus_next").stop(true, true).fadeTo("show", 1)
},function(){
    jQuery(this).find(".index_focus_pre,.index_focus_next").fadeOut()
});
jQuery(".index_focus").slide({
    titCell: ".slide_nav a",
    mainCell: ".bd ul",
    delayTime: 800,
    interTime: 4000,
    prevCell:".index_focus_pre",
    nextCell:".index_focus_next",
    effect: "fold",
    autoPlay: true,
    trigger: "click",
    startFun:function(i){
        jQuery(".index_focus_info").eq(i).find("h3").css("display","block").fadeTo(1000,1);
        jQuery(".index_focus_info").eq(i).find(".text").css("display","block").fadeTo(1000,1);
    }
});
    </script>
</div>
<div class="affiche">
    <span><b>最新公告：</b></span><a href="<?php echo MYLINK;?>10822" class="more">更多公告&gt;&gt;</a>
    <span class="title first">

        <a href="<?php echo MYLINK;?>10822151162" target="_blank">关于美国独立日提前休市的通知</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?php echo MYLINK;?>10822148200" target="_blank">交易风险警示</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="<?php echo MYLINK;?>10822148199" target="_blank">关于2016年美国阵亡将士纪念日提前休市的通知</a>&nbsp;&nbsp;&nbsp;&nbsp;
    </span>
</div>
<div class="wrap pt15">
    <div class="index_main">
        <div class="advantages">
            <ul>
                <li style="z-index: 1;"><a href="index" id="pro" class="adv_btn"><span></span>产品优势</a><div class="hov_show">最高33倍杠杆，高杠杆，高回报；双向交易，投资灵活；投资便捷，22小时随时交易；</div></li>
                <li style="z-index: 1;"><a href="index" id="cre" class="adv_btn"><span></span>信誉优势</a><div class="hov_show">平台稳定，无延时实时传输，公平公正公开；</div></li>
                <li><a href="index" id="cos" class="adv_btn"><span></span>成本优势</a><div class="hov_show" style="display: none; left: -15px; opacity: 0;">免费开户，小资金低门槛，3万即可交易；与国际原油市场接轨，无点差；结算清晰；</div></li>
                <li style="z-index: 1;"><a href="index" id="mon" class="adv_btn"><span></span>资金优势</a><div class="hov_show">建设银行第三方存管，即时到账，安全快捷；24小时办理存取；取款方便快捷；</div></li>
                <li style="z-index: 1;"><a href="index" id="exp" class="adv_btn"><span></span>专家优势</a><div class="hov_show">技术分析团队，解析投资秘诀；逐一解答投资疑问；每日专家评论，获取投资参考；</div></li>
                <li style="z-index: 1;"><a href="index" id="ser" class="adv_btn"><span></span>服务优势</a><div class="hov_show last">24小时提供免费客户咨询服务：最新金融资讯，即时行情报价，每日、每周专家评论服务；</div></li>
                <li style="z-index: 1;"><a href="index#" id="mor" class="adv_btn"><span></span>更多</a></li>
            </ul>
        </div>
        <script type="text/javascript">
var adv_len = $(".advantages ul li").length;
$(".advantages ul li a").hover(function(){
    $(this).parent().siblings("li").css({"z-index":"-1"});
    if($(this).parent().index()==(adv_len-1))
    {return false;}
    else{
        $(this).find("span").addClass("getshow").parent().addClass("curr");
        $(this).next(".hov_show").show();
        $(this).next(".hov_show").animate({left: '+=15px',opacity: '1'}, 500);
    }
},function(){
    $(this).parent().siblings("li").css({"z-index":"1"});
    $(this).find("span").removeClass("getshow").parent().removeClass("curr");
    $(this).next('div').animate({left:'-=15px',opacity: '0'},300);
    $(this).next(".hov_show").delay(300).hide(0);
})
        </script>

        <div class="videonews pt15">
            <div class="index_nlist">
                <div style="position:relative">
                    <ul class="tabBar news">
                        <li class="active">常见问题</li>
                    </ul>
                    <div class="tabshow">
                        <div class="mBox">
                            <div class="new_tr">
                                <ul>

                                    <li><a href="<?php echo MYLINK;?>1084775255" title="开户有什么要求？" target="_blank">海南大宗：开户有什么要求？</a></li> 

                                    <li><a href="<?php echo MYLINK;?>1084775254" title="开户需要带什么资料？ " target="_blank">海南大宗：开户需要带什么资料？ </a></li> 

                                    <li><a href="<?php echo MYLINK;?>1084775253" title="开户要多长时间？" target="_blank">海南大宗：开户要多长时间？</a></li> 

                                    <li><a href="<?php echo MYLINK;?>1084775252" title="怎样炒现货白银才能盈利？" target="_blank">海南大宗：怎样炒现货白银才能盈利？</a></li> 

                                    <li><a href="<?php echo MYLINK;?>1084775251" title="现货白银投资方案及实战技巧？" target="_blank">海南大宗：现货白银投资方案及实战技巧？</a></li> 

                                </ul>
                            </div>
                        </div>
                    </div>
                    <span class="more outmore"><a href="<?php echo MYLINK;?>10847">更多 +</a></span>
                </div>
            </div>
            <div class="index_nlist1">
                <div style="position:relative">
                    <ul class="tabBar news">
                        <li class="active">交易所公告</li>
                    </ul>
                    <div class="tabshow">
                        <div class="mBox">
                            <div class="new_tr">
                                <ul>

                                    <li><a href="<?php echo MYLINK;?>10822151162" title="关于美国独立日提前休市的通知" target="_blank">海南大宗： 关于美国独立日提前休市的通知</a>
                                        <span class="date">2016-06-30</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>10822148200" title="交易风险警示" target="_blank">海南大宗： 交易风险警示</a>
                                        <span class="date">2016-06-23</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>10822148199" title="关于2016年美国阵亡将士纪念日提前休市的通知" target="_blank">海南大宗： 关于2016年美国阵亡将士纪念日提...</a>
                                        <span class="date">2016-06-23</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>1082275133" title="海南省常务副省长毛超峰调研交易中心" target="_blank">海南大宗： 海南省常务副省长毛超峰调研交易...</a>
                                        <span class="date">2015-07-10</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>1082275132" title="海南一带一路新起点建设高端论坛" target="_blank">海南大宗： 海南一带一路新起点建设高端论坛</a>
                                        <span class="date">2015-07-10</span>
                                    </li> 

                                </ul>
                            </div>
                        </div>
                    </div>
                    <span class="more outmore"><a href="<?php echo MYLINK;?>10822">更多 +</a></span>
                </div>
            </div>
        </div>
        <div class="videonews pt15">
            <div class="index_nlist">
                <ul class="tabBar news" id="tabBar2">
                    <li class="active">基础课堂</li>
                    <li>高级课堂</li>
                </ul>
                <div class="tabshow">
                    <div id="tab2_1" class="mBox">
                        <div class="new_tr">
                            <ul>

                                <li><a href="<?php echo MYLINK;?>1084575194" title="白银投资优劣比较" target="_blank">海南大宗： 白银投资优劣比较</a>
                                    <span class="date">2016-06-23</span>
                                </li> 

                                <li><a href="<?php echo MYLINK;?>1084575193" title="美国非农数据的重要性" target="_blank">海南大宗： 美国非农数据的重要性</a>
                                    <span class="date">2016-06-23</span>
                                </li> 

                                <li><a href="<?php echo MYLINK;?>1084575192" title="投资现货白银有哪些优势" target="_blank">海南大宗： 投资现货白银有哪些优势</a>
                                    <span class="date">2014-06-20</span>
                                </li> 

                                <li><a href="<?php echo MYLINK;?>1084575191" title="白银投资技巧分析" target="_blank">海南大宗： 白银投资技巧分析</a>
                                    <span class="date">2014-06-20</span>
                                </li> 

                                <li><a href="<?php echo MYLINK;?>1084575190" title="十六则市场交易心理学" target="_blank">海南大宗： 十六则市场交易心理学</a>
                                    <span class="date">2014-06-20</span>
                                </li> 

                            </ul>
                        </div>
                    </div>
                    <div id="tab2_2" class="mBox" style="display:none;">
                        <div class="new_tr">
                            <ul>

                                <li><a href="<?php echo MYLINK;?>1084675205" title="现货白银投资知识白银T+d投资如何解套？" target="_blank">海南大宗： 现货白银投资知识白银T+d投资如...</a>
                                    <span class="date">2016-06-23</span>
                                </li> 

                                <li><a href="<?php echo MYLINK;?>1084675204" title="现货白银怎么投资赚钱成为了人们的热点话题" target="_blank">海南大宗： 现货白银怎么投资赚钱成为了人们...</a>
                                    <span class="date">2016-06-23</span>
                                </li> 

                                <li><a href="<?php echo MYLINK;?>1084675203" title="现货白银投资基础知识之美国就业数据篇" target="_blank">海南大宗： 现货白银投资基础知识之美国就业...</a>
                                    <span class="date">2016-06-23</span>
                                </li> 

                                <li><a href="<?php echo MYLINK;?>1084675202" title="黄金是很不稳定" target="_blank">海南大宗： 黄金是很不稳定</a>
                                    <span class="date">2014-07-16</span>
                                </li> 

                                <li><a href="<?php echo MYLINK;?>1084675201" title="贵金属投资的四大要素" target="_blank">海南大宗： 贵金属投资的四大要素</a>
                                    <span class="date">2014-07-16</span>
                                </li> 

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="index_nlist1">
                <div style="position:relative">
                    <ul class="tabBar news">
                        <li class="active">机构报告</li>
                    </ul>
                    <div class="tabshow">
                        <div class="mBox">
                            <div class="new_tr">
                                <ul>

                                    <li><a href="<?php echo MYLINK;?>10843148204" title="天胶开割延后 供给短期偏紧" target="_blank">海南大宗： 天胶开割延后 供给短期偏紧</a>
                                        <span class="date">2016-06-23</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>10843148203" title="美加息预期模糊股市反弹 黄金走势犹豫不决" target="_blank">海南大宗： 美加息预期模糊股市反弹 黄金走...</a>
                                        <span class="date">2016-06-23</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>10843148202" title="加息预期降温 黄金迎来暴涨" target="_blank">海南大宗： 加息预期降温 黄金迎来暴涨</a>
                                        <span class="date">2016-06-23</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>10843148201" title="国际黄金价格涨逾2%创七周来最大单日涨幅" target="_blank">海南大宗： 国际黄金价格涨逾2%创七周来最大...</a>
                                        <span class="date">2016-06-23</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>1084375174" title="白银价格上涨或难持续" target="_blank">海南大宗： 白银价格上涨或难持续</a>
                                        <span class="date">2014-11-18</span>
                                    </li> 

                                </ul>
                            </div>
                        </div>
                    </div>
                    <span class="more outmore"><a href="<?php echo MYLINK;?>10843">更多 +</a></span>
                </div>
            </div>
        </div>
        <div class="videonews pt15">
            <div class="index_nlist">
                <div style="position:relative">
                    <ul class="tabBar news">
                        <li class="active">每日评论</li>
                    </ul>
                    <div class="tabshow">
                        <div class="mBox">
                            <div class="new_tr">
                                <ul>

                                    <li><a href="<?php echo MYLINK;?>10842148198" title="橡胶周评" target="_blank"> 海南大宗：橡胶周评</a>
                                        <span class="date">2016-06-23</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>10842148197" title="橡胶周评" target="_blank"> 海南大宗：橡胶周评</a>
                                        <span class="date">2016-06-23</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>10842148196" title="橡胶周评" target="_blank"> 海南大宗：橡胶周评</a>
                                        <span class="date">2016-06-23</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>1084275164" title="晚评-现货白银操作建议" target="_blank"> 海南大宗：晚评-现货白银操作建议</a>
                                        <span class="date">2014-11-18</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>1084275163" title="道明证劵预期黄金/白银比率首度上升 2015年走势逆转" target="_blank"> 海南大宗：道明证劵预期黄金/白银比率首度...</a>
                                        <span class="date">2014-11-25</span>
                                    </li> 

                                </ul>
                            </div>
                        </div>
                    </div>
                    <span class="more outmore"><a href="<?php echo MYLINK;?>10842">更多 +</a></span>
                </div>
            </div>
            <div class="index_nlist1">
                <div style="position:relative">
                    <ul class="tabBar news">
                        <li class="active">行业新闻</li>
                    </ul>
                    <div class="tabshow">
                        <div class="mBox">
                            <div class="new_tr">
                                <ul>

                                    <li><a href="<?php echo MYLINK;?>10840151163" title="2016年大宗党支部组织开展纪念建党95周年活动情况汇报" target="_blank">海南大宗： 2016年大宗党支部组织开展纪念建...</a>
                                        <span class="date">2016-07-05</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>10840148173" title="李克强：人民币不存持续贬值基础 无意打货币战" target="_blank">海南大宗： 李克强：人民币不存持续贬值基础...</a>
                                        <span class="date">2016-06-22</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>10840148172" title="耶伦∶就业报告给加息抉择带来压力" target="_blank">海南大宗： 耶伦∶就业报告给加息抉择带来压...</a>
                                        <span class="date">2016-06-22</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>10840148171" title="央行行长助理殷勇：中国央行没有实行量化宽松" target="_blank">海南大宗： 央行行长助理殷勇：中国央行没有...</a>
                                        <span class="date">2016-06-22</span>
                                    </li> 

                                    <li><a href="<?php echo MYLINK;?>10840148170" title="全世界最安全市场陷入最剧烈震荡" target="_blank">海南大宗： 全世界最安全市场陷入最剧烈震荡</a>
                                        <span class="date">2016-06-22</span>
                                    </li> 

                                </ul>
                            </div>
                        </div>
                    </div>
                    <span class="more outmore"><a href="<?php echo MYLINK;?>10840">更多 +</a></span>
                </div>
            </div>
        </div>
    </div>
    <div id="side_right">
        <div class="contactss" style="float:left">
            <h3><img src="<?php echo TP;?>images/s_logo.png" alt="海南大宗快捷导航" title="海南大宗快捷导航" />&ensp;快捷导航</h3>
            <ul class="list1">                                      
                <li><a href="<?php echo MYLINK;?>10821">公司简介</a></li>      
                <li><a href="<?php echo MYLINK;?>10823">政府批文</a></li>
                <li><a href="<?php echo MYLINK;?>10828">交易规则</a></li>                                       
                <li><a href="<?php echo MYLINK;?>10829">盈亏计算</a></li>
                <li><a href="<?php echo MYLINK;?>10833">软件下载</a></li>
                <li><a href="<?php echo MYLINK;?>10833">文件下载</a></li>
                <li><a href="<?php echo MYLINK;?>10835">开户流程</a></li>
                <li><a href="<?php echo MYLINK;?>10831">出入金流程</a></li>
                <li><a href="<?php echo MYLINK;?>10847">常见问题</a></li>    
            </ul>
            <div class="clear"></div>
            <div class="list3"></div>
            <ul class="list2">
                <div class="clear"></div>

                <li><a href="<?php echo MYLINK;?>1084675205" title="现货白银投资知识白银T+d投资如何解套？" target="_blank">现货白银投资知识白银T+d投资如何...</a></li>

                <li><a href="<?php echo MYLINK;?>1084675204" title="现货白银怎么投资赚钱成为了人们的热点话题" target="_blank">现货白银怎么投资赚钱成为了人们的...</a></li>

                <li><a href="<?php echo MYLINK;?>1084675203" title="现货白银投资基础知识之美国就业数据篇" target="_blank">现货白银投资基础知识之美国就业数...</a></li>

                <li><a href="<?php echo MYLINK;?>1084675202" title="黄金是很不稳定" target="_blank">黄金是很不稳定</a></li>

                <li class="more"><a href="<?php echo MYLINK;?>10846"><img src="<?php echo TP;?>images/more.png" width="80" height="18" /></a></li>
            </ul> 
        </div>  
        <div class="download">
            <table width="244" border="0">  <tr>
                    <td height="50" align="center" bgcolor="#ffa733" style=" font-size:20px; color:#FFF"><div align="center" ><a href="<?php echo MYLINK;?>10833">下载中心</a></div></td>
                </tr>
                <tr>
                    <td height="50" align="center" bgcolor="#ffa733" style=" font-size:20px; color:#FFF; margin-top:-50px;
                    "><div align="center" ><a href="<?php echo MYLINK;?>10828">交易规则</a></div></td>
                </tr>
            </table>


            <div class="contacts" style="float:left;margin-top: 16px;">
                <h3><img src="<?php echo TP;?>images/s_logo.png" alt="海南大宗网上开户" title="海南大宗网上开户" />&ensp;网上开户</h3>
                <ul>
                    <li><a href="<?php echo MYLINK;?>10836"><img src="<?php echo TP;?>images/moni.png"></img></a></li>                                                   
                    <li><a href="<?php echo MYLINK;?>10837"><img src="<?php echo TP;?>images/shipan.png"></img></a></li>
                    <li><a href="<?php echo MYLINK;?>10825"><img src="<?php echo TP;?>images/zhaos.png"></img></a></li>
                </ul>
            </div>
        </div>

        <div style="width:240px;margin-top:30px"> 
            <div class="slide_activity">    
                <div class="activity_focus">     
                    <div class="bd">            
                        <ul class="activityImg">        
                            <li><a href="<?php echo MYLINK;?>10828" target="_blank">
                                    <img src="<?php echo TP;?>images/zhaoshang.jpg" /></a></li>
                            <li><a href="<?php echo MYLINK;?>10828" target="_blank">
                                    <img src="<?php echo TP;?>images/2015042457426593.jpg" style="width:240px;height:180px" /></a></li>     
                            <li><a href="<?php echo MYLINK;?>10828" target="_blank">
                                    <img src="<?php echo TP;?>images/zhaosh.jpg" style="width:240px;height:180px" /></a></li>
                        </ul>     
                    </div>      
                    <div class="activity_nav"> 
                        <a href="javascript:;">●</a> <a href="javascript:;">●</a> <a href="javascript:;">●</a></div>       
                </div>        
            </div>  


            <script type="text/javascript">
jQuery(".activity_focus").slide({
    titCell: ".activity_nav a ",
    mainCell: ".bd ul",
    delayTime: 2000,
    interTime: 7000,
    effect: "fold",
    autoPlay: true,
    trigger: "click"
});
            </script>  

        </div>
    </div>
</div>

<!-- 102ms -->

<?php include template("ziyuan","footer"); ?>
