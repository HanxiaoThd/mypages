<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/1
 * Time: 18:25
 */
include "../admin/common.php";
include "../lib/eachtable.php";
$id=$_GET['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加内容展示页面</title>
    <link rel="stylesheet" href="../static/css/show.css">
</head>
<style>

</style>
<body>

<?php
$sql="select * from lists WHERE cid=".$id;
$result=$db->query($sql);
if (mysqli_num_rows($result)){

?>
<table>
    <tr>
        <th>缩略图</th>
        <th>标题</th>
        <th>关键词</th>
        <th>内容</th>
        <th>作者</th>
        <th>操作</th>
    </tr>
    <?php while ($row=$result->fetch_assoc()){?>
    <tr>
        <td><img src="<?php echo $row['thumbImg']?>" alt="" style="width: 140px;"></td>
        <td><?php echo $row['titles'];?></td>
        <td><?php echo $row['keywords']?></td>
        <td><?php echo  substr(strip_tags($row['con']),0,98);?></td>
        <td><?php echo $row['author']?></td>
        <td><a class="btn" href="delcon.php?id=<?php echo $row["id"];?>&cid=<?php echo $id;?>">删除  </a>/<a class="btn" href="../admin/editcon.php?id=<?php echo $row["id"];?>&cid=<?php echo $id;?>"> 编辑</a></td>
    </tr>
    <?php } ?>
</table>
<?php  } else{?>
<p class="none">没有任何内容</p>
<?php }?>
<a href="addConConCon.php?id=<?php echo $id;?>" class="add">
    添加内容
</a>
</body>
</html>
