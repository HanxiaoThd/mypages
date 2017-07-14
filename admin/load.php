<?php
//验证码是否正确
session_start();
include 'common.php';
$check=$_POST['check'];
$in_check=$_SESSION['checkeds'];
if ($check!=$in_check){
    $mess="验证码不正确";
    $src="index.php";
    include_once "tiaozhuan.php";
    exit();
}else {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql="select user,pass from user WHERE user='$user'";
    $result=$db->query($sql);
    $data=$result->fetch_assoc();
    if ($data){
        if ($data['pass']===$pass){
            $str=substr($_SERVER["PHP_SELF"],"0",strrpos($_SERVER["PHP_SELF"],"/"));
            $str=substr($str,0,strrpos($str,"/"));
            $str=md5($str);
            $_SESSION[$str]=$user;
            $mess="登陆成功";
            $src='main.php';
            include "tiaozhuan.php";
        }else{
            $mess="密码错误，请重新登录";
            $src='index.php';
            include "tiaozhuan.php";
        }
    }else{
        $mess="账户不存在";
        $src="index.php";
        include "tiaozhuan.php";
    }
}