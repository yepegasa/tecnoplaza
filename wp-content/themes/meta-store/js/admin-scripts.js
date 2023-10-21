jQuery(document).ready(function ($) {
    /** Page Layout Selection **/
    $(".page-meta-layouts span").on("click", function () {
        var layout = $(this).attr("data-layout");
        $(this)
                .parents(".page-meta-layouts")
                .find("input:hidden")
                .val(layout);
        $(this)
                .parents(".page-meta-layouts")
                .find("span")
                .removeClass("active");
        $(this).addClass("active");
    });
});
