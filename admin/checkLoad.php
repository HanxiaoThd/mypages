<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/2
 * Time: 16:44
 */
$str=substr($_SERVER["PHP_SELF"],"0",strrpos($_SERVER["PHP_SELF"],"/"));
$str=substr($str,0,strrpos($str,"/"));
$str=md5($str);
if (!isset($_SESSION[$str])){
    $mess="请登录！";
    $src="index.php";
    include_once "tiaozhuan.php";
    exit();
}