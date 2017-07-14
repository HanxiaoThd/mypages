<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/1
 * Time: 8:57
 */
session_start();
include "checkLoad.php";
include 'common.php';
include '../lib/eachtable.php';
$table=new All();
$table->table($db,'tables',0);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理栏目</title>
</head>
<body>
<?php echo $table->str;
?>
</body>
</html>
