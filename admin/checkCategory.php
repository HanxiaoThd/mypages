<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/1
 * Time: 8:31
 */

include "common.php";
$pid=$_GET['pid'];
$title=$_GET['title'];
$sql="insert into tables (pid,tablename)  VALUES ({$pid},'{$title}')";
$result=$db->query($sql);
if ($result){
    $mess='创建成功';
    $src='addCategory.php';
    include_once 'tiaozhuan.php';
}else{
    $mess='创建失败';
    $src='addCategory.php';
    include_once 'tiaozhuan.php';
}