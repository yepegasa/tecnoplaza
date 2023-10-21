jQuery(document).ready(function ($) {
    $(document).on('change', '.ms-typography-font-family select', function () {
        var font_family = $(this).val();
        var $this = $(this);
        $.ajax({
            url: ajaxurl,
            data: {
                action: 'get_google_font_variants',
                font_family: font_family,
            },
            beforeSend: function () {
                $this.parent('.ms-typography-font-family').next('.ms-typography-font-style').addClass('ms-typography-loading');
            },
            success: function (response) {
                $this.parent('.ms-typography-font-family').next('.ms-typography-font-style').removeClass('ms-typography-loading');
                $this.parent('.ms-typography-font-family').next('.ms-typography-font-style').children('select').html(response).trigger('chosen:updated').trigger('change');
            }
        });
    });

    $('.ms-typography-color .ms-color-picker-hex').wpColorPicker({
        change: function (event, ui) {
            var setting = $(this).attr('data-customize-setting-link');
            var hexcolor = $(this).wpColorPicker('color');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(hexcolor);
            });
        }
    });

    $('.ms-slider-range-font-size').each(function () {
        $(this).slider({
            range: 'min',
            value: 18,
            min: parseInt($(this).attr('min')),
            max: parseInt($(this).attr('max')),
            step: parseInt($(this).attr('step')),
            slide: function (event, ui) {
                $(this).next('.ms-slider-value-font-size').find('span').text(ui.value);
                var setting = $(this).next('.ms-slider-value-font-size').find('span').attr('data-customize-setting-link');

                // Set the new value.
                wp.customize(setting, function (obj) {
                    obj.set(ui.value);
                });
            }
        });

        $(this).slider('value', $(this).next('.ms-slider-value-font-size').find('span').attr('value'));
    });



    $('.ms-slider-range-line-height').slider({
        range: 'min',
        value: 1.5,
        min: 0.8,
        max: 5,
        step: 0.1,
        slide: function (event, ui) {
            $(this).next('.ms-slider-value-line-height').find('span').text(ui.value);
            var setting = $(this).next('.ms-slider-value-line-height').find('span').attr('data-customize-setting-link');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(ui.value);
            });
        }
    });

    $('.ms-slider-range-line-height').each(function () {
        $(this).slider('value', $(this).next('.ms-slider-value-line-height').find('span').attr('value'));
    });

    $('.ms-slider-range-letter-spacing').slider({
        range: 'min',
        value: 0,
        min: -5,
        max: 5,
        step: 0.1,
        slide: function (event, ui) {
            $(this).next('.ms-slider-value-letter-spacing').find('span').text(ui.value);
            var setting = $(this).next('.ms-slider-value-letter-spacing').find('span').attr('data-customize-setting-link');
            // Set the new value.
            wp.customize(setting, function (obj) {
                obj.set(ui.value);
            });
        }
    });

    $('.ms-slider-range-letter-spacing').each(function () {
        $(this).slider('value', $(this).next('.ms-slider-value-letter-spacing').find('span').attr('value'));
    });

    // Chosen JS
    $('.customize-control-ms-typography select').chosen({
        width: '100%',
    });
});


(function (api) {

    api.controlConstructor['typography'] = api.Control.extend({
        ready: function () {
            var control = this;

            control.container.on('change', '.ms-typography-font-family select',
                    function () {
                        control.settings['family'].set(jQuery(this).val());
                    }
            );

            control.container.on('change', '.ms-typography-font-style select',
                    function () {
                        control.settings['style'].set(jQuery(this).val());
                    }
            );

            control.container.on('change', '.ms-typography-text-transform select',
                    function () {
                        control.settings['text_transform'].set(jQuery(this).val());
                    }
            );

            control.container.on('change', '.ms-typography-text-decoration select',
                    function () {
                        control.settings['text_decoration'].set(jQuery(this).val());
                    }
            );

        }
    });

})(wp.customize);
