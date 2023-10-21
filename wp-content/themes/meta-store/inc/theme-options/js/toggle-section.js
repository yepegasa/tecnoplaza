jQuery(document).ready(function ($) {
    var toggleSection = $(".meta-store-toggle-section");
    $("body").on("click", ".switch-section.ms-onoffswitch", function () {
        var controlName = $(this).siblings("input").data("customize-setting-link");
        var controlValue = $(this).siblings("input").val();
        var iconClass = "dashicons-visibility";
        if (controlValue === "off") {
            iconClass = "dashicons-hidden";
            $("[data-control=" + controlName + "]")
                    .parent()
                    .addClass("meta-store-section-hidden")
                    .removeClass("meta-store-section-visible");
        } else {
            $("[data-control=" + controlName + "]")
                    .parent()
                    .addClass("meta-store-section-visible")
                    .removeClass("meta-store-section-hidden");
        }
        $("[data-control=" + controlName + "]")
                .children()
                .attr("class", "dashicons " + iconClass);
    });
});
