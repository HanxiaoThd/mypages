<?php
/**
 * Created by PhpStorm.
 * User: 韩笑Thd
 * Date: 2017/6/5
 * Time: 8:37
 */
include "../admin/common.php";
include "header.php";
$id=$_GET['id'];
//rec是文章推荐
$sql="select thumbImg,titles,cid,id,author,con,times,rec from lists WHERE cid={$id}";
$result=$db->query($sql);
?>
<link rel="stylesheet" href="../static/css/index/lists.css">

<div class="imgTop"></div>
<!--新闻-->
<div class="container">
    <div class="row" style="margin-top: 20px;">
        <div class="col-md-7 col-xs-12"  style="display: block">
            <?php while ($row=$result->fetch_assoc()){?>
            <a class=" program " href="show.php?id=<?php echo $row['id']?>">
                <div class="imgBox-2">
                    <div class="image-small" style="background-image: url(<?php echo $row['thumbImg']?>)"></div>
                </div>
                <div class="textBox-2 col-xs-5 nopad">
                    <div class="text-2">
                        <?php echo $row['titles']?>
                    </div>
                    <div class="text-3">
                        <span class="t-author"><?php echo $row['author']?></span>
                        <span class="t-mes">留言</span>
                        <span class="t-time"><?php echo $row['times']?></span>
                    </div>
                </div>
            </a>
            <?php }?>
        </div>
        <!--热门排行-->
        <div class="hotBox col-md-5 ">
            <div class="hotTitle">
                <h4>热文推荐</h4>
                <?php
                $sql="select id,cid,hot,author,titles,times from lists WHERE hot=1";
                $result=$db->query($sql);
                while ($row=$result->fetch_assoc()){
                    ?>
                    <div class="hot-article">
                        <a href="show.php?id=<?php echo $row['id'];?>" class="hot-doc">
                            <div class="doc-title">
                                <?php echo $row['titles']?>
                            </div>
                        </a>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>


<?php include "footer.php"?>;