<?php
header("Content-Type: text/html; charset=utf-8");
include 'common.php';
session_start();
$str=substr($_SERVER["PHP_SELF"],"0",strrpos($_SERVER["PHP_SELF"],"/"));
$str=substr($str,0,strrpos($str,"/"));
$str=md5($str);
$user=$_SESSION[$str];
$sex=$_GET['sex'];
$tel=$_GET['tel'];
$email=$_GET['email'];
$sql=("select * from user WHERE user='$user'");
$result=$db->query($sql);
$data=$result->fetch_assoc();
    if ($sex==1){
        $sql=("update user set sex='1'");
        $result=$db->query($sql);
    }else if ($sex==0){
        $sql=("update user set sex='0'");
        $result=$db->query($sql);
    };
    $sql=("update user set tel='$tel' ");
    $result=$db->query($sql);
    $sql=("update user set email='$email' ");
    $result=$db->query($sql);
    if ($result){
        $mess="修改成功";
        $src="personal.php";
        include_once "tiaozhuan.php";
        exit();
    }
?>
