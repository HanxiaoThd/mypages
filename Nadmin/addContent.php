<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/1
 * Time: 18:17
 */
include "../admin/common.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body,html{
        width:100%;
        height:100%;
        overflow: hidden;
    }
    *{
        margin:0;
        padding:0;
    }
    .list,.show{
        width:20%;
        height:100%;
        border:1px solid #000;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        float: left;
    }
    .show{
        width:80%;
        border-left:none;
    }
</style>
<body>
<iframe src="addConCon.php" frameborder="0" class="list" name="list">

</iframe>
<iframe src="" frameborder="0" class="show" name="show">

</iframe>
</body>
</html>
