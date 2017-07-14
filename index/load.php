<?php
session_start();
include "../admin/common.php";
$user=$_POST['name'];
$pass=$_POST['upass'];
$sql="select user,pass,names,email,tel,id,limits,portrait from friend";
$result=$db->query($sql);
if ($result) {
    $array = array();
    while ($row = $result->fetch_assoc()) {
        $array[] = $row;
    }

    foreach ($array as $k => $v) {
        if ($user == $v['user']) {
            if ($pass == $v['pass']) {
                $_SESSION["users"] = $v['id'];
                $info = array($v);
                $j = json_encode($info);
                echo $j;
                exit();
            }
        }
    }
}else{
    echo "false";
}
