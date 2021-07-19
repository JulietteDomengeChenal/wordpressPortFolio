<?php

    /**
     * Loading All CSS Stylesheets and Javascript Files.
     */
    function wordpress_scripts_loader()
    {
        $theme_version = wp_get_theme()->get('Version');

        // 1. Styles.
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', [], $theme_version, 'all');
        wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', [], $theme_version, 'all'); // main.scss: Compiled Framework source + custom styles.

        if (is_rtl()) {
            wp_enqueue_style('rtl', get_template_directory_uri() . '/assets/css/rtl.css', [], $theme_version, 'all');
        }

        // 2. Scripts.
        wp_enqueue_script('mainjs', get_template_directory_uri() . '/assets/js/main.bundle.js', [], $theme_version, true);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    add_action('wp_enqueue_scripts', 'wordpress_scripts_loader');
