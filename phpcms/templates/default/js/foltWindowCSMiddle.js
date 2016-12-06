/**
 * 弹层
 */
$(document).ready(function(e) {
	foltWindowCSMiddle.init();
});
$.fn.extend({
	drag:function(){
		var $div = $(this);
		$div.css({"cursor" : "move"});
		/* 绑定鼠标左键按住事件 */
		$div.bind("mousedown",function(event){
			/* 获取需要拖动节点的坐标 */
			var offset_x = $(this)[0].offsetLeft;//x坐标
			var offset_y = $(this)[0].offsetTop;//y坐标
			/* 获取当前鼠标的坐标 */
			var mouse_x = event.pageX;
			var mouse_y = event.pageY;				

			/* 绑定拖动事件 */
			/* 由于拖动时，可能鼠标会移出元素，所以应该使用全局（document）元素 */
			$(document).bind("mousemove",function(ev){
				/* 计算鼠标移动了的位置 */
				var _x = ev.pageX - mouse_x;
				var _y = ev.pageY - mouse_y;
				
				/* 设置移动后的元素坐标 */
				var now_x = (offset_x + _x ) + "px";
				var now_y = (offset_y + _y ) + "px";					
				/* 改变目标元素的位置 */
				$div.css({
					"margin-left":"0",
					top:now_y,
					left:now_x
				});
			});
		});
		/* 当鼠标左键松开，接触事件绑定 */
		$(document).bind("mouseup",function(){
			$(this).unbind("mousemove");
		});
		/* 当鼠标左键松开，接触事件绑定 */
		$div.bind("mouseup",function(){
			$(document).unbind("mousemove");
		});
	}
});

/**
 * 默认返回正式环境域名
 * @returns
 */

var foltWindowCSMiddle={
	layerContainer:null,
	init:function(){
		//原窗口内容
		var contentHTML=[];
		
		contentHTML.push('<div class="pop_ser">');
		contentHTML.push('<a href="javascript://" class="close">关闭</a>');
		contentHTML.push('<div class="serbox"><a href="javascript://" class="ser_online" title="400-9189-838"></a>'
				+ '<a href="http://wpa.b.qq.com/cgi/wpa.php?ln=1&key=XzkzODAwNjQzNl8yNTg1NTJfNDAwOTE4OTgzOF8yXw" target="_blank" class="ser_qq" title="QQ客服"></a>');
		contentHTML.push('</div></div>');
		
		//添加内容到页面
		this.layerContainer=$(contentHTML.join('')).appendTo(document.body);

		this.layerContainer.drag();
		//绑定关闭事件
		var _this=this;
		this.layerContainer.find(".close").click(function(){
			_this.close();
		});
	},
	close:function(){
		//大窗口关闭事件
		this.layerContainer.hide();
	}
};
