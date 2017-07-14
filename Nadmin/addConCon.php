<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/1
 * Time: 18:25
 */
session_start();
$str=substr($_SERVER["PHP_SELF"],"0",strrpos($_SERVER["PHP_SELF"],"/"));
$str=substr($str,0,strrpos($str,"/"));
$str=md5($str);
if (!isset($_SESSION[$str])){
$mess="请登录！";
$src="../admin/index.php";
include_once "../admin/tiaozhuan.php";
exit();
}
include "../admin/common.php";
include "../lib/eachtable.php";
$obj=new All1();
$obj->listTree($db,"tables",0)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加内容列表页</title>
</head>
<body>
<?php echo $obj->str; ?>
</body>
</html>
