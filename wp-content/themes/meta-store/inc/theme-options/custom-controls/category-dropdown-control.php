<?php

/** Category Dropdown Control */
class Meta_Store_Category_Dropdown extends WP_Customize_Control {

    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array()) {
        $this->cats = get_categories($options);

        parent::__construct($manager, $id, $args);
    }

    public function render_content() {
        if (!empty($this->cats)) {
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

                <select <?php $this->link(); ?>>
                    <?php
                    echo '<option value="-1" ' . selected($this->value(), '-1', false) . '>' . esc_html__('Latest Posts', 'meta-store') . '</option>';
                    foreach ($this->cats as $cat) {
                        printf('<option value="%1$s" %2$s>%3$s</option>', esc_attr($cat->term_id), selected($this->value(), $cat->term_id, false), esc_html($cat->name));
                    }
                    ?>
                </select>
            </label>
            <?php
        }
    }

}
