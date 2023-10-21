/** Welcome Javascripts **/
jQuery(document).ready(function ($) {
    /** Install Free Plugins **/
    $(".welcome-section .install").on('click', function (e) {
        e.preventDefault();
        var el = $(this);

        el.addClass('installing');
        var plugin = $(el).attr('data-slug');
        var plugin_file = $(el).attr('data-file');
        var ajaxurl = welcomeObject.ajaxurl;

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'plugin_installer',
                plugin: plugin,
                plugin_file: plugin_file,
                nonce: welcomeObject.installer_nonce,
            },
            success: function(response) {
                if(response == 'success'){
                    el.attr('class', 'installed button');
                    el.html(welcomeObject.installed_btn);
                }

                el.removeClass('installing');
                location.reload();
            },
        });
    });

    /** Install Premium Plugins **/
    $(".welcome-section .remote-install").on('click', function (e) {
        e.preventDefault();
        var el = $(this);

        el.addClass('installing');
        var plugin = $(el).attr('data-slug');
        var plugin_file = $(el).attr('data-file');
        var remotepath = $(el).attr('data-remotepath');
        var zipfile = $(el).attr('data-zipfile');
        var ajaxurl = welcomeObject.ajaxurl;

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'remote_plugin_installer',
                remotepath: remotepath,
                plugin: plugin,
                plugin_file: plugin_file,
                zipfile: zipfile,
                nonce: welcomeObject.installer_nonce,
            },
            success: function(response) {
                if(response == 'success'){
                    el.attr('class', 'installed button');
                    el.html(welcomeObject.installed_btn);
                }

                el.removeClass('installing');
                location.reload();
            },
        });
    });

    /** Activate Plugins **/
    $(".welcome-section .activate").on('click', function (e) {
        e.preventDefault();
        var el = $(this);

        is_loading = true;
        el.addClass('installing');
        var plugin = $(el).attr('data-slug');
        var plugin_file = $(el).attr('data-file');
        var ajaxurl = welcomeObject.ajaxurl;

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'plugin_activator',
                plugin: plugin,
                plugin_file: plugin_file,
                nonce: welcomeObject.activator_nonce,
            },
            success: function(response) {
                if(response == 'success'){
                    el.attr('class', 'installed button');
                    el.html(welcomeObject.installed_btn);
                }

                el.removeClass('installing');
                is_loading = false;
                location.reload();
            },
            error: function(xhr, status, error) {
                el.removeClass('installing');
                is_loading = false;
            }
        });
    });

    /** Deactivate Plugins **/
    $(".welcome-section .deactivate").on('click', function (e) {
        e.preventDefault();
        var el = $(this);

        is_loading = true;
        el.addClass('installing');
        var plugin = $(el).attr('data-slug');
        var plugin_file = $(el).attr('data-file');
        var ajaxurl = welcomeObject.ajaxurl;

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'plugin_deactivator',
                plugin: plugin,
                plugin_file: plugin_file,
                nonce: welcomeObject.deactivator_nonce,
            },
            success: function(response) {
                if(response == 'success'){
                    el.attr('class', 'installed button');
                    el.html(welcomeObject.deactivated_btn);
                }

                el.removeClass('installing');
                is_loading = false;
                location.reload();
            },
            error: function(xhr, status, error) {
                el.removeClass('installing');
                is_loading = false;
            }
        });
    });
});