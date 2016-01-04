<?php

    require_once 'include.php';
    if(isset($_GET['sid'])){
        $sid = $_GET['sid'];
        $sql = "SELECT * FROM `store` WHERE `sid` = '{$sid}' limit 1";
        $query = mysql_query($sql);
        $result = mysql_fetch_array($query);

    }

?>
<!DOCTYPE html>
<html>
<head>
<title>真聪明，你找对啦，这家皇茶是正品！</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Description" content="恭喜！聪明的你找到了对的皇茶，下次记得也要留意哦！扫一扫，就不会去错咯"/>
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1.0" />
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="stylesheet" href="css/style1.css">
<script src="js/jquery-2.0.0.1.min.js"></script>
<script type="text/javascript">
(function (doc, win) {
	  var docEl = doc.documentElement,
		resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
		recalc = function () {
		  var clientWidth = docEl.clientWidth;
		  if (!clientWidth) return;
		  docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';
		};

	  if (!doc.addEventListener) return;
	  win.addEventListener(resizeEvt, recalc, false);
	  doc.addEventListener('DOMContentLoaded', recalc, false);
	})(document, window);
	
</script>


<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
</head>

<body>
<div class="layout">
    <div class="page">
        <div class="img1"><img src="images/img1.png"></div>
        <div class="img2">聪明的您找到了对的皇茶<br>
            没错，这是我们<strong>royaltea</strong>皇茶的 <strong><br><?php echo $result['address'].$result['name']; ?></strong></div>
        <div class="wx">
            <div class="img"><img src="images/img3.jpg"></div>
            <p><img src="images/img4.png"></p>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
	//页面不足一屏，铺满一屏
	$('.layout').css('min-height',$(window).height());
})
</script>

<script>
    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        window.shareData = {
//            "timeLineLink": "http://www.baidu.com",
//            "sendFriendLink": "http://www.baidu.com",
//            "weiboLink": "http://www.baidu.com",
            "tTitle": "真聪明，你找对啦，这家皇茶是正品！",
            "tContent": "恭喜！聪明的你找到了对的皇茶，下次记得也要留意哦！扫一扫，就不会去错咯",
            "fTitle": "真聪明，你找对啦，这家皇茶是正品！",
            "fContent": "恭喜！聪明的你找到了对的皇茶，下次记得也要留意哦！扫一扫，就不会去错咯",
            "wContent": "恭喜！聪明的你找到了对的皇茶，下次记得也要留意哦！扫一扫，就不会去错咯"
        };
        // 发送给好友
        WeixinJSBridge.on('menu:share:appmessage', function (argv) {
            WeixinJSBridge.invoke('sendAppMessage', {
                "img_url": "http://hc.imchaotan.com/roytaltea/images/w.jpg",
                "img_width": "200",
                "img_height": "200",
                "link": window.shareData.sendFriendLink,
                "desc": window.shareData.fContent,
                "title": window.shareData.fTitle
            }, function (res) {
                _report('send_msg', res.err_msg);
            })
        });
        // 分享到朋友圈
        WeixinJSBridge.on('menu:share:timeline', function (argv) {
            WeixinJSBridge.invoke('shareTimeline', {
                "img_url": "http://hc.imchaotan.com/roytaltea/imagesg/w.jpg",
                "img_width": "200",
                "img_height": "200",
                "link": window.shareData.timeLineLink,
                "desc": window.shareData.tContent,
                "title": window.shareData.tTitle
            }, function (res) {
                _report('timeline', res.err_msg);
            });
        });

    }, false)
</script>


</body>
</html>
