<?php
/**
 * Created by PhpStorm.
 * User: hanxiao
 * Date: 2017/6/21
 * Time: 上午10:57
 */
session_start();
$name=$_SESSION['users'];
include "../admin/common.php";
$tel=isset($_POST['tel'])?$_POST['tel']:"";
$email=isset($_POST['email'])?$_POST['email']:"";
$name=isset($_POST['names'])?$_POST['names']:"";
$thumb=isset($_POST['thumb'])?$_POST['thumb']:"";
$sql="update friend set names='{$name}',tel='{$tel}',email='{$email}',portrait='{$thumb}' WHERE user='{$name}'";
$result=$db->query($sql);
if ($result){
    $mess="修改成功";
    $src="index.php";
    include "../admin/tiaozhuan.php";
}else{
    $mess="修改失败";
    $src="personal.php";
    include "../admin/tiaozhuan.php";
}