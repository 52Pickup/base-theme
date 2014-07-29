<?php

$theme_text_domain = 'foundation-starter';

/*************************************************************************************
*  Register Menus
**************************************************************************************/

/*if ( function_exists( 'register_nav_menus' ) ) {
   register_nav_menus( array(
      'header-nav' => __( 'Header Navigation', $theme_text_domain ),
      'main-nav' => __( 'Main Navigation', $theme_text_domain ),
      'footer-nav' => __( 'Footer Navigation', $theme_text_domain )
   ) );
}*/


/*************************************************************************************
*  Register Sidebars
*************************************************************************************/

/*if ( function_exists('register_sidebar') ) {

   function hw_widgets_init() {
      register_sidebar( array(
         'name' => __( 'Header Sidebar', $theme_text_domain ),
         'id' => 'header-sidebar',
         'description' => __( 'Header Sidebar', $theme_text_domain ),
         'before_widget' => '',
         'after_widget' => '',
         'before_title' => '',
         'after_title' => '',
      ) );
      register_sidebar( array(
         'name' => __( 'Main Sidebar', $theme_text_domain ),
         'id' => 'main-sidebar',
         'description' => __( 'Main Sidebar', $theme_text_domain ),
         'before_widget' => '',
         'after_widget' => '',
         'before_title' => '',
         'after_title' => '',
      ) );

   }

   add_action( 'widgets_init', 'hw_widgets_init' );

}*/

	
/*************************************************************************************
 *
 * Function: load_scripts
 * 
 * Purpose: Enqueue Scripts to avoid loading muliple times
 * 
 ************************************************************************************/

function load_scripts(){

   // Deregister the scripts
   wp_deregister_script('jquery');

   // Register Libraries & Helpers
   wp_register_script('modernizr', get_template_directory_uri() . '/js/vendor/custom.modernizr.js');
   wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
   wp_register_script('foundation', get_template_directory_uri() . '/js/foundation.min.js', array('modernizr','jquery'), true, true);
      
   // Plugins
   wp_register_script('myplugins', get_template_directory_uri() . '/js/myplugins.js', array('modernizr','jquery'), true, true);
   
   // Scripts
   wp_register_script('myscripts', get_template_directory_uri() . '/js/myscripts.js', array('modernizr', 'jquery', 'foundation', 'plugins'), true, true);
   
   // Enqueue the scripts
   wp_enqueue_script('modernizr');
   wp_enqueue_script('jquery');
   wp_enqueue_script('foundation');
   wp_enqueue_script('myplugins');
   wp_enqueue_script('myscripts');

}  

add_action( 'wp_enqueue_scripts', 'load_scripts' );

/*************************************************************************************
 *
 * Function: load_styles
 * 
 * Purpose: Enqueue Styles to avoid loading muliple times
 * 
 ************************************************************************************/

function load_styles() {
   
   // Load stylesheets
   wp_enqueue_style('style', get_template_directory_uri().'/style.css');// default styles
   
}

add_action( 'wp_enqueue_scripts', 'load_styles', 2 );

/*************************************************************************************
 *
 * Function: head_cleanup
 * 
 * Purpose: Make WordPress a little more secure and a lot cleaner by removing a few 
 *       links in the <head>
 * 
 ************************************************************************************/

function head_cleanup() {

   remove_action('wp_head', 'rsd_link');
   remove_action('wp_head', 'wp_generator'); //removes WP Version # for security
   remove_action('wp_head', 'feed_links', 2);
   remove_action('wp_head', 'index_rel_link');
   remove_action('wp_head', 'wlwmanifest_link');
   remove_action('wp_head', 'feed_links_extra', 3);
   remove_action('wp_head', 'start_post_rel_link', 10, 0);
   remove_action('wp_head', 'parent_post_rel_link', 10, 0);
   remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
   remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
   remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
      
}

add_action('init', 'head_cleanup');

/*************************************************************************************
* Theme Setup
*************************************************************************************/

add_theme_support( 'post-thumbnails' );  // Support for Featured Images

