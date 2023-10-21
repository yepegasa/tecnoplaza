/**
 * All Types Meta Box Class JS
 *
 * JS used for the custom metaboxes and other form items.
 *
 */

var $ = jQuery.noConflict();

function update_repeater_fields() {
    meta_store_metabox_fields.updateRepeater();
}
//metabox fields object
var meta_store_metabox_fields = {
    oncefancySelect: false,
    updateRepeater: function () {
        this.load_time_picker();
        this.load_date_picker();
        this.load_color_picker();
        this.fancySelect();
    },
    init: function () {
        if (!this.oncefancySelect) {
            this.fancySelect();
            this.oncefancySelect = true;
        }
        this.load_conditional();
        this.load_time_picker();
        this.load_date_picker();
        this.load_color_picker();
        this.load_tab();
        this.upload_image();
        this.delete_image();
    },
    fancySelect: function () {
        if ($().select2) {
            $(".meta-store-select, .meta-store-posts-select, .meta-store-tax-select").each(function () {
                if (!$(this).hasClass('no-fancy'))
                    $(this).select2();
            });
        }
    },
    load_conditional: function () {
        $(".ms-meta-box-conditional-control").click(function () {
            if ($(this).is(':checked')) {
                $(this).closest('.ms-meta-box-cond').find('.ms-meta-box-conditional-container').show('fast');
            } else {
                $(this).closest('.ms-meta-box-cond').find('.ms-meta-box-conditional-container').hide('fast');
            }
        });
    },
    load_time_picker: function () {
        $('.meta-store-time').each(function () {

            var $this = $(this);
            var format = $this.attr('rel');

            $this.timepicker({timeFormat: format});

        });
    },
    load_date_picker: function () {
        $('.meta-store-date').each(function () {

            var $this = $(this),
                    format = $this.attr('rel');

            $this.datepicker({showButtonPanel: true, dateFormat: format});

        });
    },
    load_color_picker: function () {
        if ($('.meta-store-color-iris').length > 0)
            $('.meta-store-color-iris').wpColorPicker();
    },
    load_tab: function () {
        $('.ms-meta-box-tab').on('click', function () {
            var panel = $(this).attr('data-panel');
            $(this).siblings('.ms-meta-box-tab').removeClass('ms-active-tab');
            $(this).addClass('ms-active-tab');
            $(this).closest('.ms-meta-box-container').find('.ms-meta-box-panel').hide();
            $(this).closest('.ms-meta-box-container').find('.' + panel).show();

        });
    },
    upload_image: function () {
        // ADD IMAGE LINK
        $('body').on('click', '.ms-meta-box-upload-image, .ms-meta-box-image-preview', function (event) {
            event.preventDefault();
            var imgContainer = $(this).closest('.ms-meta-box-row').find('.ms-meta-box-image-preview');
            var imgIdInput = $(this).closest('.ms-meta-box-row').find('.ms-meta-box-image-id');
            var imgUrlInput = $(this).closest('.ms-meta-box-row').find('.ms-meta-box-image-url');
            var bgPrams = $(this).closest('.ms-meta-box-row').find('.ms-meta-box-bg-params');
            var uploadButton = $(this).closest('.ms-meta-box-row').find('.ms-meta-box-upload-image');

            // Create a new media frame
            frame = wp.media({
                title: 'Select or Upload Image',
                button: {
                    text: 'Use Image'
                },
                multiple: false // Set to true to allow multiple files to be selected
            });

            // When an image is selected in the media frame...
            frame.on('select', function () {

                // Get media attachment details from the frame state
                var attachment = frame.state().get('selection').first().toJSON();

                // Send the attachment URL to our custom image input field.
                imgContainer.html('<img src="' + attachment.url + '" style="max-width:100%;"/>');
                imgIdInput.val(attachment.id);
                imgUrlInput.val(attachment.url);
                bgPrams.show();
                uploadButton.removeClass("ms-meta-box-upload-image").addClass('ms-meta-box-remove-image').val('Remove Image');
            });

            // Finally, open the modal on click
            frame.open();

        });
    },
    delete_image: function () {
        // DELETE IMAGE LINK
        $('body').on('click', '.ms-meta-box-remove-image', function (event) {
            event.preventDefault();
            var imgContainer = $(this).closest('.ms-meta-box-row').find('.ms-meta-box-image-preview');
            var imgIdInput = $(this).closest('.ms-meta-box-row').find('.ms-meta-box-image-id');
            var imgUrlInput = $(this).closest('.ms-meta-box-row').find('.ms-meta-box-image-url');
            var bgPrams = $(this).closest('.ms-meta-box-row').find('.ms-meta-box-bg-params');
            var removeButton = $(this).closest('.ms-meta-box-row').find('.ms-meta-box-remove-image');

            // Clear out the preview image
            imgContainer.find('img').remove();
            imgIdInput.val('');
            imgUrlInput.val('');
            bgPrams.hide();
            removeButton.removeClass("ms-meta-box-remove-image").addClass('ms-meta-box-upload-image').val('Upload Image');
        });
    }
};
//call object init in delay
window.setTimeout('meta_store_metabox_fields.init();', 2000);

jQuery(document).ready(function ($) {
    // repater Field
    $("body").on('click', '.meta-store-re-toggle', function () {
        $(this).closest('.meta-store-repater-block').find('.ms-meta-box-repeater-table').slideToggle();
    });

    $('body').on('click', '.meta-store-re-remove', function () {
        $(this).closest('.meta-store-repater-block').slideUp(500, function () {
            $(this).remove();
        });
    });

    // repeater sortable
    $('.repeater-sortable').sortable({
        opacity: 0.8,
        cursor: 'move',
        handle: '.meta-store-re-sort-handle'
    });
});