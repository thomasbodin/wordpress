function cookieCnil(){
    if ($.cookie('cookieCnil') === undefined) {
        $('#cookieCnil').fadeIn();

        $(function () {
            $(window).click(function () {
                $('#cookieCnil').fadeOut(300);
                $.cookie('cookieCnil', "viewed", {expires: 365});
            });

            $(window).scroll(function () {
                if ($(this).scrollTop() > 1) {
                    $('#cookieCnil').fadeOut(300);
                    $.cookie('cookieCnil', "viewed", {expires: 365});
                }
            });
        });

        $('#cookie_btn_ok').click(function(e){
            e.preventDefault();
            $('#cookieCnil').fadeOut();
            $.cookie('cookieCnil', "viewed", {expires: 365});
        });

        $('#cookie_btn_refuser').click(function(e){
            e.preventDefault();
            $('#cookieCnil').fadeOut();
            $.cookie('cookieCnil', "viewed", {expires: 365});
            $.cookie('cookieRefuser', "1", {expires: 365});
        });
    }
}

$(function () {
    cookieCnil(); // Cookie CNIL

    // your jQuery custom
});