<?php
include "../admin/common.php";
include "header.php";
?>
<script src="../static/js/swiper.min.js"></script>
<script src="../static/js/swiper.animate1.0.2.min.js"></script>
<script src="../static/js/index.js"></script>
<link rel="stylesheet" href="../static/css/swiper.min.css">
<link rel="stylesheet" type="text/css" href="../static/css/index/index.css"/>
<link rel="stylesheet" href="../static/css/index/animate.min.css">

	<!--banner开始-->
    <div class="container-fluid swiper-container nopad">
        <div class="row swiper-wrapper nopad nomar">
            <?php
            $sql="select thumbimg,titles,cid,author,con,id from lists WHERE banner=1";
            $result=$db->query($sql);
            while ($row=$result->fetch_assoc()){
            ?>
            <div class="banner swiper-slide" style="background-image: url(<?php echo $row['thumbimg']?>);">
                <p class="bannerText ani" swiper-animate-effect="lightSpeedIn" swiper-animate-duration="1s" swiper-animate-delay="0.3s"><?php echo $row['titles']?></p>
                <a href="show.php?id=<?php echo $row['id']?>" style="display: block;width: 100%;height: 100%;"></a>
            </div>
            <?php }?>
        </div>
        <div class="swiper-pagination swiper-pagination-white"></div>
        <div class="swiper-button-next swiper-button-white hidden-xs" style="right: 40px;"></div>
        <div class="swiper-button-prev swiper-button-white hidden-xs"></div>
    </div>
	<!--banner结束-->
    <!--推荐博文-->
    <div class="container section">
        <div class="row">
            <div class="col-md-12">
                <span class="text">推荐图文</span>
                <span class="line"></span>
            </div>
        </div>

        <div class="row">
            <?php
            $sql="select thumbimg,titles,cid,author,con,id from lists WHERE rec=1";
            $result=$db->query($sql);
            while($row=$result->fetch_assoc()){
            ?>
            <div class="col-md-3  col-xs-12 col-sm-6">
                <div class="imgBox" style="background-image: url('<?php echo $row['thumbimg']?>')">
                    <a class="textBox disNone" href="show.php?id=<?php echo $row['id']?>">
                        <p><?php echo $row['titles']?></p>
                    </a>
                </div>
            </div>
            <?php }?>
        </div>
        <!--新闻-->
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-7 program col-xs-12">
                <?php
                $sql="select * from lists WHERE hot2=1";
                $result=$db->query($sql);
                while ($row=$result->fetch_assoc()){
                ?>
                <a class="program" href="show.php?id=">
                    <div class="imgBox-2">
                        <div class="image-small" style="background-image: url(<?php echo $row['thumbImg']?>)"></div>
                    </div>
                    <div class="textBox-2 col-xs-5 nopad">
                        <div class="text-2">
                            <?php echo $row['titles']?>
                        </div>
                        <div class="text-3">
                            <span class="t-author"><?php $row['author']?></span>
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
    <div class="container-fluid nopad">
        <div class="middleImg" style="background-image: url('../src/img/index/2.jpg')">
            <a class="coverBox" href="#">
                <div class="container c_text">
                    <div class="c_textBox" id="textBox">
                        <h3 class="">
                            到远方去
                        </h3>
                    </div>
                    <p id="" >
                        熟悉的地方没有景色
                        <span>Familiar places have no scenery</span>
                    </p>
                </div>
            </a>
        </div>
    </div>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 30,
        effect: 'fade',
        autoplay:2500,
        onInit:function (swiper) {
            swiperAnimateCache(swiper);
            swiperAnimate(swiper);
        },
        onSlideChangeEnd:function (swiper) {
            swiperAnimate(swiper);
            
        }
    });
</script>

<?PHP include "footer.php"?>

