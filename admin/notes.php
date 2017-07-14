<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/10
 * Time: 23:04
 */
session_start();//开启session
include "checkLoad.php";
include 'common.php';
$sql="select * from notes";
$result=$db->query($sql);
$array=array();
while($row=$result->fetch_assoc()){
    $array[]=$row;
};
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
<table>
    <tr>
        <th>用户名</th>
        <th>留言</th>
        <th>是否允许留言</th>
    </tr>
    <?php foreach ($array as $v){?>
        <tr>
            <?php $sql2="select * from friend WHERE id={$v['users']}";
                $result2=$db->query($sql2);
                $row2=$result2->fetch_assoc();
            ?>
            <td><?php echo $row2['names']?></td>
            <td><?php echo $v['contents']?></td>
            <?php if($v['checkid']==1){?>
            <td>已同意<a href="checknotes.php?id=<?php echo $v['id'].'&ck='.$v['checkid']?>">修改</a></td>
            <?php } else{?>
            <td><a href="checknotes.php?id=<?php echo $v['id'].'&ck='.$v['checkid']?>">同意</a></td>
            <?php }?>
        </tr>
    <?php } ?>
</table>
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

</body>
</html>
