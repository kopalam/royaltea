<?php

require_once 'include.php';
//    require_once 'login_check.php';
if(isset($_GET['id'])) {
    $sid = $_GET['id'];
}
?>
            <!doctype html>
            <html lang="zh">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>在线出单</title>
                <link rel='stylesheet prefetch' href='css/reset.css'>
                <link rel="stylesheet" type="text/css" href="css/default.css">

                <!--必要样式-->
                <link rel="stylesheet" type="text/css" href="css/styles2.css">
                <!--[if IE]>
                <script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
                <![endif]-->
            </head>
            <body>


            <section class="buttons">
                <div class="container">
                    <div align="right"> <a href="logout.php" class="btn btn-4"><font size="6">退出</font> </a></div>

                    <h1>点击按钮出单</h1>

                    <!--<a href="#" class="btn btn-1">-->
                    <!--<svg>-->
                    <!--<rect x="0" y="0" fill="none" width="100%" height="100%" />-->
                    <!--</svg>-->
                    <!--Hover-->
                    <!--</a>-->
                    <!--&lt;!&ndash;End of Button 1 &ndash;&gt;-->
                    <!-- -->
                    <!--<a href="#" class="btn btn-2">Hover</a> -->
                    <!--&lt;!&ndash;End of Button 2 &ndash;&gt;-->

                    <a href="ticket.php?sid=<?php echo $sid; ?>" class="btn btn-3"><font size="6">出单</font> </a>
                    <!--End of Button 3 -->
<!---->
<!--                    <a href="finish.php?sid=--> <!--&num=--> <!--&store=--><!--" class="btn btn-4"><span><font size="6">完成</font></span></a>-->
<!--                    <br>-->
<!---->
<!--                    <div><font color="white" size="14">当前待叫号数--><!--号</font></div>-->
<!--                    </br>-->
                    <!--&lt;!&ndash;End of Button 4 &ndash;&gt;-->
                    <!-- -->
                    <!--<a href="#" class="btn btn-5">Hover</a> -->
                    <!--&lt;!&ndash;End of Button 5 &ndash;&gt;-->

                </div>

            </section>

            </body>
            </html>
