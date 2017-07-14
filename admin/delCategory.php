<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/1
 * Time: 9:24
 */
include "common.php";
$id=$_GET['id'];
$sql="select * from tables WHERE pid=".$id;
$result=$db->query($sql);
if (!$row=$result->fetch_assoc()){
    $sql="select * from lists WHERE cid=".$id;
    $result=$db->query($sql);
    if (!$row=$result->fetch_assoc()){
        $sql="delete from tables WHERE id=".$id;
        $result=$db->query($sql);
        if ($result){
            $mess='删除成功';
            $src='adminCategory.php';
            include_once 'tiaozhuan.php';
        }else{
            $mess='删除失败';
            $src='adminCategory.php';
            include_once 'tiaozhuan.php';
        }
    }else{
        $mess="栏目下有内容，请先删除内容";
        $src="adminCategory.php";
        include_once "tiaozhuan.php";
    }
}else{
  $mess="此栏目下有子栏目，请先删除子栏目";
  $src="adminCategory.php";
  include_once "tiaozhuan.php";
}
