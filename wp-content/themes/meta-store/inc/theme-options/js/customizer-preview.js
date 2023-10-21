/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

function meta_store_dynamic_css(control, style) {
    jQuery("style." + control).remove();

    jQuery("head").append('<style class="' + control + '">' + style + "</style>");
}

function meta_store_get_contrast(hexcolor) {
    var hex = String(hexcolor).replace(/[^0-9a-f]/gi, "");
    if (hex.length < 6) {
        hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
    }
    var r = parseInt(hex.substr(0, 2), 16);
    var g = parseInt(hex.substr(2, 2), 16);
    var b = parseInt(hex.substr(4, 2), 16);
    var contrast = (r * 299 + g * 587 + b * 114) / 1000;
    return contrast;
}

function meta_store_convert_hex(hexcolor, opacity) {
    var hex = String(hexcolor).replace(/[^0-9a-f]/gi, "");
    if (hex.length < 6) {
        hex = hex[0] + hex[0] + hex[1] + hex[1] + hex[2] + hex[2];
    }
    r = parseInt(hex.substring(0, 2), 16);
    g = parseInt(hex.substring(2, 4), 16);
    b = parseInt(hex.substring(4, 6), 16);

    result = "rgba(" + r + "," + g + "," + b + "," + opacity / 100 + ")";
    return result;
}

(function ($) {
    wp.customize('meta_store_display_title', function (value) {
        value.bind(function (to) {
            if (!to) {
                var css = '.ms-site-title {clip:rect(1px, 1px, 1px, 1px); position:absolute}';
            } else {
                var css = '.ms-site-title {clip:auto; position:relative}';
            }
            meta_store_dynamic_css('meta_store_display_title', css);
        });
    });

    wp.customize('meta_store_display_tagline', function (value) {
        value.bind(function (to) {
            if (!to) {
                var css = '.ms-site-description {clip:rect(1px, 1px, 1px, 1px); position:absolute}';
            } else {
                var css = '.ms-site-description {clip:auto; position:relative}';
            }
            meta_store_dynamic_css('meta_store_display_tagline', css);
        });
    });

    wp.customize('meta_store_title_tagline_color', function (value) {
        value.bind(function (to) {
            var css = '.ms-site-title, .ms-site-description {color:' + to + '}';
            meta_store_dynamic_css('meta_store_title_tagline_color', css);
        });
    });

    wp.customize("meta_store_body_font_family", function (value) {
        value.bind(function (to) {
            if (to == "Default") {
                to = "Helvetica";
            }
            if (
                    to != "Courier" &&
                    to != "Times" &&
                    to != "Arial" &&
                    to != "Verdana" &&
                    to != "Trebuchet" &&
                    to != "Georgia" &&
                    to != "Tahoma" &&
                    to != "Palatino" &&
                    to != "Helvetica"
                    ) {
                WebFont.load({
                    google: {
                        families: [to],
                    },
                });
            }

            var css = "html, body, button, input, select, textarea{font-family:" + to + "}";
            meta_store_dynamic_css("meta_store_body_font_family", css);
        });
    });

    wp.customize("meta_store_body_font_style", function (value) {
        value.bind(function (to) {
            var weight = to.replace(/\D/g, "");
            var style = to.replace(/\d+/g, "");
            if ("" == style) {
                style = "normal";
            }
            var css = "html, body, button, input, select, textarea{font-weight:" + weight + ";font-style:" + style + "}";
            meta_store_dynamic_css("meta_store_body_font_style", css);
        });
    });

    wp.customize("meta_store_body_text_transform", function (value) {
        value.bind(function (to) {
            var css = "html, body, button, input, select, textarea{text-transform:" + to + "}";
            meta_store_dynamic_css("meta_store_body_text_transform", css);
        });
    });

    wp.customize("meta_store_body_text_decoration", function (value) {
        value.bind(function (to) {
            var css = "html, body, button, input, select, textarea{text-decoration:" + to + "}";
            meta_store_dynamic_css("meta_store_body_text_decoration", css);
        });
    });

    wp.customize("meta_store_body_font_size", function (value) {
        value.bind(function (to) {
            var css = "html, body, button, input, select, textarea{font-size:" + to + "px}";
            meta_store_dynamic_css("meta_store_body_font_size", css);
        });
    });

    wp.customize("meta_store_body_line_height", function (value) {
        value.bind(function (to) {
            var css = "html, body, button, input, select, textarea{line-height:" + to + "}";
            meta_store_dynamic_css("meta_store_body_line_height", css);
        });
    });

    wp.customize("meta_store_body_letter_spacing", function (value) {
        value.bind(function (to) {
            var css = ".html, body, button, input, select, textarea{letter-spacing:" + to + "px}";
            meta_store_dynamic_css("meta_store_body_letter_spacing", css);
        });
    });

    wp.customize("meta_store_body_color", function (value) {
        value.bind(function (to) {
            var css = "html, body, button, input, select, textarea{color:" + to + "}";
            meta_store_dynamic_css("meta_store_body_color", css);
        });
    });

    /*=== Menu ===*/
    wp.customize("meta_store_menu_font_family", function (value) {
        value.bind(function (to) {
            if (to == "Default") {
                to = wp.customize('meta_store_body_font_family').get();
            }
            if (
                    to != "Courier" &&
                    to != "Times" &&
                    to != "Arial" &&
                    to != "Verdana" &&
                    to != "Trebuchet" &&
                    to != "Georgia" &&
                    to != "Tahoma" &&
                    to != "Palatino" &&
                    to != "Helvetica"
                    ) {
                WebFont.load({
                    google: {
                        families: [to],
                    },
                });
            }

            var css = ".ms-site-header ul.ms-main-menu > li > a, .ms-site-header .ms-main-navigation{font-family:" + to + "}";
            meta_store_dynamic_css("meta_store_menu_font_family", css);
        });
    });

    wp.customize("meta_store_menu_font_style", function (value) {
        value.bind(function (to) {
            var weight = to.replace(/\D/g, "");
            var style = to.replace(/\d+/g, "");
            if ("" == style) {
                style = "normal";
            }
            var css = ".ms-site-header ul.ms-main-menu > li > a, .ms-site-header .ms-main-navigation{font-weight:" + weight + ";font-style:" + style + "}";
            meta_store_dynamic_css("meta_store_menu_font_style", css);
        });
    });

    wp.customize("meta_store_menu_text_transform", function (value) {
        value.bind(function (to) {
            var css = ".ms-site-header ul.ms-main-menu > li > a, .ms-site-header .ms-main-navigation{text-transform:" + to + "}";
            meta_store_dynamic_css("meta_store_menu_text_transform", css);
        });
    });

    wp.customize("meta_store_menu_text_decoration", function (value) {
        value.bind(function (to) {
            var css = ".ms-site-header ul.ms-main-menu > li > a, .ms-site-header .ms-main-navigation{text-decoration:" + to + "}";
            meta_store_dynamic_css("meta_store_menu_text_decoration", css);
        });
    });

    wp.customize("meta_store_menu_font_size", function (value) {
        value.bind(function (to) {
            var css = ".ms-site-header ul.ms-main-menu > li > a, .ms-site-header .ms-main-navigation{font-size:" + to + "px}";
            meta_store_dynamic_css("meta_store_menu_font_size", css);
        });
    });

    wp.customize("meta_store_menu_line_height", function (value) {
        value.bind(function (to) {
            var css = ".ms-site-header ul.ms-main-menu > li > a, .ms-site-header .ms-main-navigation{line-height:" + to + "}";
            meta_store_dynamic_css("meta_store_menu_line_height", css);
        });
    });

    wp.customize("meta_store_menu_letter_spacing", function (value) {
        value.bind(function (to) {
            var css = ".ms-site-header ul.ms-main-menu > li > a, .ms-site-header .ms-main-navigation{letter-spacing:" + to + "px}";
            meta_store_dynamic_css("meta_store_menu_letter_spacing", css);
        });
    });

    wp.customize("meta_store_menu_color", function (value) {
        value.bind(function (to) {
            var css = ".ms-site-header ul.ms-main-menu > li > a, .ms-site-header .ms-main-navigation{color:" + to + "}";
            meta_store_dynamic_css("meta_store_menu_color", css);
        });
    });

    /* === <h> === */
    wp.customize("meta_store_h_font_family", function (value) {
        value.bind(function (to) {
            if (to == "Default") {
                to = wp.customize('meta_store_body_font_family').get();
            }
            if (
                    to != "Courier" &&
                    to != "Times" &&
                    to != "Arial" &&
                    to != "Verdana" &&
                    to != "Trebuchet" &&
                    to != "Georgia" &&
                    to != "Tahoma" &&
                    to != "Palatino" &&
                    to != "Helvetica"
                    ) {
                WebFont.load({
                    google: {
                        families: [to],
                    },
                });
            }

            var css = "h1, h2, h3, h4, h5, h6 {font-family:" + to + "}";
            meta_store_dynamic_css("meta_store_h_font_family", css);
        });
    });

    wp.customize("meta_store_h_font_style", function (value) {
        value.bind(function (to) {
            var weight = to.replace(/\D/g, "");
            var style = to.replace(/\d+/g, "");
            if ("" == style) {
                style = "normal";
            }
            var css = "h1, h2, h3, h4, h5, h6 {font-weight:" + weight + ";font-style:" + style + "}";
            meta_store_dynamic_css("meta_store_h_font_style", css);
        });
    });

    wp.customize("meta_store_h_text_transform", function (value) {
        value.bind(function (to) {
            var css = "h1, h2, h3, h4, h5, h6 {text-transform:" + to + "}";
            meta_store_dynamic_css("meta_store_h_text_transform", css);
        });
    });

    wp.customize("meta_store_h_text_decoration", function (value) {
        value.bind(function (to) {
            var css = "h1, h2, h3, h4, h5, h6 {text-decoration:" + to + "}";
            meta_store_dynamic_css("meta_store_h_text_decoration", css);
        });
    });

    wp.customize("meta_store_h_line_height", function (value) {
        value.bind(function (to) {
            var css = "h1, h2, h3, h4, h5, h6 {line-height:" + to + "}";
            meta_store_dynamic_css("meta_store_h_line_height", css);
        });
    });

    wp.customize("meta_store_h_letter_spacing", function (value) {
        value.bind(function (to) {
            var css = "h1, h2, h3, h4, h5, h6 {letter-spacing:" + to + "px}";
            meta_store_dynamic_css("meta_store_h_letter_spacing", css);
        });
    });
})(jQuery);

function meta_store_dynamic_css(control, style) {
    jQuery('style.' + control).remove();

    jQuery('head').append(
            '<style class="' + control + '">' + style + '</style>'
            );
}
