<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/10
 * Time: 下午5:51
计算排队等候人数 sum.php
 */

    require_once 'include.php';
    function sum($table)
{
    $sql = "SELECT * FROM '{$table}' WHERE `finish` = 0";
    $res = new royaltea();
    $totalRows = $res->totalRow($sql);
//    $array = $res->fetch_array($sql);
    $totalRows = $totalRows - 1;
    echo $totalRows;
}



