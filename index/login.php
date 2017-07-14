<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/12
 * Time: 14:14
 */
session_start();
include "../admin/common.php";
$user=$_POST["user"];
$pass=$_POST["password"];
$sql="select user,pass from friend WHERE user='$user'";
$result=$db->query($sql);
$data=$result->fetch_assoc();
if ($data){
    if ($data['pass']===$pass){
        $_SESSION["username"]=$user;
        $mess="登录成功";
        $src="../index/index.php";
        include "../admin/tiaozhuan.php";
        exit();
    }else{
        $mess="密码错误请重新登录";
        $src="load.php";
        include "../admin/tiaozhuan.php";
        exit();
    }
}else{
    $mess="账户不存在";
    $src="load.php";
    include "../admin/tiaozhuan.php";
}
