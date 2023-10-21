<div class="lets-start">
    <h2><?php esc_html_e("Let's Get Started", "meta-store"); ?></h2>
    <p><?php esc_html_e("Getting use to site building using the theme can be pretty daunting task especially if you are new to the WordPress. Here we have provide you a couple of ways to may familiarize you with the theme.", "meta-store") ?></p>
</div>

<div class="welcome-getting-started">
    <div class="welcome-manual-setup">
        <div class="welcome-manual-setupin">
            <h3><?php echo esc_html__('Manual Setup from Customizer Panel', 'meta-store'); ?></h3>
            <div class="welcome-theme-thumb">
                <img src="http://mysticalthemes.com/resources/customizer-settings.gif" alt="<?php echo esc_attr__('Resoto Demo', 'meta-store'); ?>">
            </div>

            <ol>
                <li><?php echo esc_html__('Go to Appearance > Customize', 'meta-store'); ?></li>
                <li><?php echo esc_html__('Click on any of the setting panels & sections.', 'meta-store'); ?> </li>
                <li><?php echo esc_html__('Change the settings and options with the guidance of the documentation.', 'meta-store'); ?> </li>
            </ol>
            <a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'meta-store'); ?></a>
        </div>
    </div>

    <div class="welcome-demo-import">
        <div class="welcome-demo-importin">
            <h3><?php echo esc_html__('Import Pre-Made Demos', 'meta-store'); ?></h3>
            <div class="welcome-theme-thumb">
                <img src="http://mysticalthemes.com/resources/demo-import.gif" alt="<?php printf(esc_html__('%s Demo', 'meta-store'), $this->theme_name); ?>">
            </div>

            <div class="welcome-demo-import-text">
                <ol>
                    <li><?php echo esc_html__('Install & Activate \'Swift Demo Import\' plugin.', 'meta-store'); ?></li>
                    <li><?php echo esc_html__('Go to Dashboard > Appearanse > Swift Demo Import.', 'meta-store'); ?> </li>
                    <li><?php echo esc_html__('You will find the list of the demos available for you to install. Now Install the demo of your choice.', 'meta-store'); ?></li>
                </ol>
                <?php
                if (class_exists('SDI_Importer')) {
                    ?>
                    <p><?php esc_html_e('Click the link below and view all the available demos for installation.', 'meta-store'); ?></p>

                    <div class="btn-wrapper">
                        <a class="button success" href="<?php echo esc_url(admin_url('/themes.php?page=sdi-demo-import')); ?>"><?php esc_html_e('View All Demos', 'meta-store'); ?></a>
                    </div>
                    <?php
                } else {
                    $plugin = array(
                        'slug' => 'swift-demo-import',
                        'class' => 'SWFT_Demo_Import',
                        'filename' => 'swift-demo-import.php',
                    );
                    $info = $this->call_plugin_api('swift-demo-import');
                    $icon_url = $this->check_for_icon($info->icons);
                    $plugin_status = $this->get_plugin_status($plugin);
                    $btn_url = $this->generate_plugin_install_btn($plugin_status, $plugin);
                    ?>
                    <p><?php esc_html_e('The plugin allows you to install the demo in one click.', 'meta-store'); ?></p>

                    <div class="btn-wrapper">
                        <?php echo $btn_url; ?>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>

<div class="welcome-upgrade-wrap">
    <div class="welcome-upgrade-header">
        <h3><?php printf(esc_html__('Meta Store Pro - Premium Version of %s', 'meta-store'), $this->theme_name); ?></h3>
        <p><?php echo sprintf(esc_html__('Check out the websites that you can create with the premium version of the %s Theme. These demos can be imported with just one click in the premium version.', 'meta-store'), $this->theme_name); ?></p>
    </div>

    <div class="upgrade-demo-wrap">
        <div class="recommend-plugins">
            <div class="plug-image">
                <img src="http://mysticalthemes.com/import/meta-store/screen/digital-store-screenshot.jpg" alt="<?php echo esc_attr__('Meta Store Demos', 'meta-store'); ?>">
            </div>

            <div class="plug-title-wrap">
                <div class="plug-title">Digi Store</div>
                <div class="plug-btn-wrapper">
                    <a target="_blank" href="https://mysticalthemes.com/theme/meta-store/" class="button button-primary"><?php echo esc_html__('Buy Now', 'meta-store'); ?></a>
                    <a target="_blank" href="https://demo.mysticalthemes.com/meta-store/digital-store/" class="button button-primary"><?php echo esc_html__('Preview', 'meta-store'); ?></a>
                </div>
            </div>
        </div>

        <div class="recommend-plugins">
            <div class="plug-image">
                <img src="http://mysticalthemes.com/import/meta-store/screen/shoes-screenshot.jpg" alt="<?php echo esc_attr__('Meta Store Demos', 'meta-store'); ?>">
            </div>

            <div class="plug-title-wrap">
                <div class="plug-title">Shoe</div>
                <div class="plug-btn-wrapper">
                    <a target="_blank" href="https://mysticalthemes.com/theme/meta-store/" class="button button-primary"><?php echo esc_html__('Buy Now', 'meta-store'); ?></a>
                    <a target="_blank" href="https://demo.mysticalthemes.com/meta-store/shoe/" class="button button-primary"><?php echo esc_html__('Preview', 'meta-store'); ?></a>
                </div>
            </div>
        </div>

        <div class="recommend-plugins">
            <div class="plug-image">
                <img src="http://mysticalthemes.com/import/meta-store/screen/jewels-screenshot.jpg" alt="<?php echo esc_attr__('Meta Store Demos', 'meta-store'); ?>">
            </div>

            <div class="plug-title-wrap">
                <div class="plug-title">Jewelry</div>
                <div class="plug-btn-wrapper">
                    <a target="_blank" href="https://mysticalthemes.com/theme/meta-store/" class="button button-primary"><?php echo esc_html__('Buy Now', 'meta-store'); ?></a>
                    <a target="_blank" href="https://demo.mysticalthemes.com/meta-store/jewelry/" class="button button-primary"><?php echo esc_html__('Preview', 'meta-store'); ?></a>
                </div>
            </div>
        </div>

        <div class="recommend-plugins">
            <div class="plug-image">
                <img src="http://mysticalthemes.com/import/meta-store/screen/wine-screenshot.jpg" alt="<?php echo esc_attr__('Meta Store Demos', 'meta-store'); ?>">
            </div>

            <div class="plug-title-wrap">
                <div class="plug-title">Wine Shop</div>
                <div class="plug-btn-wrapper">
                    <a target="_blank" href="https://mysticalthemes.com/theme/meta-store/" class="button button-primary"><?php echo esc_html__('Buy Now', 'meta-store'); ?></a>
                    <a target="_blank" href="https://demo.mysticalthemes.com/meta-store/wine-shop/" class="button button-primary"><?php echo esc_html__('Preview', 'meta-store'); ?></a>
                </div>
            </div>
        </div>

        <div class="recommend-plugins">
            <div class="plug-image">
                <img src="http://mysticalthemes.com/import/meta-store/screen/book-screenshot.jpg" alt="<?php echo esc_attr__('Meta Store Demos', 'meta-store'); ?>">
            </div>

            <div class="plug-title-wrap">
                <div class="plug-title">Book</div>
                <div class="plug-btn-wrapper">
                    <a target="_blank" href="https://mysticalthemes.com/theme/meta-store/" class="button button-primary"><?php echo esc_html__('Buy Now', 'meta-store'); ?></a>
                    <a target="_blank" href="https://demo.mysticalthemes.com/meta-store/book/" class="button button-primary"><?php echo esc_html__('Preview', 'meta-store'); ?></a>
                </div>
            </div>
        </div>

        <div class="recommend-plugins">
            <div class="plug-image">
                <img src="http://mysticalthemes.com/import/meta-store/screen/cosmetics-plus-screenshot.jpg" alt="<?php echo esc_attr__('Meta Store Demos', 'meta-store'); ?>">
            </div>

            <div class="plug-title-wrap">
                <div class="plug-title">Cosmetics Plus</div>
                <div class="plug-btn-wrapper">
                    <a target="_blank" href="https://mysticalthemes.com/theme/meta-store/" class="button button-primary"><?php echo esc_html__('Buy Now', 'meta-store'); ?></a>
                    <a target="_blank" href="https://demo.mysticalthemes.com/meta-store/cosmetics-plus/" class="button button-primary"><?php echo esc_html__('Preview', 'meta-store'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="welcome-upgrade-box">
    <div class="upgrade-box-text">
        <h3><?php echo esc_html__('Upgrade To Meta Store Pro', 'meta-store'); ?></h3>
        <p><?php echo sprintf(esc_html__('%1$s by itself is a powerful tool to Create an engaging Ecommerce website. However, upgrading to pro version will unlock even more possiblities to create more dynamic ecommerce websites.', 'meta-store'), $this->theme_name); ?>
    </div>
    <a class="upgrade-button why-button" href="<?php echo esc_url(admin_url('?page=meta-store-welcome&section=free_vs_pro')); ?>"><?php esc_html_e('Why Upgrade ?', 'meta-store'); ?></a>
    <a class="upgrade-button" href="https://mysticalthemes.com/theme/meta-store" target="_blank"><?php esc_html_e('Upgrade Now', 'meta-store'); ?></a>
</div>