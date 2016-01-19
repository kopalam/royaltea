<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/9
 * Time: 下午6:49
 */
session_start();
if(empty($_SESSION['username']) && empty($_SESSION['groups'])){
    echo "<script>location.href='../login.php';</script>";
}elseif($_SESSION['groups']==1){
    $url='line.php?$sid='.$_SESSION['id'].'&store='.$_SESSION['store'];
    echo "<script>location.href='$url';</script>";
}elseif($_SESSION['groups']==2){
    $url='single.php?$sid='.$_SESSION['id'].'&store='.$_SESSION['store'];
    echo "<script>location.href='$url';</script>";
}