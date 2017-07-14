/**
 * Created by 韩笑Thd on 2017/6/6.
 */
$(function () {
    $(".s-navBox").click(function () {
        $('html').toggleClass('lg-style');
        $('body').toggleClass('lg-style');
        $('.s-listsBox').stop().slideToggle("fast");
        $(this).children('span').stop().toggleClass("glyphicon-list glyphicon-off");
    });
    //顶部头像登录
    $("body").click(function (e) {
        var target=e.target;
        if(target.className=="logoImg"){
            $(".loginBox").slideToggle(100);
        }else if(target.getAttribute("con")===null){
            $(".loginBox").slideUp(100);
        }

    });
    $(".sign").click(function (e) {
        e.preventDefault();
        $(".login").toggleClass("none");
    });
    $("form").submit(function () {
        // $(this).ajaxSubmit({
        //
        // });
        return false;
    });

});

