<?php
if (!class_exists('Meta_Store_Welcome')) :

    class Meta_Store_Welcome {

        public $tab_sections = array();
        public $theme_name = ''; // For storing Theme Name
        public $theme_version = ''; // For Storing Theme Current Version Information
        public $free_plugins = array(); // For Storing the list of the Recommended Free Plugins

        /**
         * Constructor for the Welcome Screen
         */

        public function __construct() {

            /** Useful Variables */
            $theme = wp_get_theme();
            $this->theme_name = $theme->Name;
            $this->theme_version = $theme->Version;

            /** Define Tabs Sections */
            $this->tab_sections = array(
                'getting_started' => array(
                    'label' => esc_html__('Getting Started', 'meta-store'),
                    'detail' => esc_html__('Overview about the settings.', 'meta-store'),
                    'icon' => 'icofont-settings-alt'
                ),
                'recommended_plugins' => array(
                    'label' => esc_html__('Recommended Plugins', 'meta-store'),
                    'detail' => esc_html__('Plugins that work best with the theme.', 'meta-store'),
                    'icon' => 'icofont-plugin'
                ),
                'demo_import' => array(
                    'label' => esc_html__('Import Demos', 'meta-store'),
                    'detail' => esc_html__('Install the demo to your site.', 'meta-store'),
                    'icon' => 'icofont-cloud-download'
                ),
                'free_vs_pro' => array(
                    'label' => esc_html__('Free vs Pro', 'meta-store'),
                    'detail' => esc_html__('Compare between Free & Pro.', 'meta-store'),
                    'icon' => 'icofont-contrast',
                    'highlight' => true
                ),
                'support' => array(
                    'label' => esc_html__('Help & Support', 'meta-store'),
                    'detail' => esc_html__('We are here to support you.', 'meta-store'),
                    'icon' => 'icofont-live-support'
                ),
            );

            /** List of Recommended Free Plugins */
            $this->free_plugins = array(
                'elementor' => array(
                    'slug' => 'elementor',
                    'class' => '\Elementor\Plugin',
                    'filename' => 'elementor.php',
                ),
                'meta-store-elements' => array(
                    'slug' => 'meta-store-elements',
                    'class' => 'Meta_Store_Elements',
                    'filename' => 'meta-store-elements.php',
                ),
                'woocommerce' => array(
                    'slug' => 'woocommerce',
                    'class' => 'WooCommerce',
                    'filename' => 'woocommerce.php',
                ),
                'mini-ajax-woo-cart' => array(
                    'slug' => 'mini-ajax-woo-cart',
                    'class' => 'MAJC_Class',
                    'filename' => 'mini-ajax-cart.php',
                ),
                'newsletter' => array(
                    'slug' => 'newsletter',
                    'class' => 'Newsletter',
                    'filename' => 'plugin.php',
                ),
                'wpforms-lite' => array(
                    'slug' => 'wpforms-lite',
                    'class' => 'WPForms_Lite',
                    'filename' => 'wpforms.php',
                ),
            );

            /* Create a Welcome Page */
            add_action('admin_menu', array($this, 'welcome_register_menu'));

            /* Enqueue Styles & Scripts for Welcome Page */
            add_action('admin_enqueue_scripts', array($this, 'welcome_styles_and_scripts'));

            /* Adds Footer Rating Text */
            add_filter('admin_footer_text', array($this, 'admin_footer_text'));

            /* Hide Notice */
            add_filter('wp_loaded', array($this, 'hide_admin_notice'), 10);

            /* Create a Welcome Page */
            add_action('wp_loaded', array($this, 'admin_notice'), 20);

            add_action('after_switch_theme', array($this, 'erase_hide_notice'));

            /** Ajaxes * */
            add_action('wp_ajax_plugin_installer', array($this, 'plugin_installer_callback'));
            add_action('wp_ajax_remote_plugin_installer', array($this, 'remote_plugin_installer_callback'));
            add_action('wp_ajax_plugin_activator', array($this, 'plugin_activate_callback'));
            add_action('wp_ajax_plugin_deactivator', array($this, 'plugin_deactivate_callback'));
        }

        /** Trigger Welcome Message Notification */
        public function admin_notice() {
            $hide_notice = get_option('meta_store_hide_notice');
            if (!$hide_notice) {
                add_action('admin_notices', array($this, 'admin_notice_content'));
            }
        }

        /** Welcome Message Notification */
        public function admin_notice_content() {
            $screen = get_current_screen();

            if ('appearance_page_meta-store-welcome' === $screen->id || (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) || 'theme-install' === $screen->id) {
                return;
            }
            ?>
            <div class="updated notice meta-store-welcome-notice">
                <div class="meta-store-welcome-notice-wrap">
                    <h2><?php esc_html_e('Congratulations!', 'meta-store'); ?></h2>
                    <p><?php printf(esc_html__('%1$s is now installed and ready to use. You can learn to create the site using a straight forward Documentation.', 'meta-store'), $this->theme_name); ?></p>

                    <div class="meta-store-welcome-info">
                        <div class="meta-store-welcome-thumb">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php echo esc_attr__('Resoto', 'meta-store'); ?>">
                        </div>

                        <?php
                        if ('appearance_page_hdi-demo-importer' !== $screen->id) {
                            ?>
                            <div class="meta-store-welcome-import">
                                <h3><?php esc_html_e('Read Documentation', 'meta-store'); ?></h3>
                                <p><?php esc_html_e('Click on the link below to learn on how to setup your site using the theme from the scratch.', 'meta-store'); ?></p>
                                <p><a class="button button-primary" target="_blank" href="http://doc.mysticalthemes.com/meta-store"><?php esc_html_e('Documentation', 'meta-store'); ?></a></p>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="meta-store-welcome-getting-started">
                            <h3><?php esc_html_e('Get Started', 'meta-store'); ?></h3>
                            <p><?php printf(esc_html__('Here you will find all the necessary links and settings on how to use %s.', 'meta-store'), $this->theme_name); ?></p>
                            <p><a href="<?php echo esc_url(admin_url('?page=meta-store-welcome')); ?>" class="button button-primary"><?php esc_html_e('Go to Setting Page', 'meta-store'); ?></a></p>
                        </div>
                    </div>

                    <a href="<?php echo wp_nonce_url(add_query_arg('meta_store_hide_notice', 1), 'meta_store_hide_notice_nonce', '_meta_store_notice_nonce'); ?>" class="notice-close"><?php esc_html_e('Dismiss', 'meta-store'); ?></a>
                </div>

            </div>
            <?php
        }

        /** Hide Admin Notice */
        public function hide_admin_notice() {
            if (isset($_GET['meta_store_hide_notice']) && isset($_GET['_meta_store_notice_nonce']) && current_user_can('manage_options')) {
                if (!wp_verify_nonce(wp_unslash($_GET['_meta_store_notice_nonce']), 'meta_store_hide_notice_nonce')) {
                    wp_die(esc_html__('Action Failed. Something is Wrong.', 'meta-store'));
                }

                update_option('meta_store_hide_notice', true);
            }
        }

        /** Register Menu for Welcome Page */
        public function welcome_register_menu() {
            add_menu_page(
                    esc_html__('Welcome', 'meta-store'), sprintf(esc_html__('%s Settings', 'meta-store'), $this->theme_name), 'edit_theme_options', 'meta-store-welcome', array($this, 'welcome_screen'), 'dashicons-admin-generic', apply_filters('meta_store_welcome_menu_position', 61)
            );
        }

        /** Welcome Page */
        public function welcome_screen() {
            $tabs = $this->tab_sections;
            ?>
            <div class="welcome-wrap">
                <div class="welcome-main-content">
                    <?php require_once get_template_directory() . '/welcome/sections/header.php'; ?>

                    <div class="welcome-body">
                        <div class="welcome-nav-wrapper">
                            <?php foreach ($tabs as $section_id => $tab) : ?>
                                <?php
                                $section = isset($_GET['section']) && array_key_exists($_GET['section'], $tabs) ? $_GET['section'] : 'getting_started';
                                $nav_class = 'welcome-nav-tab';
                                if ($section_id == $section) {
                                    $nav_class .= ' welcome-nav-tab-active';
                                }

                                $highlight_class = '';
                                if (isset($tab['highlight']) && $tab['highlight']) {
                                    $highlight_class = ' highlight';
                                }
                                ?>
                                <a href="<?php echo esc_url(admin_url('?page=meta-store-welcome&section=' . $section_id)); ?>" class="<?php echo esc_attr($nav_class) . esc_attr($highlight_class); ?>">
                                    <span class="label"><span><?php echo esc_html($tab['label']); ?></span><span><?php echo esc_html($tab['detail']); ?></span></span>
                                    <i class="<?php echo esc_attr($tab['icon']); ?>"></i>
                                </a>
                            <?php endforeach; ?>
                        </div>

                        <div class="welcome-section-wrapper">
                            <?php $section = isset($_GET['section']) && array_key_exists($_GET['section'], $tabs) ? $_GET['section'] : 'getting_started'; ?>

                            <div class="welcome-section <?php echo esc_attr($section); ?> clearfix">
                                <?php require_once get_template_directory() . '/welcome/sections/' . $section . '.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        /** Enqueue Necessary Styles and Scripts for the Welcome Page */
        public function welcome_styles_and_scripts($hook) {
            if ('theme-install.php' !== $hook) {
                $importer_params = array(
                    'ajaxurl' => admin_url('admin-ajax.php'),
                    'installer_nonce' => wp_create_nonce('plugin_installer_nonce'),
                    'activator_nonce' => wp_create_nonce('plugin_activator_nonce'),
                    'deactivator_nonce' => wp_create_nonce('plugin_deactivator_nonce'),
                    'installed_btn' => esc_html__('Activated', 'meta-store'),
                    'deactivated_btn' => esc_html__('Deactivated', 'meta-store'),
                );

                wp_enqueue_style('elegant-icons', get_template_directory_uri() . '/vendors/elegant-icons/elegant-icons.css', array(), $this->theme_version, false);
                wp_enqueue_style('materialdesignicons', get_template_directory_uri() . '/vendors/materialdesignicons/materialdesignicons.css', array(), $this->theme_version, false);
                wp_enqueue_style('icofont', get_template_directory_uri() . '/vendors/icofont/icofont.css', array(), $this->theme_version, false);

                wp_enqueue_style('meta-store-welcome', get_template_directory_uri() . '/welcome/css/welcome.css', array(), $this->theme_version);
                wp_enqueue_script('meta-store-welcome', get_template_directory_uri() . '/welcome/js/welcome.js', array('plugin-install', 'updates'), $this->theme_version, true);
                wp_localize_script('meta-store-welcome', 'welcomeObject', $importer_params);
            }
        }

        /** Added * */

        /** Get Plugin Info from WordPress API * */
        public function call_plugin_api($plugin_slug) {
            include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
            $api = plugins_api('plugin_information', array(
                'slug' => $plugin_slug,
                'fields' => array(
                    'downloaded' => false,
                    'rating' => false,
                    'description' => false,
                    'short_description' => true,
                    'donate_link' => false,
                    'tags' => false,
                    'sections' => true,
                    'homepage' => true,
                    'added' => false,
                    'last_updated' => false,
                    'compatibility' => false,
                    'tested' => false,
                    'requires' => false,
                    'downloadlink' => true,
                    'icons' => true
                )
            ));

            return $api;
        }

        /** Check For Icon * */
        public function check_for_icon($arr) {

            if (!empty($arr['svg'])) {
                $plugin_icon_url = $arr['svg'];
            } elseif (!empty($arr['2x'])) {
                $plugin_icon_url = $arr['2x'];
            } elseif (!empty($arr['1x'])) {
                $plugin_icon_url = $arr['1x'];
            } else {
                $plugin_icon_url = $arr['default'];
            }

            return $plugin_icon_url;
        }

        /** Check if Plugin is active or not * */
        public function get_plugin_status($plugin) {

            $folder_name = $plugin['slug'];
            $file_name = $plugin['filename'];
            $status = 'install';

            $path = WP_PLUGIN_DIR . '/' . esc_attr($folder_name) . '/' . esc_attr($file_name);

            if (file_exists($path)) {
                $status = class_exists($plugin['class']) ? 'deactive' : 'active';
            }

            return $status;

            return $status;
        }

        /** Generate URL for the Plugin Button * */
        public function generate_plugin_install_btn($status, $plugin) {

            $folder_name = isset($plugin['slug']) ? $plugin['slug'] : '';
            $file_name = isset($plugin['filename']) ? $plugin['filename'] : '';
            $is_premium = isset($plugin['is_premium']) ? $plugin['is_premium'] : false;
            $remote_path = isset($plugin['remote_path']) ? $plugin['remote_path'] : '';
            $zipfile = isset($plugin['zipfile']) ? $plugin['zipfile'] : '';
            $url = $btn = '';

            switch ($status) {
                case 'install':
                    if (!$is_premium) {
                        $btn = '<button class="install button" data-file="' . esc_attr($file_name) . '" data-slug="' . esc_attr($folder_name) . '">' . esc_html__('Install & Activate', 'meta-store') . '</button>';
                        return $btn;
                    }
                    return $btn = '<button class="remote-install button" data-file="' . esc_attr($file_name) . '" data-slug="' . esc_attr($folder_name) . '" data-zipfile="' . esc_attr($zipfile) . '" data-remotepath="' . esc_url($remote_path) . '">' . esc_html__('Install', 'meta-store') . '</button>';
                    break;

                case 'deactive':
                    return $btn = '<a class="deactivate button" data-file="' . esc_attr($file_name) . '" data-slug="' . esc_attr($folder_name) . '">' . esc_html__('Deactivate', 'meta-store') . '</a>';
                    break;

                case 'active':
                    return $btn = '<a class="activate button" data-file="' . esc_attr($file_name) . '" data-slug="' . esc_attr($folder_name) . '">' . esc_html__('Activate', 'meta-store') . '</a>';
                    break;
            }
        }

        /** Install & Activate WordPress Free Plugins * */
        public function plugin_installer_callback() {
            if (!current_user_can('install_plugins')) {
                wp_die(esc_html__('Sorry, you are not allowed to install plugins on this site.', 'meta-store'));
            }

            $nonce = isset($_REQUEST["nonce"]) ? sanitize_text_field(wp_unslash($_REQUEST["nonce"])) : '';
            $plugin = isset($_REQUEST["plugin"]) ? sanitize_text_field(wp_unslash($_REQUEST["plugin"])) : '';
            $plugin_file = isset($_REQUEST["plugin_file"]) ? sanitize_text_field(wp_unslash($_REQUEST["plugin_file"])) : '';

            // Check our nonce, if they don't match then bounce!
            if (!wp_verify_nonce($nonce, 'plugin_installer_nonce'))
                wp_die(esc_html__('Error - unable to verify nonce, please try again.', 'meta-store'));

            // Include required libs for installation
            require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
            //require_once ABSPATH . 'wp-admin/includes/class-wp-ajax-upgrader-skin.php';
            //require_once ABSPATH . 'wp-admin/includes/class-plugin-upgrader.php';

            // Get Plugin Info
            $api = $this->call_plugin_api($plugin);

            $skin = new WP_Ajax_Upgrader_Skin();
            $upgrader = new Plugin_Upgrader($skin);
            $upgrader->install($api->download_link);

            $plugin_file = ABSPATH . 'wp-content/plugins/' . esc_attr($plugin) . '/' . esc_attr($plugin_file);

            if ($api->name) {
                if ($plugin_file) {
                    activate_plugin($plugin_file);
                    echo "success";
                    die();
                }
            }
            echo "fail";

            die();
        }

        /** Activate WordPress Free Plugins * */
        public function plugin_activate_callback() {
            if (!current_user_can('install_plugins'))
                wp_die(esc_html__('Sorry, you are not allowed to install plugins on this site.', 'meta-store'));

            $nonce = isset($_REQUEST["nonce"]) ? sanitize_text_field(wp_unslash($_REQUEST["nonce"])) : '';
            $plugin = isset($_REQUEST["plugin"]) ? sanitize_text_field(wp_unslash($_REQUEST["plugin"])) : '';
            $plugin_file = isset($_REQUEST["plugin_file"]) ? sanitize_text_field(wp_unslash($_REQUEST["plugin_file"])) : '';

            // Check our nonce, if they don't match then bounce!
            if (!wp_verify_nonce($nonce, 'plugin_activator_nonce'))
                wp_die(esc_html__('Error - unable to verify nonce, please try again.', 'meta-store'));

            $plugin_file = ABSPATH . 'wp-content/plugins/' . esc_attr($plugin) . '/' . esc_attr($plugin_file);

            if ($plugin_file) {
                activate_plugin($plugin_file);
                echo "success";
                die();
            }
            echo "fail";
            die();
        }

        /** Deactivate WordPress Free Plugins * */
        public function plugin_deactivate_callback() {
            if (!current_user_can('install_plugins'))
                wp_die(esc_html__('Sorry, you are not allowed to install plugins on this site.', 'meta-store'));

            $nonce = isset($_REQUEST["nonce"]) ? sanitize_text_field(wp_unslash($_REQUEST["nonce"])) : '';
            $plugin = isset($_REQUEST["plugin"]) ? sanitize_text_field(wp_unslash($_REQUEST["plugin"])) : '';
            $plugin_file = isset($_REQUEST["plugin_file"]) ? sanitize_text_field(wp_unslash($_REQUEST["plugin_file"])) : '';

            // Check our nonce, if they don't match then bounce!
            if (!wp_verify_nonce($nonce, 'plugin_deactivator_nonce'))
                wp_die(esc_html__('Error - unable to verify nonce, please try again.', 'meta-store'));

            $plugin_file = ABSPATH . 'wp-content/plugins/' . esc_attr($plugin) . '/' . esc_attr($plugin_file);

            if ($plugin_file) {
                deactivate_plugins($plugin_file);
                echo "success";
                die();
            }
            echo "fail";
            die();
        }

        /** Render Contents for Free Plugins * */
        public function render_plugin_content_free() {
            foreach ($this->free_plugins as $plugin) {

                $info = $this->call_plugin_api($plugin['slug']);
                $icon_url = $this->check_for_icon($info->icons);
                $plugin_status = $this->get_plugin_status($plugin);
                $btn_url = $this->generate_plugin_install_btn($plugin_status, $plugin);
                ?>
                <div class="plugin-wrap">
                    <div class="plugin-wrapin">
                        <figure class="plugin-image">
                            <img src="<?php echo esc_url($icon_url); ?>" />
                        </figure>

                        <div class="content">
                            <div class="plugin-meta">
                                <span class="name"><?php echo esc_html($info->name); ?></span>  
                            </div>

                            <div class="btn-wrapper">
                                <?php echo $btn_url; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }

        /** Adds Footer Notes */
        public function admin_footer_text($text) {
            $screen = get_current_screen();

            if ('appearance_page_meta-store-welcome' == $screen->id) {
                $text = sprintf(esc_html__('Please leave us a %s rating if you like our theme . A huge thank you from MysticalThemes in advance!', 'meta-store'), '<a href="https://wordpress.org/support/theme/meta-store/reviews/?filter=5#new-post" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a>');
            }

            return $text;
        }

        public function erase_hide_notice() {
            delete_option('meta_store_hide_notice');
        }

    }

    new Meta_Store_Welcome();

endif;