<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/8
 * Time: 下午6:15
 */
    //出票处理
require_once ('include.php');

if(isset($_REQUEST['sid'])){
    $sid = $_REQUEST['sid'];
    $store = $_SESSION['store'];
    $ticket = new user();
    $ticket = $ticket->single($sid);


}

