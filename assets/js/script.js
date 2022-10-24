jQuery(window).scroll(function () {
    var scroll_top =     jQuery(this).scrollTop();
    if (scroll_top >= 350) {
        jQuery("header").addClass("fixed");
    } else {
        jQuery("header").removeClass("fixed");
    }
});