<?php



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
    <style>
        .imgbox{
            width:300px;
            height: 200px;
            text-align: center;
            overflow: hidden;
            position: relative;
        }
        .imgbox > img{
            width:100%;
        }
        .progress{
            width:0%;
            height:30px;
            position: absolute;
            bottom: 0;
            left:0;
            background: red;
        }
    </style>
</head>
<body>
    <form action="">
        <ul>
            <li> <span>文章缩略图</span>
                <input type="file" value="" id="upload">
                <div class="imgbox">
                    <img src="" alt="" class="img">
                    <div class="progress"></div>
                </div>
                <input type="hidden" id="imgurl" name="imgurl" value="" >
            </li>

            <li>
                <input type="submit" >
            </li>

        </ul>

    </form>
</body>
<script>
    let fileobj=document.querySelector('#upload');
    let imgobj=document.querySelector('.img');
    let progress=document.querySelector('.progress');
    class upload{
        constructor(fileobj,imgobj,progress,fun){
            this.fileobj=fileobj;
            this.imgobj=imgobj;
            this.progress=progress;
            this.size=20*1024*1024;
            this.type=['jpg','jpeg','png','svg','gif'];
        }
        change(){
           let that=this;
           this.fileobj.onchange=function () {
                   that.file=this.files[0];
        // console.log(this.files[0]);
        // 第一步将文件放置到页面中
               let fileread=new FileReader();
        // 实例化filereader对象
               fileread.readAsDataURL(that.file);
        // 将文件读取为数据
        // console.log(fileread.readAsDataURL(that.file))
               if(that.check()){
                   fileread.onload=function (e) {
        // 文件读取未完成后执行
        // console.log(e);  e.total是文件的字节，e.loaded是文件已经加载的字节，使用这个百分比来确定精度条progress的长度
        // target 中有 result 是浏览器将文件读取的格式，将这个数据储存在img的src中;
                   that.progress.style.width=e.loaded/e.total*100+"%";
                   that.imgobj.src=e.target.result;
        // 第二部将文件使用ajax异步存入数据库中
                   }
               }
           }
        }
        check(){
        // 检测图片是否符合要求，大小，格式
            let that=this;
            let type=that.file.name.split('.')[1];
            if(!that.type.includes(type)){
                alert('上传文件类型不正确');
                return false;
            }else if (that.file.size>that.size){
                alert("上传文件过大，请重新上传");
                return false;
            }
            return true;
        }

        uploadfile(){
            //创建ajax，利用FormData对象来传输数据；append('img',this.file);
            //formdata.get   formdata.append
            //ajax.upload.onprogress=function(e){}上传进度；
            let ajax=new XMLHttpRequest();
            ajax.open('POST',"uploadfile.php",'true');
            ajax.send();
        }
        success(fun){  //成功上传运行
                fun();
        }
    }
    let aa=new upload(fileobj,imgobj,progress);
    aa.change();
    $('#upload').change(function () {


    })
</script>
</html>
