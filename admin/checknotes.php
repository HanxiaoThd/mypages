<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/18
 * Time: 23:36
 */
include "common.php";
$id=$_GET['id'];
$ck=$_GET['ck'];
if ($ck==1){
    $sql="update notes set checkid='0' WHERE id={$id}";
    $result=$db->query($sql);
}else{
    $sql="update notes set checkid='1' WHERE id={$id}";
    $result=$db->query($sql);
}
if ($result){
    $mess="成功";
    $src="notes.php";
    include "tiaozhuan.php";
}else{
    $mess="失败";
    $src="notes.php";
    include "tiaozhuan.php";
}