<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/12
 * Time: 8:39
 */
include "common.php";
$id=$_GET["id"];
$pid=$_GET["cid"];
$sql="select titles,author,con,times,rec,banner,hot,thumbimg,keywords,hot2 from lists WHERE id=".$id;
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
    <title>Document</title>
    <script type="text/javascript" charset="utf-8" src="../static/editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../static/editor/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="../static/editor/lang/zh-cn/zh-cn.js"></script>
    <script src="../lib/uploadimg.js"></script>
</head>
<body>
<form action="changeCon.php">
    标题: <input type="text" name="title" value="<?php echo $row['titles']?>"><br>
    <div con='<?php echo $row['con']?>'class="con"> </div>
    作者：<input type="text" name="author" value="<?php echo $row["author"]?>"><br>时间：<?php echo $row["times"];?><br>
    关键词：<input type="text" name="keywords" value="<?php echo $row['keywords']?>">
    内容:  <script id="editor" type="text/plain" style="width:450px;height:200px;" name="con" ></script>
    <input type="hidden" value="<?php echo $id?>" name="id">
    <input type="hidden" value="<?php echo $pid?>" name="cid">
    <input type="hidden" name="thumb" class="inputImg" value="<?php echo $row['thumbimg']?>">
    推荐位设置：<input type="checkbox"<?php if($row["banner"]==1){ echo "checked=checked";}?> name="banner" value="1">轮播
        <input type="checkbox"<?php if($row["rec"]==1){ echo "checked=checked";}?> name="rec" value="1">文章推荐
        <input type="checkbox" <?php if($row["hot"]==1){ echo "checked=checked";}?> name="hot" value="1">热门
        <input type="checkbox" <?php if($row["hot2"]==1){ echo "checked=checked";}?> name="hot2" value="1">主页列表
    <input type="submit" value="提交">
</form>
<script>
    var ue = UE.getEditor('editor');
    ue.addListener("ready",function (editor) {
        setContent();
    })
function setContent(isAppendTo) {
    ue.execCommand('insertHtml', document.querySelector(".con").getAttribute("con"));
}
    let inputImg=document.querySelector(".inputImg");
    let obj=new upload_1();
    let value=inputImg.value;
    obj.url="../Nadmin/upload.php";
    obj.success=function (url) {
        inputImg.value=url;
    }
    obj.createView();
    if (value){
        obj.createImg(value);
        obj.imgBoxArr.forEach((val)=>{
            val.addEventListener("mouseover",function () {
                this.firstElementChild.style.display = "block";
                this.firstElementChild.onclick = function () {
                    let parent = this.parentNode.parentNode;
                    inputImg.value="";
                    obj.box.removeChild(parent);
                };
            });

            val.addEventListener("mouseout",function () {
                this.firstElementChild.style.display = "none";

            });
        });

    }
</script>
</html>
