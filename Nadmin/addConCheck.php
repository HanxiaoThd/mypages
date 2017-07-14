<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/2
 * Time: 11:09
 */

include "../admin/common.php";
$id=$_GET['id'];
$title=$_GET['title'];
$author=$_GET['author'];
$con=$_GET['con'];
$keywords=$_GET['keywords'];
$rec=isset($_GET["rec"])?$_GET['rec']:0;
$banner=isset($_GET["banner"])?$_GET['banner']:0;
$hot=isset($_GET["hot"])?$_GET['hot']:0;
$thumb=isset($_GET["thumb"])?$_GET['thumb']:"";
$hot2=isset($_GET['hot2'])?$_GET['hot2']:"";
$time=date("Y-m-d");
$sql="insert into lists (titles,cid,author,con,rec,banner,hot,times,thumbimg,keywords,hot2) VALUES ('{$title}','{$id}','{$author}','{$con}','{$rec}','{$banner}','{$hot}','{$time}','{$thumb}','{$keywords}','{$hot2}')";
$result=$db->query($sql);
if ($result){
 $mess="添加成功";
 $src="../Nadmin/addConConCon.php?id={$id}";
 include_once "../admin/tiaozhuan.php";
}else {
    $mess="添加失败";
    $src="../Nadmin/addConConCon.php?id={$id}";
    include "../admin/tiaozhuan.php";
}
?>


