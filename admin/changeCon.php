<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/12
 * Time: 9:25
 */
include "common.php";
$id=$_GET["id"];
$cid=$_GET["cid"];
$title=$_GET["title"];
$con=$_GET["con"];
$author=$_GET["author"];
$keywords=$_GET["keywords"];
$thumb=isset($_GET['thumb'])?$_GET['thumb']:0;
$time=date("Y-m-d");
$rec=isset($_GET["rec"])?$_GET["rec"]:0;
$banner=isset($_GET["banner"])?$_GET["banner"]:0;
$hot=isset($_GET["hot"])?$_GET["hot"]:0;
$hot2=isset($_GET['hot2'])?$_GET['hot2']:0;
$sql="update lists set titles='{$title}',keywords='{$keywords}',hot2='{$hot2}',con='{$con}',times='{$time}',author='{$author}',rec='{$rec}',hot='{$hot}',banner='{$banner}',thumbimg='{$thumb}' WHERE id=".$id;
$result=$db->query($sql);
if ($result){
    $mess="修改成功";
    $src="editcon.php?id={$id}&cid={$cid}";
    include "tiaozhuan.php";
}else{
    $mess="修改失败";
    $src="editcon.php?id={$id}&cid={$cid}";
    include "tiaozhuan.php";
}