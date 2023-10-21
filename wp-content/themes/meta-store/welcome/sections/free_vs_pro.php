<?php
require_once get_template_directory() . '/welcome/inc/comparison_datas.php';

$comparison_datas = meta_store_comparison_datas();

if (!empty($comparison_datas)) {
    ?>
    <div class="ms-comparison">
        <div class="cmp-head">
            <div class="row">
                <div class="cell"><?php _e('SNO', 'meta-store'); ?></div>
                <div class="cell"><?php _e('Theme Features', 'meta-store'); ?></div>
                <div class="cell free"><?php _e('Free', 'meta-store'); ?></div>
                <div class="cell pro"><?php _e('Pro', 'meta-store'); ?></div>
            </div>
        </div>
        <div class="cmp-body">
            <?php
            $sno = 1;
            foreach ($comparison_datas as $comp_data) {
                $title = isset($comp_data['title']) ? $comp_data['title'] : '';
                $details = isset($comp_data['details']) ? $comp_data['details'] : '';
                $free = isset($comp_data['free']) ? $comp_data['free'] : '';
                $pro = isset($comp_data['pro']) ? $comp_data['pro'] : '';
                ?>
                <div class="row">
                    <div class="cell"><?php echo esc_html($sno); ?></div>
                    <div class="cell content">
                        <h4><?php echo esc_html($title); ?></h4>
                        <p><?php echo esc_html($details); ?></p>
                    </div>
                    <div class="cell">
                        <?php
                        if ($free == 'yes') {
                            ?>
                            <i class="icofont-tick-mark"></i>
                            <?php
                        } elseif ($free == 'no') {
                            ?>
                            <i class="icofont-close"></i>
                            <?php
                        } else {
                            echo esc_html($free);
                        }
                        ?>
                    </div>
                    <div class="cell">
                        <?php
                        if ($pro == 'yes') {
                            ?>
                            <i class="icofont-tick-mark"></i>
                            <?php
                        } elseif ($pro == 'no') {
                            ?>
                            <i class="icofont-close"></i>
                            <?php
                        } else {
                            echo esc_html($pro);
                        }
                        ?>
                    </div>
                </div>
                <?php
                $sno++;
            }
            ?>
        </div>
        <div class="cmp-foot">
            <div class="row">
                <div class="cell">
                    <a class="upgrade-button" href="https://mysticalthemes.com/theme/meta-store/" target="_blank"><?php esc_html_e('Upgrade Now', 'meta-store'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <?php
}