<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/5/10
 * Time: 19:03
 */
include "common.php";
session_start();
$str=substr($_SERVER["PHP_SELF"],"0",strrpos($_SERVER["PHP_SELF"],"/"));
$str=substr($str,0,strrpos($str,"/"));
$str=md5($str);
if (isset($_SESSION[$str])){
    $mess="已经登录";
    $src="main.php";
    include_once "tiaozhuan.php";
    exit();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>欢迎登录</title>
    <link rel="stylesheet" href="../static/css/common.css">
    <link rel="stylesheet" href="../static/css/index.css">
</head>
<body>
<form action="load.php" method="post">
    <input type="text" required placeholder="用户名" name="user" id="user" autocomplete="off"><br>
    <input type="password" required placeholder="密码" name="pass" id="pass"><br>
    <input type="text" required placeholder="验证码" name="check" id="check" autocomplete="off">
    <img src="check.php" alt="" onclick="this.src='check.php?abc='+Math.random()" class="img"><br>
    <input type="submit" value="登录" name="upload" id="upload">
<!--    <input type="button" onclick="location.href='sign.php'" value="注册" id="sign"></input>-->
</form>

</body>
</html>
