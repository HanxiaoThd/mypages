/**
 * Created by 韩笑Thd on 2017/6/17.
 */
$(document).ready(function () {
    $(window).scroll(function () {
        var n=document.documentElement.scrollTop||document.body.scrollTop;
        if (n>300) {
            $('.c_textBox').addClass('opa1').removeClass('opa3');
            $('.c_textBox > h3').addClass('opa2').removeClass('opa4');
            $('.c_text > p').addClass('breathe').removeClass('breathe_1');
        }else {
            $('.c_textBox').removeClass('opa1').addClass('opa3');
            $('.c_textBox > h3').removeClass('opa2').addClass('opa4');
            $('.c_text > p').removeClass('breathe').addClass('breathe_1');

        }
    })
})
