<?php
//single.php是出单制作的人员跳转页面
require_once 'include.php';

// require_once 'login_check.php';
if(isset($_GET['id'])) {
    $sid = $_GET['id'];
}
$sql = "SELECT * FROM `ticket` WHERE `finish` = '0'  ORDER BY `tid` ASC LIMIT 1";
$res = new royaltea();
$array = $res->fetch_array($sql);
$num = $array['num']?$array['num']:0;
$total_sum = "SELECT * FROM `ticket` WHERE `finish`=0";
$sum = $res->totalRow($total_sum);

?>
            <!doctype html>
            <html lang="zh">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>制作单</title>
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

                    <h1>完毕请点击</h1>


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

                    <a href="finish.php?sid=<?php echo $sid; ?>&store=<?php echo $array['store']; ?>&num=<?php echo $array['num']; ?>" class="btn btn-3"><font size="6">完成</font> </a>


                    <div><font size="12" color="white">现在的号数是<?php echo $num;?>号</font> </div><br>
                    <div><font size="6" color="white">门店:<?php echo $_SESSION['store']; ?></font> </div><br>
                    <div><font size="6" color="white">等候人数:<?php echo $sum;  ?></font> </div>

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
