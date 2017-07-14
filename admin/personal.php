<?php
session_start();//开启session
include "checkLoad.php";
include 'common.php';
$str=substr($_SERVER["PHP_SELF"],"0",strrpos($_SERVER["PHP_SELF"],"/"));
$str=substr($str,0,strrpos($str,"/"));
$str=md5($str);
$user=$_SESSION[$str];//获取当前登录的用户名
$sql="select sex,tel,email from user WHERE user='$user' ";//查询用户信息
$db->query('set names utf8');
$result=$db->query($sql);
$data=$result->fetch_assoc();
$sex=$data['sex'];
$men='';
$women='';
if ($sex=='1'){
    $men='checked';
}else if ($sex=='0'){
    $women='checked';
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人信息</title>
    <script src="../static/js/jquery.min.js"></script>
    <link rel="stylesheet" href="../static/css/common.css">
    <link rel="stylesheet" href="../static/css/personal.css">
</head>
<body>
    <form action="personalchange.php" method="get">
        <ul>
            <li>
                <h3>
                    <span>用户名：</span>
                    <?php echo $user?>
                </h3>
            </li>
            <li>
                <span class="sex">男</span>
                <input type="radio"<?php echo $men?> name="sex" value="1">
                <span class="sex">女</span>
                <input type="radio"<?php echo $women?> name="sex" value="0">
            </li>
            <li >
                <span class="text">电话：</span>
                <input class="message" type="text" name="tel" autocomplete="off" value="<?php echo $data['tel']?>">
            </li>
            <li>
                <span class="text">email：</span>
                <input class="message" type="text" name="email" autocomplete="off" value="<?php echo $data['email']?>">
            </li>
            <li>
                <input type="submit" value="提交修改" name="upChange" id="upChange">
            </li>
        </ul>
    </form>
    <li><button class="change">修改密码</button></li>
    <form action="changepass.php" method="post" id="changebox">
        <ul>
            <li>
                <input type="hidden" name="user" value="<?php echo $user ?>">
                <span>原始密码：</span>
                <input class="message" type="password" name="oldpass" id="oldpass">
            </li>
            <li>
                <span>新密码：</span>
                <input class="message" type="password" name="newpass" id="newpass">
            </li>
            <li>
                <span>确认密码：</span>
                <input class="message" type="password" name="checkpass">
            </li>
            <li>
                <input type="submit" value="提交修改" class="change">
            </li>
        </ul>
    </form>
</body>
<script>
    $('.change').click(function () {
        $('#changebox').slideToggle('fast');
    })
</script>
</html>
