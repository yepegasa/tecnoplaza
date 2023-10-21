<?php
if (class_exists('SDI_Importer')) {
    ?>
    <div class="install-plugin-notice postbox">
        <h2><?php esc_html_e('Install Meta Store Demos', 'meta-store'); ?></h2>
        <p><?php esc_html_e('Click the link below and view all the available demos for installation.', 'meta-store'); ?></p>

        <div class="btn-wrapper">
            <a class="button success" href="<?php echo esc_url(admin_url('/themes.php?page=sdi-demo-import')); ?>"><?php esc_html_e('View All Demos', 'meta-store'); ?></a>
        </div>
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
    <div class="install-plugin-notice postbox">
        <h2><?php esc_html_e('Install Swift Demo Import', 'meta-store'); ?></h2>
        <p><?php esc_html_e('The plugin allows you to install the demo in one click.', 'meta-store'); ?></p>

        <div class="btn-wrapper">
            <?php echo $btn_url; ?>
        </div>
    </div>
    <?php
}