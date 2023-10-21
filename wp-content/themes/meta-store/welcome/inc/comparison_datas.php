<?php

/** Comparison Datas */
if (!function_exists('meta_store_comparison_datas')) {

    function meta_store_comparison_datas() {
        return $comparison_datas = array(
            'pre-built' => array(
                'title' => __('Pre-built Starter Sites', 'meta-store'),
                'details' => __('Install any pre-made starter site using a single-click demo
                    installation option', 'meta-store'),
                'free' => __('6', 'meta-store'),
                'pro' => __('12', 'meta-store'),
            ),
            'dynamic-color' => array(
                'title' => __('Dynamic Color Options', 'meta-store'),
                'details' => __('Unlimited color palette to choose from', 'meta-store'),
                'free' => __('Basic', 'meta-store'),
                'pro' => __('Advanced', 'meta-store'),
            ),
            'mega-menu' => array(
                'title' => __('Advanced Mega Menu', 'meta-store'),
                'details' => __('Display beautiful multi-columned drop-down menus', 'meta-store'),
                'free' => 'no',
                'pro' => 'yes',
            ), 
            'ajax-search' => array(
                'title' => __('Ajax/Live Search', 'meta-store'),
                'details' => __('Boost your user experience by providing a user
                    friendly ajax powered search form', 'meta-store'),
                'free' => 'no',
                'pro' => 'yes',
            ),
            'web-layout' => array(
                'title' => __('Website Layout', 'meta-store'),
                'details' => __('Choose between traditional boxed layout or modern
                    wide layout for your site.', 'meta-store'),
                'free' => __('Wide, Boxed', 'meta-store'),
                'pro' => __('Wide, Boxed with more advanced settings', 'meta-store'),
            ),
            'header-layouts' => array(
                'title' => __('Header Layouts', 'meta-store'),
                'details' => __('Three Different Header Layouts to choose from', 'meta-store'),
                'free' => __('Simple', 'meta-store'),
                'pro' => __('Advanced with more customization', 'meta-store'),
            ),
            'footer-layouts' => array(
                'title' => __('Footer Layout Customization', 'meta-store'),
                'details' => __('Easy way to customize width & layout for the website footer', 'meta-store'),
                'free' => 'no',
                'pro' => 'yes',
            ),
            'sticky-sidebar' => array(
                'title' => __('Sticky Sidebar', 'meta-store'),
                'details' => __('Fix the sidebar to its position', 'meta-store'),
                'free' => 'no',
                'pro' => 'yes',
            ),
            'maintainance' => array(
                'title' => __('Maintainance Mode', 'meta-store'),
                'details' => __('Switch to maintainance mode while maintaing the website', 'meta-store'),
                'free' => 'no',
                'pro' => 'yes',
            ),
            'admin-logo' => array(
                'title' => __('Admin Logo Option', 'meta-store'),
                'details' => __('Display custom logo in login page', 'meta-store'),
                'free' => 'no',
                'pro' => 'yes',
            ),
            'page-opt' => array(
                'title' => __('Powerful Page Options', 'meta-store'),
                'details' => __('Packed with advanced page meta options to easily customize inner pages', 'meta-store'),
                'free' => 'no',
                'pro' => 'yes',
            ),
            'preloaders' => array(
                'title' => __('Preloader Options', 'meta-store'),
                'details' => __('Display preloader while loading the website', 'meta-store'),
                'free' => __('1', 'meta-store'),
                'pro' => __('15', 'meta-store'),
            ),
            'typography' => array(
                'title' => __('Typography Options', 'meta-store'),
                'details' => __('Choose from 600+ Google fonts & variations', 'meta-store'),
                'free' => __('Basic', 'meta-store'),
                'pro' => __('Advanced', 'meta-store'),
            ),
            'to-top' => array(
                'title' => __('Custom Scroll to Top Button', 'meta-store'),
                'details' => __('Customize Scroll to top button for easy site navigation', 'meta-store'),
                'free' => 'no',
                'pro' => 'yes',
            ),
            'menu-hover' => array(
                'title' => __('Menu Hover Styles', 'meta-store'),
                'details' => __('Choose from nine available hover styles for the site', 'meta-store'),
                'free' => __('0', 'meta-store'),
                'pro' => __('9', 'meta-store'),
            ),
            'gdpr' => array(
                'title' => __('GDPR Compatible & Customization', 'meta-store'),
                'details' => __('Standardise your webiste to GDPR to make your site
                    trustworthy among your customer', 'meta-store'),
                'free' => 'no',
                'pro' => 'yes',
            ),
            'toggle-menu' => array(
                'title' => __('Advanced Toggle Menu', 'meta-store'),
                'details' => __('Customize Toggle Menu to display intuitive ', 'meta-store'),
                'free' => __('Basic', 'meta-store'),
                'pro' => __('Advanced', 'meta-store'),
            ),
            'menu-cta' => array(
                'title' => __('Menu Call to Action Button', 'meta-store'),
                'details' => __('Dedicated option to display customer engaging Call to
                    Action button in menu', 'meta-store'),
                'free' => 'no',
                'pro' => 'yes',
            ),
            'cus-based' => array(
                'title' => __('Customizer Based', 'meta-store'),
                'details' => __('Preview changes as per you make using live customizer', 'meta-store'),
                'free' => 'yes',
                'pro' => 'yes',
            ),
            'woo' => array(
                'title' => __('WooCommerce Compatible', 'meta-store'),
                'details' => __('Compatible with one of the most popular Ecommerce Plugin in WordPress', 'meta-store'),
                'free' => 'Simple',
                'pro' => 'Advanced',
            ),
            'ele' => array(
                'title' => __('Elementor Compatible', 'meta-store'),
                'details' => __('Customize your website with one of the most popular Sitebuilder plugin in WordPress', 'meta-store'),
                'free' => 'Simple Widgets',
                'pro' => 'Advanced Widgets',
            ),
            'res-des' => array(
                'title' => __('Responsive Design', 'meta-store'),
                'details' => __('Whether handheld devices or wide displays your site will
                    look great', 'meta-store'),
                'free' => 'yes',
                'pro' => 'yes',
            ),
            'rev-slider' => array(
                'title' => __('Revolution Slider', 'meta-store'),
                'details' => __('Integrate Revolution slider to your site', 'meta-store'),
                'free' => 'no',
                'pro' => 'yes',
            ),
            'seo' => array(
                'title' => __('SEO Friendly', 'meta-store'),
                'details' => __('Search Engine will love it', 'meta-store'),
                'free' => 'yes',
                'pro' => 'yes',
            ),
            'rtl' => array(
                'title' => __('RTL Ready', 'meta-store'),
                'details' => __('Supports the languages with RTL nature too', 'meta-store'),
                'free' => 'yes',
                'pro' => 'yes',
            ),
            'wpml' => array(
                'title' => __('WPML Compatible & Translation Ready', 'meta-store'),
                'details' => __('Supports multilingual site and translate into any language
                    of your choice', 'meta-store'),
                'free' => 'yes',
                'pro' => 'yes',
            ),
            'lifetime-update' => array(
                'title' => __('Lifetime Updates', 'meta-store'),
                'details' => __('Regular, lifetime updates', 'meta-store'),
                'free' => 'yes',
                'pro' => 'yes',
            ),
            'child-theme' => array(
                'title' => __('Child Theme Ready', 'meta-store'),
                'details' => __('Supportss Child theme if looking for theme customizations', 'meta-store'),
                'free' => 'yes',
                'pro' => 'yes',
            ),
            'cross-brow' => array(
                'title' => __('Cross-Browser Compatibility', 'meta-store'),
                'details' => __('(IE10+, Chrome, Firefox, Safari, Opera, Edge)', 'meta-store'),
                'free' => 'yes',
                'pro' => 'yes',
            ),
            'support' => array(
                'title' => __('Theme Help & Support', 'meta-store'),
                'details' => __('Fast & Reliable support via our customer friendly support
                    team', 'meta-store'),
                'free' => __('Basic', 'meta-store'),
                'pro' => __('Dedicated', 'meta-store'),
            ),
        );
    }

}