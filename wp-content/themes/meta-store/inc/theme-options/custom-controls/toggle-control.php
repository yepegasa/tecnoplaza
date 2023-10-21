<?php

/** Checkbox Control */
class Meta_Store_Toggle extends WP_Customize_Control {

    /**
     * Control type
     *
     * @var string
     */
    public $type = 'ms-toggle';

    /**
     * Control method
     *
     * @since 1.0.0
     */
    public function render_content() {
        ?>
        <div class="ms-toggle-container">
            <div class="ms-toggle">
                <input class="ms-toggle-checkbox" type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link(); ?> <?php checked($this->value()); ?>>
                <label class="ms-toggle-label" for="<?php echo esc_attr($this->id); ?>"></label>
            </div>
            <span class="customize-control-title ms-toggle-title"><?php echo esc_html($this->label); ?></span>
            <?php if (!empty($this->description)) { ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php } ?>
        </div>
        <?php
    }

}
