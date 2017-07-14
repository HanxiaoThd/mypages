<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册</title>
    <script src="../static/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../static/css/index.css">
</head>
<style>
    .load{
        width:80%;
        height:40px;
        margin:10px auto;
        background-color: #9b4e54;
        color: #fff;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
    }
</style>
<body>
<form action="login.php" method="post">
    <input type="text" placeholder="用户名" name="user" id="user" autocomplete="off"><br>
    <div class="check" style="width: 30%;height: 30px; background-color: #9b4e54; color: #fff;margin: 6px auto;line-height: 30px; cursor: pointer">验证用户名</div>
    <br>
    <input type="password" placeholder="密码" name="pass" id="pass"><br>
    <input type="password" placeholder="再次输入密码" name="pass_tow" id="pass_two"><br>
    男:<input type="radio" name="sex" value="1">女:<input type="radio" name="sex" value="0"><br>
    电话: <input type="text" name="tel" id="tel"><br>
    <input type="button" onclick="location.href='sign.php'" value="注册" id="sign"></input>
    <div class="load">登录</div>
</form>
</body>

<script>
    $('.check').click(function () {
        $.ajax();
    });
    $('.load').click(function () {
        location.href="index.php"
    })
</script>

</html>
