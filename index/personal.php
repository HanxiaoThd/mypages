<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/19
 * Time: 9:30
 */

session_start();
if(!isset($_SESSION["users"])){
    echo  "<script> alert('请登录');location.href='index.php'</script>";
    exit();
};
include "../admin/common.php";
$name=$_SESSION["users"];
$sql="select * from friend WHERE user='{$name}'";
$result=$db->query($sql);
$row=$result->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人中心</title>
    <link rel="stylesheet" href="../static/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../static/css/index/personal.css">
    <script src="../static/js/jquery.min.js"></script>
    <script src="../static/js/bootstrap.min.js"></script>
    <script src="../static/js/jquery.validate.min.js"></script>
    <script src="../lib/uploadimg.js"></script>
</head>
<body>
<div class="container" >
<!--<div class="row"><div class="col-xs-12" style="background-image: url('../src/img/index-bg.jpg');background-size: cover;background-position: center;height: 320px"></div></div>-->
    <div class="row">
        <div class="col-md-5">
            <form action="personalch.php" method="post">
                <ul>
                    <li>
                        <h4>
                            <span>用户名：<?php if($row['names']){echo $row["names"];}else {echo "请设置用户名<br>" ?><input type="text" name="names" placeholder="用户名">
                                <?php }?></span>
                        </h4>
                    </li>
                    <li>
                        <span class="text">电话：</span>
                        <input class="message" type="text" name="tel" autocomplete="off" value="<?php if($row['tel']){echo $row['tel'];}?>">
                    </li>
                    <li>
                        <span class="text">email：</span>
                        <input class="message" type="text" name="email" autocomplete="off" value="<?php if($row['email']){echo $row['email'];}?>">
                    </li>
                    <li>
                        <input type="submit" value="提交修改" name="upChange" id="upChange">
                    </li>
                </ul>
            </form>
        </div>
        <div class="col-md-7">
            <form action="changepass.php" method="post" id="changebox" style="display: block">
                <ul>
                    <li>
                        <input type="hidden" name="user" value="">
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
        </div>
    </div>
</div>
</body>
<script>
    var obj=new upload_1();
    obj.createView();
</script>
</html>