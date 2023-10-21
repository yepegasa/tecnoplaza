<?php

/** Select2 Chooser */
class Meta_Store_Select2 extends WP_Customize_Control {

    public $type = 'ms-select2';

    public function render_content() {
        if (empty($this->choices)) {
            return;
        }
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

            <select class="ms-select2-chooser" multiple="multiple">
                <?php
                foreach ($this->choices as $value => $label) {
                    echo '<option value="' . esc_attr($value) . '" ' . $this->selectme($value) . '>' . esc_html($label) . '</option>';
                }
                ?>
            </select>
            <input value="<?php echo esc_attr($this->value()); ?>" type="hidden" <?php $this->link(); ?> />
        </label>
        <?php
    }

    protected function selectme($value) {
        $cats = explode(',', $this->value());
        if (in_array($value, $cats)) {
            return 'selected';
        }
        return;
    }

}
