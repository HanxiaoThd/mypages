<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/5/31
 * Time: 15:55
 */
session_start();
include "checkLoad.php";
include "../lib/eachtable.php";
include "common.php";
$add=new All();
$add->fun($db,'tables',0,0);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="checkCategory.php" method="get">
    <select name="pid" >
        <option value="0">一级标题</option>
        <?php
            echo $add->str;
        ?>
    </select>
        <input type="text" name="title" autocomplete="off">
        <input type="submit" value="提交">

</form>
</body>
</html>
