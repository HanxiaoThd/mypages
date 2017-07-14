<?php
include "common.php";
$nid=$_GET['pid'];
$cid=$_GET['cid'];
$name=$_GET['tablename'];
$sql="update tables set pid='{$nid}',tablename='{$name}' WHERE id=".$cid;
$result=$db->query($sql);
if ($result) {
  $mess="修改成功";
  $src="adminCategory.php";
  include_once "tiaozhuan.php";
}else {
  $mess="修改失败";
  $src="adminCategory.php";
  include_once "tiaozhuan.php";
}
 ?>
