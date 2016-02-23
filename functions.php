<?php

/**
 * rausch functions and definitions
 *
 * @package rausch
 */

if ( ! function_exists( 'rausch_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

add_action('init','team_post_type');

function team_post_type(){

    register_post_type('team',array(
        'labels' => array(
            'name' => __('Team Members'),
            'singular_name' => __('Team Member')
            ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'has_archive' => true
        ));

}

add_action('init','screen_post_type');

function screen_post_type(){

    register_post_type('screen',array(
        'labels' => array(
            'name' => __('Screens'),
            'singular_name' => __('Screen')
            ),
        'taxonomies' => array('category'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'has_archive' => true
        ));

}

add_action('init','client_post_type');

function client_post_type(){

    register_post_type('client',array(
        'labels' => array(
            'name' => __('Clients'),
            'singular_name' => __('Client')
            ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'has_archive' => true
        ));

}

function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug;
}


function sitewide_js() {
  wp_deregister_script('jquery');
  wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"), false, '1.9.1', true);
  wp_register_script( 'main', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0', false );
  wp_register_script( 'slider', get_template_directory_uri() . '/js/superslides.js', array( 'jquery' ), '1.0.0', false );
  wp_register_script( 'object-fit', get_template_directory_uri() . '/js/polyfill.object-fit.min.js', array( 'jquery' ), '1.0.0', false );
  wp_register_script( 'is-in-viewport', get_template_directory_uri() . '/js/isInViewport.min.js', array( 'jquery' ), '1.0.0', false );
  wp_enqueue_script( 'main' );
  wp_enqueue_script( 'slider' );
  wp_enqueue_script( 'object-fit' );
  wp_enqueue_script( 'is-in-viewport' );
}
add_action( 'wp_enqueue_scripts', 'sitewide_js');

function rausch_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on rausch, use a find and replace
	 * to change 'rausch' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'rausch', get_template_directory() . '/languages' );

    // Add the ability to add a Featured Image to a Special Event.
    add_theme_support( 'post-thumbnails' );

    add_theme_support( 'menus' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // rausch_setup
add_action( 'after_setup_theme', 'rausch_setup' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/** Admin Menu **/
// function change_post_menu_label() {
//     global $menu;
//     global $submenu;
//     $menu[5][0] = 'Blog';
//     $submenu['edit.php'][5][0] = 'News & Updates';
//     $submenu['edit.php'][10][0] = 'Post an Update';
//     echo '';
// }

// function change_post_object_label() {
//         global $wp_post_types;
//         $labels = &$wp_post_types['post']->labels;
//         //$labels->name = 'News & Updates';
//         $labels->singular_name = 'news';
//         $labels->add_new = 'Post an Update';
//         $labels->add_new_item = 'Post an Update';
//         $labels->edit_item = 'Edit Updates';
//         //$labels->new_item = 'News & Updates';
//         $labels->view_item = 'View Updates';
//         $labels->search_items = 'Search Updates';
//         $labels->not_found = 'No Contacts found';
//         $labels->not_found_in_trash = 'No Contacts found in Trash';
//     }
//     add_action( 'init', 'change_post_object_label' );
//     add_action( 'admin_menu', 'change_post_menu_label' );

// CUSTOMIZE ADMIN MENU ORDER
   function custom_menu_order($menu_ord) {
       if (!$menu_ord) return true;
       return array(
        'index.php', // dashboard link
        'edit.php', //the posts tab
        'edit.php?post_type=capabilities', // Custom post type
        'edit.php?post_type=page', //the pages tab
        'separator1', // first separator
        'upload.php', // Media
        'link-manager.php', // Links
        'edit-comments.php', // Comments
        'separator2', // second separator
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'tools.php', // Tools
        'options-general.php', // Settings
        'separator-last', // Last separator
    );
   }
    add_filter('custom_menu_order', 'custom_menu_order');
    add_filter('menu_order', 'custom_menu_order');
    add_filter('acf/settings/show_admin', '__return_false');

