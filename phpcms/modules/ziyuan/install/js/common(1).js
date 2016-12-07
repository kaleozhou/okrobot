$(document).ready(function(e) {

	var isNocsPage = /_nocs.html/.test(location.pathname);
	//_LOAD_folatWindowCSFun 未定义并且非nocs 页面显示，或者  _LOAD_folatWindowCSFun 已定义并且为true
	if((typeof(_LOAD_folatWindowCSFun)=='undefined' && !isNocsPage ) || ( typeof(_LOAD_folatWindowCSFun)!='undefined' && _LOAD_folatWindowCSFun==true)){
		//CS 浮动窗口
		foltWindowCSFun.init({staticPath:getStaticUrl()});
	}
});

/**
 * 自定义客服浮动框
 */
var foltWindowCSFun={
		cs_floatwin_container:null,
		cs_smallfloatwin_container:null,
		_width:156,//浮动层的宽度
		//设置参数
		_options:{
			     staticPath:'',
			     right:0,
			     top:200,
			     availTop:0,//调节浮动层与top的距离
			     margin_right:0,
			     body_width:1120
		},
		
		init:function(opt){
			this._options=$.extend({},this._options,opt || {});

			//原窗口内容
			var contentHTML=[];
			contentHTML.push('<!--<ul id="cs_floatwin_container" class="fd_server on-show" >-->');
			contentHTML.push('<!--</ul>-->');
		
			//关闭后窗口内容
			var smallContentHTML=[];
			smallContentHTML.push('<!--<div id="cs_smallfloatwin_container" class="fd_server_min"></div>-->');
			smallContentHTML.push('<!--<input type="hidden" value="0" id="cs_toggle_flg" name="cs_toggle_flg">-->');
			
			//加载IE6js
			 if($.browser.msie && $.browser.version ==6 ){
//				 include_js("/public/js/DD_belatedPNG.min.js");
//				 DD_belatedPNG.fix(".fd_server a, .fd_server a:hover,.fd_server .fd_tel,.fd_server_min");
			 }
			//添加内容到页面
			this.cs_floatwin_container=$(contentHTML.join('')).appendTo(document.body);
			this.cs_smallfloatwin_container=$(smallContentHTML.join('')).appendTo(document.body);
			//绑定关闭事件
			var _this=this;
			this.cs_floatwin_container.find("#cs_floatwin_close").click(function(){
				_this.close();
			});
			this.cs_smallfloatwin_container.click(function(){
				_this.samllClose();
			});
			/**窗口缩小放大时调节窗口 START**/
			this.$win = $(window);
	        //重设窗口
	        this.resetPosition();
	        this.$win.resize(function(){
	        	_this.resetPosition();
	        });
	        /**窗口缩小放大时调节窗口 END**/
		},
		show:function(){
			//显示窗口
			this.cs_floatwin_container.fadeIn("slow");
		},
		hide:function(){
			this.cs_floatwin_container.fadeOut("slow");
		},
		close:function(){
			//大窗口关闭事件
			var _this=this;
			this.cs_floatwin_container.fadeOut('slow',function(){				
				_this.cs_smallfloatwin_container.fadeIn("slow");
			});
			$("#cs_toggle_flg").val("1");//标记是主动关闭
		},
	    samllShow:function(){
			this.cs_smallfloatwin_container.fadeIn("slow");
		},
		samllHide:function(){
			this.cs_smallfloatwin_container.fadeOut("slow");
		},
		samllClose:function(){
			//小窗口关闭
			var _this=this;
			this.cs_smallfloatwin_container.fadeOut('slow',function(){
				_this.cs_floatwin_container.fadeIn("slow");
			});
			$("#cs_toggle_flg").val("0");//标记是主动打开
		},
		getToggleFlg:function(){//获取开关状态
			return $("#cs_toggle_flg").val();
		},
		//重设窗口
		resetPosition:function(){
	        var l = (this.$win.width()-this._options.body_width)/2 -this._width-40;
	        if(l < 0)l = 0;
	        this.cs_floatwin_container.css({right:l+"px"});
	        
//	        if(this.$win.width() < this._options.body_width + this._width){
//	            this.cs_floatwin_container.css({right:"0px"});
//	        }
	       
	    }
};


/**
 * 默认返回正式环境域名
 * @returns
 */
function getStaticUrl(){
	var h=window.location.host;
	if(h.indexOf("http://www.pe189.com")>=0){
		h="";
	}
	else if(h.indexOf("http://www.pe189.com")>=0){
		h="http://www.pe189.com";
	}
	else{
		h="http://www.pe189.com";
	}
	return h;
}