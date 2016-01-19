<?php
    require_once 'include.php';

    if(isset($_REQUEST['num'])) {
        $store = $_REQUEST['store'];
        $sql = "SELECT * FROM `ticket` WHERE `finish` = '0'  ORDER BY `tid` ASC LIMIT 1";
        $res = new royaltea();
        $array = $res->fetch_array($sql);
        $num = $array['num'] ? $array['num'] : 0;
        $total_sum = "SELECT * FROM `ticket` WHERE `finish`=0";
        $number = $_REQUEST['num']-$num;

        if($number == 0){
            echo "<script language='javascript'>
                        alert('制作完成');
                        location.href='user_finish.php';
                        </script> ";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/style3.css">
    <meta name="viewport"
          content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no,initial-scale=1.0"/>
    <meta name="format-detection" content="telphone=no, username=no"/>

</head>
<body>
<div class="logo"><a href=""><img src="images/rlogo.png" alt=""></a></div>
<div class="main">
    <p class="title">还有<span class="title"><?php echo $number; ?></span>人在等候</p>
    <p><span class="text-left">因为每一杯皇茶都是现做的</span><span class="text-right">所以会需要一点等候的时间哦</span></p>
</div>
</body>
</html>