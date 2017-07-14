<?php
header("content-type:image/png");
session_start();
$img=imagecreatetruecolor(150,50);
//获取颜色
function getColor($img,$type='q'){
    if($type=='q'){
        $min=120;
        $max=240;
    }else if($type=='s'){
        $min=10;
        $max=120;
    }
    return imagecolorallocate($img,mt_rand($min,$max),mt_rand($min,$max),mt_rand($min,$max));
//	imagecolorallocate 参数为创建的画布，rgb
}
//背景颜色
imagefill($img,0,0,getColor($img));
//画线
for($i=0;$i<5;$i++){
    imageline($img,mt_rand(0,150),mt_rand(0,50),mt_rand(0,150),mt_rand(0,50),getColor($img,"q"));
}
//画点
for($n=0;$n<20;$n++){
    imagesetpixel($img,mt_rand(0,150),mt_rand(0,50),getColor($img,'s'));
}
//写字
$text="0123456789abcdefghijklmnopqrstuvwxyz";
$str="";

for($m=0;$m<4;$m++){
    $n=substr($text,mt_rand(0,strlen($text)),1);
    $str.=$n;
    imagettftext($img,mt_rand(20,40),mt_rand(-30,30),mt_rand($m*40+5,$m*40+40),mt_rand(20,40),getColor($img,'s'),'../static/font/four.ttf',$n);
}
$_SESSION['check']=$str;
imagepng($img);
//echo $arr;
