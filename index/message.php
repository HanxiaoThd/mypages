<?php
/**
 * Created by PhpStorm.
 * User: hanxiao
 * Date: 2017/6/21
 * Time: 上午10:24
 */

include "../admin/common.php";
$text=$_POST['text'];
$id=$_POST["id"];
$cid=$_POST["cid"];
$sql="insert into notes (checkid,pid,users,contents) VALUE (1,{$cid},{$id},'{$text}')";
$result=$db->query($sql);
if ($result){
    $nid=mysqli_insert_id($db);
    $sql="select names,portrait,user from friend WHERE id={$id}";
    $result=$db->query($sql);
    if ($row=$result->fetch_assoc()) {
        $array=array($row);
    }
    $array[]=$nid;
    $j=json_encode($array);
    echo $j;
}else{
    echo "error";
}
