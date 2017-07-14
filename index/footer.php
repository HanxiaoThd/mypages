
<link rel="stylesheet" href="../static/css/index/footer.css">


<footer>
<div class="container">
    <div class="row">
        <div class="col-md-3 col-xs-12 col-sm-6">
            <div class="foot-title">
                <h4>DWTEDX</h4>
                <ul>
                    <li>深度剖解各个领域业务流程、全面展示自己的所长及个人发展新思路</li>
                    <li>Phone: <span>18035182254</span></li>
                    <li>Email： <a href="mailto:651619709@qq.com">651619709@qq.com</a></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>

</footer>
<script>
    // 登录注册表单验证
    $('#loginform').validate({
        rules:{
            user:{
                required:true,
                minlength:6,
            },
            password:{
                required:true,
                minlength:6,
            },
        },
        messages:{
            user:{
                required:"请输入账号",
                minlength:"用户名长度为6为",
            },
            password:{
                required:"请输入密码",
                minlength:"用户名长度为6为",
            },
        },
        submitHandler:function (form) {
            var user=$("input[name='user']").val(),
                pass=$("input[name='password']").val();
            $.ajax({
                type:"post",
                url:"load.php",
                dataType:"json",
                data:"name="+user+"&upass="+pass,
                success:function (e) {
                    var obj=e[0];
                    $("p[email]").html(obj['email']);
                    $("p[tel]").html(obj['tel']);
                    $("#alert").html("登录成功").stop().fadeIn().delay(500).fadeOut(500);
                    $("#loa").css("display","none").next("#loginform").css("display","none");
                    $("#welcome").html("欢迎"+obj['names']).slideDown().next(".personal").fadeIn();
                    $("#user").val(obj['id']);
                },
                error:function (e) {
                    alert("登录失败，可能为网路错误，请重新登录")
                }

            })

        }
    });
//注册
    $('#signform').validate({
        rules:{
            sinName:{
                required:true,
                minlength:6,
                remote:{
                    url:'checkmember.php',
                    dataType:'json',
                    data:{
                        sinName:function () {
                            return $('#account').val();
                        }
                    }
                },
            },
            sinPass:{
                required:true,
                minlength:6,
            },
            againPass:{
                required:true,
                equalTo:"#password",
            },
        },
        messages:{
            sinName:{
                required:"请输入账号",
                remote:"已有账号",
                minlength:'最少输入六位',
            },
            sinPass:{
                required:"请输入密码",
                minlength:'最少输入六位',
            },
            againPass:{
                required:"请再次输入密码",
                equalTo:"两次输入不一致",
            }
        },
        submitHandler:function (form) {
            var user1=$("#account").val(),
                pass1=$("#password").val();
            $.ajax({
                type:"post",
                url:"sign.php",
                dataType:"json",
                data:"name="+user1+"&upass="+pass1,
                success:function (e) {
                    $("#alert").html("注册成功").fadeIn().delay(500).fadeOut();
                    location.href="personal.php";
                },
                error:function (e) {
                    $("#alert").html("注册失败").fadeIn().delay(500).fadeOut();
                },

            });
        }
    });
//    退出登录
    $(".out").click(function () {
        $.ajax({
            url:"out.php",
            type:'get',
            data:"out",
            success:function (e) {
                $("#alert").html("退出成功").stop().fadeIn().delay(500).fadeOut(500);
                $("#welcome").css("display","none").next(".personal").css("display","none");
                $("#loa").slideDown().next("#loginform").fadeIn();
                $("#user").val("false");

            },
            error:function (e) {
//                console.log("error")
                $("#alert").html("退出失败").fadeIn().delay(500).fadeOut(500);
            }
        })
    })
</script>
</body>
</html>