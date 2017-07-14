<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/1
 * Time: 9:32
 */
session_start();
include "checkLoad.php";
include "common.php";
include "../lib/eachtable.php";
$id=$_GET['id'];
$sql="select * from tables WHERE id=".$id;
$result=$db->query($sql);
$row=$result->fetch_assoc();
$fun=new All1();
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
<body>

<form action="editCategoryCon.php">
    <select name="pid" >
        <option value="0">一级标题</option>
        <?php
            $fun->fun($db,"tables",0,$row['pid']);
            echo $fun->str;
        ?>
    </select>
    <input type="hidden" name="cid" value="<?php echo $row['id']?>">
    <input type="text" name="tablename" value="<?php echo $row['tablename'];?>">
    <input type="submit" value="提交修改">
</form>

</body>
</html>
