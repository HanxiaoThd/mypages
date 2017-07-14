<?php

session_start();//开启session
    include "checkLoad.php";
    include "common.php";
$str=substr($_SERVER["PHP_SELF"],"0",strrpos($_SERVER["PHP_SELF"],"/"));
$str=substr($str,0,strrpos($str,"/"));
$str=md5($str);
    $user = $_SESSION[$str];//获取当前登录的用户名
    date_default_timezone_set('Asia/Shanghai');


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>主界面</title>
    <link rel="stylesheet" href="../static/css/common.css">
    <link rel="stylesheet" href="../static/css/main.css">
    <script src="../static/js/jquery.min.js"></script>
</head>
<body>
<section id="title">
    <h1>后台管理系统</h1>
    <p><span><a href="../index/index.php" style="color: #ffffff;">进入主页 </a> </span><span><?php echo date("Y-m-d")?> </span> 欢迎 &nbsp;<?php echo $user?><a href="outLoad.php">退出登录</a></p>
</section>
<section id="main">
    <ul id="box">
        <li>
            <span>个人信息</span>
            <ul >
                <li>
                    <a href="personal.php" target="window">信息修改</a>
                </li>
            </ul>
        </li>
        <li>
            <span>栏目管理</span>
            <ul>
                <li>
                    <a href="addCategory.php" target="window">添加栏目</a>
                </li>
                <li>
                    <a href="adminCategory.php" target="window">管理栏目</a>
                </li>
            </ul>
        </li>
        <li>
            <span>内容管理</span>
            <ul>
                <li><a href="../nAdmin/addContent.php" target="window">添加内容</a></li>
            </ul>
        </li>
        <li>
            <span>用户管理</span>
            <ul>
                <li>
                    <a href="notes.php" target="window">留言管理</a>
                </li>
                <li>
                    <a href="friends.php" target="window">用户管理</a>
                </li>

            </ul>
        </li>
    </ul>

    <iframe src="welcome.html" frameborder="0" name="window">

    </iframe>
</section>
</body>
<script>
    $('#box >li >span').click(function () {
        $(this).next('ul').slideToggle('fast');
    })
</script>
</html>
