<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/11
 * Time: 11:38
 */
include "../admin/common.php";
$id=$_GET["id"];
$cid=$_GET["cid"];
$sql="delete  from lists WHERE id=".$id;
$result=$db->query($sql);
if ($result){
    $mess="删除成功";
    $src="show.php?id=".$cid;
    include "../admin/tiaozhuan.php";
}else{
    $mess="删除失败";
    $src="show.pgp?id=".$cid;
    include "../admin/tiaozhuan.php";
}
