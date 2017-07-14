<?php
/**
 * Created by PhpStorm.
 * User: hanxiao
 * Date: 2017/6/21
 * Time: 下午5:48
 */
include "../admin/common.php";
$con=$_POST["mescon"];
$pid=$_POST["pid"];
$upid=$_POST["upid"];
$user=$_POST["user"];

//upid/checkid/pid/contents/times
date_date_set("Asia/Shanghai");
$date=date("Y-m-d");
$sql="insert into notes (checkid,pid,users,contents,upid,times) VALUES (1,'{$pid}','{$user}','{$con}','{$upid}','{$date}')";
$result=$db->query($sql);
if ($result){
    $sql="select * from friend WHERE id=".$user;
    $result=$db->query($sql);
    $row=$result->fetch_assoc();
    $array=array($row,$date);
    $j=json_encode($array);
    echo $j;
}else{
    echo "false";
}