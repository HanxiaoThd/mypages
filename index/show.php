<?php
session_start();
include "../admin/common.php";
include "header.php";
$id=$_GET['id'];
$sql="select * from lists WHERE id={$id}";
$result=$db->query($sql);
$row=$result->fetch_assoc();

?>
<link rel="stylesheet" href="../static/css/index/show.css">
<div class="container">
    <div class="col-xs-12">
        <h2 class="s-title">
            <?php echo $row['titles']?>
        </h2>
        <div class="author">
            <span><?php echo $row['author']?> </span>
            <span> <?php echo $row['times']?></span>
        </div>
        <div class="s-con"><?php echo $row['con']?></div>
    </div>
</div>
<div class="messageBox container">
    <div class="row">
        <div class="col-xs-12 talkbox">
            <textarea id="talk" placeholder="表达你的观点，可以输入120个字符" name="message"></textarea>
            <div class="textalert"></div>
            <button id="mesbtn">发表</button>
        </div>
    </div>
    <div class="row">
        <ul class="col-xs-12 mesp">
        <?php
        $sql="select * from notes WHERE pid={$id} AND upid=0";
        $result=$db->query($sql);
        $array=array();
        while ($row=$result->fetch_assoc()){
            $array[]=$row;
        }
        foreach ($array as $v){
        ?>
            <li  class="mesBox">
                <?php
                $sql="select * from friend WHERE id={$v['users']}";
                $result=$db->query($sql);
                $row=$result->fetch_assoc();
                $name=isset($row['names'])?$row['names']:$row['users'];
                if ($row['portrait']==""){
                    $head="../src/img/index/2.jpg";
                }else{
                    $head=$row['portrait'];
                }
                ?>
                <div class="headimg" style="background-image:url('<?php echo $head?>') ">
                    <div class="name">
                      <?php echo $name ?>
                    </div>
                </div>
                <div class="line"></div>
                <div class="titlebox">
                    <div class="con">
                        <?php echo $v["contents"]?>
                        <div class="conbtn" value="<?php echo $v['id']?>">
                            回复
                        </div>
                    </div>
                    <?php
                        $sql="select * from notes WHERE upid={$v['id']} AND pid={$id}";
                        $result=$db->query($sql);
                        $brr=array();
                        while ($row=$result->fetch_assoc()){
                            $brr[]=$row;
                        }
                        foreach ($brr as $vb){
                    ?>
                            <?php
                            $sql="select * from friend WHERE id={$vb['users']}";
                            $result=$db->query($sql);
                            $row=$result->fetch_assoc();
                            if ($row['portrait']==""){
                                $head2="../src/img/index/2.jpg";
                            }else{
                                $head2=$row['portrait'];
                            }
                            ?>
                    <div class="conlist">
                        <div class="listhead" style="background-image: url(<?php echo $head2?>);"></div>
                        <div class="listname"><?php echo $row['names']?><span><?php echo $vb["times"]?></span></div>
                        <div class="listcon"><?php echo $vb['contents']?></div>
                    </div>
                    <?php }?>
                </div>
            </li>
        <?php }?>
            <div class="listalert">回复成功</div>
        </ul>
    </div>
</div>
    <input type="hidden" value="<?php echo $id?>" id="cid">
    <script >
        $('#mesbtn').click(function () {
            var user=$("#user").val();
            var cid=$("#cid").val();
            if(user=='false'){
                $(".textalert").html("请登陆").stop().fadeIn().delay(500).fadeOut();
                return;
            }
            var text=$("#talk").val();
            if (!text=="") {
                var js={
                    "text":text,
                    "id":user,
                    "cid":cid
                };
                $.ajax({
                    type: "post",
                    url: "message.php",
                    dataType: "json",
                    data: js,
                    success: function (e) {
                        $(".textalert").html("回复成功").fadeIn().delay(500).fadeOut();
                        $("#talk").val("");
                        var box=$("<li class='mesBox'>");
                        var head = $("<div class='headimg'>");
                        var img=e[0]['portrait'];
                        if(e[0]['portrait']==""){
                            img="url('../src/img/index/2.jpg')";
                        }else {
                            img="url("+img+")";
                        }
                        var name=e[0]['names']==""?e[0]['user']:e[0]['names'];
                        var titlebox=$("<div class='titlebox'>");
                        head.css("background-image",img).append($("<div class='name'>").html(name));
                        var con=$("<div class='con'>").html(text).append($("<div class='conbtn'>").html("回复"));
                        titlebox.append(con);
                        box.append(head).append($("<div class='line'>")).append(titlebox);
                        $(".mesp").append(box);
                    },
                    error: function (e) {
                        $(".textalert").html("回复失败").fadeIn().delay(500).fadeOut();
                    }
                });
            }else {
                $(".textalert").html("请写内容").fadeIn().delay(500).fadeOut();

            }

        });
        $('div').delegate(".conbtn","click",btn_con)
        function btn_con () {
            var user=$("#user").val();
            var cid=$("#cid").val();
            var uid=$(this).attr("value");
            var parent=$(this).parents(".titlebox");
            var con=$(this).parents(".con");
            if(user=='false'){
                $(".listalert").html("请登陆").fadeIn().delay(500).fadeOut();
                return;
            }
            if(!$("#listinput")[0]){
                $('<input type="text" name="listcon" id="listinput">').appendTo(con ).focus().blur(function () {
                    var val=$(this).val();
                    if (!val==""){
                        var data={
                            "mescon":val,
                            "pid":cid,
                            "upid":uid,
                            "user":user,
                        };
                        $.ajax({
                            url:"mesadd.php",
                            dataType:"json",
                            type:"post",
                            data:data,
                            success:function (res) {
                                $(".listalert").html("回复成功").stop().fadeIn().delay(500).fadeOut(500);
                                var conbox=$("<div class='conlist'>");
                                var img=res[0]["portrait"]==""?"../src/img/index/2.jpg":res[0]["portrait"];
                                var conhead=$("<div class='listhead'>").css("background-image","url("+img+")");
                                var conname=$("<div class='listname'>").html(res[0]["names"]);
                                var time=$("<span>").html(res[1]);
                                var listcon=$("<div class='listcon'>");
                                listcon.html(val);
                                conname.append(time);
                                conbox.append(conhead).append(conname).append(listcon).appendTo(parent);
                            },
                            error:function () {
                                $(".listalert").html("回复失败").stop().fadeIn().delay(500).fadeOut(500);

                            },
                        })
                    }
                    $(this).remove();
                });
            }
        }
    </script>
<?php include "footer.php"?>