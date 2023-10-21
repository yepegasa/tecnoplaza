<?php

/** Info Text Control */
class Meta_Store_Text_Info extends WP_Customize_Control {

    public function render_content() {
        $input_attrs = $this->input_attrs;
        $upgrade = isset($input_attrs['upgrade']) && $input_attrs['upgrade'] == 'yes' ? true : false;
        if ($upgrade) {
            echo '<div class="ms-info-control">';
        }
        ?>
        <span class="customize-control-title">
            <?php echo esc_html($this->label); ?>
        </span>

        <?php
        if ($this->description) {
            ?>
            <span class="customize-control-description">
                <?php echo wp_kses_post($this->description); ?>
            </span>
            <?php
        }
        if ($upgrade) {
            ?>
            <a href = "https://mysticalthemes.com/theme/meta-store/" target = "_blank"><?php echo esc_html('Upgrade to Pro', 'meta-store') ?></a>
            <?php
            echo '</div>';
        }
    }

}
