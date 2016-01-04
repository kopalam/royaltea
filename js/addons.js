$(function(){
	//页面不足一屏，铺满一屏
	$('.boxHeight').css('min-height',$(window).height());
	
/*	var wechat_developer_reload = function(){
		$('body').append('<input type="button" value="refresh" onclick="window.location.reload();"/>');	 
	} 
	$('.mask, .dialog .close').live('click',function(){
		$('.dialog').each(function(){
			$(this).fadeOut();							 
		})					  
		$('.mask').remove();								 
	})
	*/

	
		$("#submitBtn").click(function () {
		
		var username=$("#username").val();
		if(username.length==0){
			$("#tips").text("请填写您的姓名").show();
			
			return false;
			
		}
		if(/[\u4E00-\u9FA5]+/.test(username)==false){
			$("#tips").text("请填写您的真实姓名").show();
			return false;
		}
		var m1 = /^(1[3578][0-9]|14[57])\d{8}$/;
		var mobile = $("#mobile").val();
		mobile = mobile.replace(/(^\s*)|(\s*$)/, "");
		if (mobile.length==0) {
			$("#tips").text("请填写您的手机号码").show();
			return false;
		}
		if (!(m1.test(mobile))) {
			$("#tips").text("请填写您的正确号码").show();
			return false;
		}
	    var address=$("#address").val();
		if(address.length==0){
			$("#tips").text("请填写您的地址").show();
			
			return false;
			
		}
		$("#tips").text("").hide();
		
	});


(function (doc, win) {
	  var docEl = doc.documentElement,
		resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
		recalc = function () {
		  var clientWidth = docEl.clientWidth;
		  if (!clientWidth) return;
		  docEl.style.fontSize = 100 * (clientWidth / 640) + 'px';
		};

	  if (!doc.addEventListener) return;
	  win.addEventListener(resizeEvt, recalc, false);
	  doc.addEventListener('DOMContentLoaded', recalc, false);
	})(document, window);
	
})


	
