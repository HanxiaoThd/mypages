<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/2
 * Time: 11:04
 */
include "../admin/common.php";
$id=$_GET['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加内容</title>

    <script type="text/javascript" charset="utf-8" src="../static/editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../static/editor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../static/editor/lang/zh-cn/zh-cn.js"></script>
    <script src="../lib/uploadimg.js"></script>
</head>
<body>
<form action="addConCheck.php">
    标题：<input type="text" name="title" autocomplete="off" required><br>
    作者：<input type="text" name="author"autocomplete="off" required><br>
    关键词：<input type="text" name="keywords" autocomplete="off">
    <script id="editor" type="text/plain" style="width:450px;height:200px;" name="con"></script>
    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
    <input type="hidden" name="thumb" class="inputImg" value="">
     推荐位设置：<input type="checkbox" name="banner" value="1">轮播
    <input type="checkbox" name="rec" value="1">文章推荐
    <input type="checkbox" name="hot" value="1">热门
    <input type="checkbox" name="hot2" value="1">主页列表
        <input type="submit" value="提交">
</form>
</body>
<script>
    window.onload=function () {
        var ue = UE.getEditor('editor');
        let obj=new upload_1();
        obj.success=function (url) {
            document.querySelector(".inputImg").value=url;
        }
        obj.createView();
        
    };
    </script>
</html>

