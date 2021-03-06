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

      //  add_image_size('card-header', 350, 215, true );
    }

    function montheme_register_assets(){
        wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');

        wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', ['popper', 'jquery', 'jquery2', 'parallax'], false, true);
        wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js', [], false, true);
//        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', [], false, true);
        wp_register_script('jquery2', 'https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', [], false, true);
        wp_register_script('parallax', 'script/jquery.parallax-1.1.js', [], false, true);
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
//    function montheme_submenu_class($menu){
//        $menu = preg_replace('/ class="sub-menu"/', '/ class="sub-menu dropdown-menu" /', $menu);
//        return $menu;
//    }

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
    function montheme_init(){
        register_taxonomy('illustrationstyle', 'post', [
            'labels' => [
                'name' => "styles",
                'add_new_item'      => 'Ajouter un nouveau style',
                'singular_name'     => 'style',
                'all_items'         => 'styles',
                'edit_item'         => 'Modifier un style',
                'menu_name'         => 'style',
            ],
            'public'            => true,
            'show_in_rest'      => true,
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
        ]);
        register_post_type('technique', [
            'label' => 'technique',
            'public' => true,
            'menu_position' => 4,
            'support' => ['title', 'editor', 'thumbnail'],
            'show_in_rest' => true,
            'has_archive' => true,
        ]);
    }

    add_action('init', 'montheme_init');
    add_action('after_setup_theme', 'montheme_supports');

    add_action('wp_enqueue_scripts', 'montheme_register_assets');
    add_action('wp_enqueue_scripts', 'wordpress_scripts_loader');

    add_filter('document_title_separator', 'montheme_title_separator');
    add_filter('nav_menu_css_class', 'montheme_menu_class');
    add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');

    //API: https://localhost:3000/wp-json/montheme/v1/demo/39
    // Api pour récupérer le titre d'un article
    add_action('rest_api_init', function (){
        register_rest_route('montheme/v1', '/demo/(?P<id>\d+)', [
            'methods' => 'GET',
            'callback' => function(WP_REST_Request $request){
//                $response = new WP_REST_Response(['success' => 'Bonjour les gens']);
                $postID = (int)$request->get_param('id');
                $post = get_post($postID);
                if($post === null){
                    return new WP_Error('rien', 'Rien à dire', ['status' => 404]);
                }
                return $post->post_title;
            }
        ]);
    });

    require_once('metaboxes/sponso.php');
    require_once('options/agence.php');

    SponsoMetaBox::register();
    AgenceMenuPage::register();