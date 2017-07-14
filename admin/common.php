<?php
header("content-type:text/html;charset=utf8");
$db=new mysqli('localhost','root','root','mysms');
$db->query("set names utf8");
date_default_timezone_set("Asia/Shanghai");