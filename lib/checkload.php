<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/18
 * Time: 18:15
 */
include "../admin/common.php";
function checkload($db){
    $sql="select user,names,pass,email,tel from friend";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()){
        if($row['user']==$_REQUEST['uname']){
            if($row['pass']==$_REQUEST['upass']){
                return "true";
                exit();
            }
        }
    }
    return "false";
}