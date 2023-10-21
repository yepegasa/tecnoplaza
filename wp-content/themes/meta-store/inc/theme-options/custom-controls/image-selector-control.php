<?php

/** Image Select Control */
class Meta_Store_Image_Selector extends WP_Customize_Control {

    public $type = 'select';

    public function __construct($manager, $id, $args = array(), $choices = array()) {
        $this->image_path = $args['image_path'];
        $this->choices = $args['choices'];
        parent::__construct($manager, $id, $args);
    }

    public function render_content() {
        if (!empty($this->choices)) {
            ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html($this->label); ?>
                </span>

                <?php if ($this->description) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>

                <select class="ms-image-selector" <?php $this->link(); ?>>
                    <?php
                    foreach ($this->choices as $key => $choice) {
                        printf('<option data-image="%1$s" value="%2$s" %3$s>%4$s</option>', esc_attr($this->image_path . $key) . '.png', esc_attr($key), selected($this->value(), $key, false), esc_html($choice));
                    }
                    ?>
                </select>

                <div class="ms-image-container"><img src="<?php echo $this->image_path . $this->value(); ?>.png"/></div>
            </label>
            <?php
        }
    }

}
