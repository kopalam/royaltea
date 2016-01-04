<?php
/**
 * Created by PhpStorm.
 * User: kopa
 * Date: 16/1/2
 * Time: 下午4:26
 */

    session_start();
    session_unset();
    echo '<script language="javascript">
                        alert("你已退出登陆~~！！");
                        location.href="../royaltea/login.php";
                        </script> ';