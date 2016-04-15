function cookieCnil(){
    if ($.cookie('cookieCnil') === undefined) {
        $('#cookieCnil').fadeIn();
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