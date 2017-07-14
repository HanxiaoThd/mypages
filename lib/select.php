<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/18
 * Time: 17:59
 */
function checkname($db){
    $name=$_REQUEST['sinName'];
    $sql="select user from friend";
    $result=$db->query($sql);
    while($row=$result->fetch_assoc()){
        if ($row['user']==$name){
            return "false";
            exit();
        }
    }
    return "true";
}