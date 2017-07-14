<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/19
 * Time: 11:51
 */
session_start();
if(isset($_SESSION['users'])){
    unset($_SESSION['users']);
    echo "success";
}else{
    echo "error";
};