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

    function montheme_supports(){
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        register_nav_menu('header', 'En tête du menu');

        add_image_size('card-header', 350, 215, true );
    }

    function montheme_register_assets(){
        wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');

        wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
        wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', [], false, true);
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', [], false, true);
        wp_enqueue_style('bootstrap');
        wp_enqueue_script('bootstrap');
    }

    function montheme_title_separator(){
       return '|';
    }
    function montheme_menu_class($classes){
        $classes[] = 'nav-items';
        return $classes;
    }
    function montheme_menu_link_class($attrs){
        $attrs['class'] = 'nav-link';
        return $attrs;
    }
    function montheme_pagination(){
        $pages = paginate_links(['type' => 'array']);
        if($pages === null){
            return;
        }
         echo '<nav aria-label="Pagination" class="my-3">';
         echo '<ul class="pagination">';

         foreach ($pages as $page){
             $active = strpos($page, 'current') !== false;
             $class = 'page-item';
             if($active){
                 $class .= ' active';
             }
             echo '<li class="' . $class . '">';
             echo str_replace ('page-numbers', 'page-link', $page) ;
             echo'</li>';
         }
         echo '</ul>';
         echo '</nav>';
    }

    add_action('after_setup_theme', 'montheme_supports');

    add_action('wp_enqueue_scripts', 'montheme_register_assets');
    add_action('wp_enqueue_scripts', 'wordpress_scripts_loader');

    add_filter('document_title_separator', 'montheme_title_separator');
    add_filter('nav_menu_css_class', 'montheme_menu_class');
    add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');

    require_once('metaboxes/sponso.php');
    SponsoMetaBox::register();