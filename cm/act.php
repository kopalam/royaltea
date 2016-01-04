<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 15/12/27
 * Time: 下午3:57
 */
    require_once '../include.php';
    if(isset($_REQUEST['act'])){
        $act = $_REQUEST['act'];
        if($act == 'del'){
            $sid = $_REQUEST['sid'];
            $del = new royaltea('store',$sid);
            $del = $del->del('store',$sid);
        }
    }