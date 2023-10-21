<?php

/** Separator Control */
class Meta_Store_Separator extends WP_Customize_Control {

    /**
     * Control type
     *
     * @var string
     */
    public $type = 'ms-separator';

    /**
     * Control method
     *
     * @since 1.0.0
     */
    public function render_content() {
        ?>
        <p><span></span></p>
        <?php

    }

}
