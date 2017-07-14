<?php
include 'common.php';
$str=substr($_SERVER["PHP_SELF"],"0",strrpos($_SERVER["PHP_SELF"],"/"));
$str=substr($str,0,strrpos($str,"/"));
$str=md5($str);
$user=$_POST['user'];
$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$sql=("select * from user WHERE user='$user'");
$result=$db->query($sql);
$data=$result->fetch_assoc();
if ($oldpass == $data['pass']){
    $sql=("update user set pass='$newpass'");
    $result=$db->query($sql);
    if ($result){
        $mess="修改成功";
        $src="index.php";
        session_start();
        unset($_SESSION[$str]);
        include_once "tiaozhuan.php";
        exit();
    }else{
        $mess="修改失败";
        $src="personal.php";
        include_once "tiaozhuan.php";
        exit();
    }
}else{
    $mess="原始密码输入错误，请重新输入";
    $src="personal.php";
    include_once "tiaozhuan.php";
    exit();
};
