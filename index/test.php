<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/17
 * Time: 19:00
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script type="text/javascript" src="../static/js/jquery.min.js"></script>
    <script type="text/javascript" src="../static/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../static/js/jquery.validate.min.js"></script>
</head>
<body>
<form action="">
    <input type="text" name="aa">
    <input type="submit" value="tijiao">
</form>
</body>
<script>
    $('form').validate({
        rules:{
            aa:{
                required:true,
                minlength:2,
            }
        },
        messages:{
            aa:{
                required:"sadasd",
                minlength:'最少输入2',
            }
        }
    })
</script>
</html>
