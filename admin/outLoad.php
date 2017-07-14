<?php
session_start();
unset($_SESSION['name']);
$mess="退出登录成功";
$src="index.php";
include_once "tiaozhuan.php";