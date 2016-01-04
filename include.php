<?php

	session_start();
	define('ROOT',dirname(__FILE__));
    error_reporting(0);
	set_include_path('.'.PATH_SEPARATOR.ROOT.'/func'.PATH_SEPARATOR.ROOT.'/config'.PATH_SEPARATOR.ROOT.'/phpqrcode');
	require_once "config/config.php";
    require_once "func/rbac.php";
    require_once "phpqrcode/phpqrcode.php";

?>