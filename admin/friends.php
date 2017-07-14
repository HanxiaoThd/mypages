<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/10
 * Time: 23:05
 */
include "common.php";
$sql="select * from friend";
$result=$db->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../static/js/jquery.min.js"></script>
</head>
<body>
<table>
    <tr>
        <th>用户名</th>
        <th>头像</th>
        <th>电话</th>
        <th>邮箱</th>
    <!--<th>权限</th>-->
    <!--<th>更改权限</th>-->
    </tr>
    <?php while ($row=$result->fetch_assoc()){?>
        <tr>
            <td><?php echo $row['names']?></td>
            <td><img src="<?php echo $row['portrait']?>" alt="" style="width: 140px;"></td>
            <td><?php echo $row['tel']?></td>
            <td><?php echo  $row['email'];?></td>
<!--            <td><form >允许留言<input type="radio" name="limits" --><?php //if($row['limits']==1){echo 'checked';};?><!-- value="1" id="--><?php //echo $row['id']?><!--">无权限<input type="radio" name="nolimits" value="0" id="--><?php //echo $row['id']?><!--"></form></td>-->
<!--            <td><button con="--><?php //echo $row['id']?><!--">修改</button></td>-->
        </tr>
    <?php } ?>
</table>
</body>
<script>
//    $("button[con]").click(function () {
//        var id="#"+$(this).attr("con");
//        var con=$(id).attr("name");
//        console.log(con);
//    })
</script>
<style>
    *{
        margin:0;
        padding:0;
        text-decoration: none;
    }
    table{
        margin:40px auto;
        border:1px solid #E0E0E0;
    }
    th{
        width:160px;
        height:30px;
        text-align: center;
        font-size: 16px;
        background-color: #ffffff;
    }
    td{
        width:160px;
        text-align: center;
        height:30px;
        margin-top:6px;
        font-size: 14px;
        color: #999;
        background-color: #ffffff;

    }
    td > img{
        width:40px;
    }
    .none{
        width:200px;
        height:200px;
        margin:40px auto;
        background-color: #ffffff;
        text-align: center;
        line-height: 200px;
    }
    .add{
        color: #999;
        background-color: #ffffff;
        display: block;
        width:80px;
        height:30px;
        font-size: 16px;
        border-radius: 6px;
        line-height:30px;
        margin: 0px auto;
        border:1px solid #999999;
        text-align: center;
    }
    .btn{
        color: #999;
    }
</style>

</html>
