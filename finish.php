<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/9
 * Time: 下午1:42
 */
    require_once 'include.php';

    if(isset($_REQUEST['sid'])){
        $sid = $_REQUEST['sid'];
        $num = $_REQUEST['num'];
        $store = $_SESSION['store'];
        $sql = "SELECT * FROM `ticket` WHERE `num` ='{$num}' AND `finish`='0' LIMIT 1 ";
        $res = new royaltea();
        $res = $res->fetch_array($sql);
        $tid = $res['tid'];
//        print_r($res);
        echo '<br>';
        $update = "UPDATE `ticket` SET `finish`='1' WHERE `tid`='{$tid}'   LIMIT 1 ";
        $query1 = mysql_query($update);
        //遍历一遍，对比
        $finish = new user();
        $url = 'single.php?id='.$sid . '&store='.$store;
        $finish = $finish->sucess($url,$query1);
        exit;

    }
