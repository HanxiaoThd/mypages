<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        div{
            width:400px;
            height:300px;
            background-color: rgba(255,255,255,1);
            position: absolute;
            top:0;
            bottom:0;
            left:0;
            right:0;
            margin:auto;
            background-color: rgba(0,0,0,0.4);
        }
        body,html{
            width:100%;
            height:100%;
            overflow: hidden;
        }
        body{
            font-size: 20px;
            text-align: center;
        }
        p{
            font-size:18px;
            margin: auto;
            display: block;
            padding:12px 12px;
            box-sizing: border-box;
            width:100%;
            height:80px;
            line-height:20px;
            text-align: left;
            position: absolute;
            top:0;
            right:0;
            bottom:0;
            left:0;
            margin:auto;
            color: #ffffff;
        }
        p > span{
            color: red;
        }
        p > a {
            color: #000;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div>
        <p><?php  echo $mess ?>
页面将在
<span>3</span>
s后跳转，立即跳转请点击
<a href="<?php echo $src ?>">此链接</a>
</p>
</div>
</body>
</html>
<script>
    let i=3;
    let a=document.querySelector('a');
    let href=a.href;
    let t=setInterval(function(){
        i--;
        if(i==0){
            clearInterval(t);
            if (href=="http://localhost/mycms/admin/index.php"){
                top.location.href=href;
            }else{
                self.location.href=document.querySelector("a").href
            }
        }
        document.querySelector("span").innerHTML=i;
    },1000);
    a.onclick=function (e) {
        e.preventDefault();
        if (href=="http://localhost/mycms/admin/index.php"){
            top.location.href=href;
        }else{
            self.location.href=document.querySelector("a").href
        }
    };
</script>