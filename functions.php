<?php

// Define your theme text domain
define('THEME_TEXTDOMAIN', 'foundation-starter');
define('THEME_URL', get_template_directory_uri());

/*************************************************************************************
*  Register Menus
**************************************************************************************/

if ( function_exists( 'register_nav_menus' ) ) {
   register_nav_menus( array(
      'main-nav' => __( 'Main Navigation', THEME_TEXTDOMAIN ),
      'footer-nav' => __( 'Footer Navigation', THEME_TEXTDOMAIN )
   ) );
}

/*************************************************************************************
*  Register Sidebars
*************************************************************************************/

if ( function_exists('register_sidebar') ) {

   function my_widgets_init() {
      register_sidebar( array(
         'name' => __( 'Main Sidebar', THEME_TEXTDOMAIN ),
         'id' => 'main-sidebar',
         'description' => __( 'This is the main sidebar.', THEME_TEXTDOMAIN ),
         'before_widget' => '<div id="%1$s" class="widget %2$s">',
         'after_widget' => '</div>',
         'before_title' => '<h3>',
         'after_title' => '</h3>',
      ) );
      register_sidebar( array(
         'name' => __( 'Blog Sidebar', THEME_TEXTDOMAIN ),
         'id' => 'blog-sidebar',
         'description' => __( 'This is the blog sidebar.', THEME_TEXTDOMAIN ),
         'before_widget' => '<div id="%1$s" class="widget %2$s">',
         'after_widget' => '</div>',
         'before_title' => '<h3>',
         'after_title' => '</h3>',
      ) );

   }

   add_action( 'widgets_init', 'my_widgets_init' );

}
	
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
  wp_register_script('modernizr', THEME_URL . '/js/vendor/modernizr.js');
  wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
  wp_register_script('foundation', THEME_URL . '/js/foundation.min.js', array('modernizr','jquery'), true, true);
      
  // Plugins
  // Only call the fitvids script if videos will be used in sliders
  // wp_register_script('fitvids', THEME_URL . '/js/vendor/jquery.bxslider/plugins/jquery.fitvids.js', 'jquery', true, true);
  wp_register_script('myplugins', THEME_URL . '/js/myplugins.js', array('modernizr','jquery'), true, true);
   
  // Scripts
  wp_register_script('myscripts', THEME_URL . '/js/myscripts.js', array('modernizr', 'jquery', 'foundation', 'myplugins'), true, true);
  // IE 8 Scripts
  //wp_register_script('myscripts_ie', THEME_URL . '/js/myscripts-ie.js', array('modernizr', 'jquery', 'foundation', 'myplugins'), true, true);
   
  // Enqueue the scripts
  wp_enqueue_script('modernizr');
  wp_enqueue_script('jquery');
  wp_enqueue_script('foundation');
  // wp_enqueue_script('fitvids'); // Only call this script for use with videos in sliders
  wp_enqueue_script('myplugins');
  wp_enqueue_script('myscripts');

  // If IE Support is required - especially for substituting CSS animations
  /*if(preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT'])){
    wp_enqueue_script('myscripts_ie');
  }
  else{
    wp_enqueue_script('myscripts');
  }*/

}  

add_action( 'wp_enqueue_scripts', 'load_scripts' );

/*************************************************************************************
 *
 * Function: load_styles
 * 
 * Purpose: Enqueue Styles to avoid loading muliple times
 * 
 ************************************************************************************/

function load_custom_styles() {
   
   // Load stylesheets
   wp_enqueue_style('font_awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');// Font Awesome
   wp_enqueue_style('fancybox_styles', THEME_URL.'/js/vendor/fancybox/source/jquery.fancybox.css');// Fancybox CSS
   wp_enqueue_style('style', THEME_URL.'/style.css');// default styles
   
}

add_action( 'wp_enqueue_scripts', 'load_custom_styles', 2 );

/*************************************************************************************
 *
 * Function: head_cleanup
 * 
 * Purpose: Make WordPress a little more secure and a lot cleaner by removing a few 
 *          links in the <head>
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

// Add support for featured images
add_theme_support( 'post-thumbnails' );

// Set the default attachments 'link to' option to 'None'
function my_attachments_options() {
    update_option('image_default_link_type', 'none' );
}
add_action('after_setup_theme', 'my_attachments_options');

if ( ! isset( $content_width ) ) {
  $content_width = 1000;
}

// Excerpt Read more link
function new_excerpt_more($more) {
    global $post;
    return '... <a class="read_more" title="' . get_the_title($post->ID) . '" href="'. get_permalink($post->ID) . '">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*************************************************************************************
* Custom login logo, url & title
*************************************************************************************/
/*function my_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo THEME_URL; ?>/img/logo.png);
            width: 200px;
            height: 133px;
            background-size: 200px 133px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );*/

