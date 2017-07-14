<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/19
 * Time: 8:48
 */
session_start();
include "../admin/common.php";
$name=$_POST['name'];
$pass=$_POST['upass'];
$sql="select user from friend WHERE user={$name}";
$result=$db->query($sql);
if (!$result){
    $sql="insert into friend (user,pass) VALUES ('{$name}',$pass)";
    $result=$db->query($sql);
    if ($result){
        $_SESSION['users']=mysqli_insert_id();
        $info=array("success");
        $j=json_encode($info);
        echo $j;
        exit();
    }
}
$info=array("a"=>"b");
$j=json_encode($info);
echo $j;