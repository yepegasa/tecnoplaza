<?php
if (class_exists('WP_Customize_Section')) {

    class Meta_Store_Upgrade_Section extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'ms-upgrade-section';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_text = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_url = '';

        /**
         * Custom pro features lists.
         *
         * @since  1.0.0
         * @access public
         * @var    array
         */
        public $options = array();
        public $upgrade = false;

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function json() {
            $json = parent::json();

            $json['pro_text'] = $this->pro_text;
            $json['pro_url'] = $this->pro_url;
            $json['options'] = $this->options;
            $json['upgrade'] = $this->upgrade;

            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() {
            ?>

            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                <# if ( data.upgrade ) { #>
                <div class="ms-info-control">
                    <# } #>

                    <# if ( data.title ) { #>
                    <label class="ms-accordion-section-title">
                        {{ data.title }}
                    </label>
                    <# } #>


                    <# if ( _.isArray(data.options) && !_.isEmpty(data.options) ) { #>
                    <div class="ms-pro-features customize-control-description">
                        <# _.each( data.options, function(key, value) { #>
                        {{ key }}<br/>
                        <# }) #>
                    </div>
                    <# } #>

                    <# if ( data.pro_text && data.pro_url ) { #>
                    <a href="{{ data.pro_url }}" class="button button-primary" target="_blank">{{ data.pro_text }}</a>
                    <# } #>

                    <# if ( data.upgrade ) { #>
                </div>
                <# } #>

            </li>
            <?php
        }

    }

}
