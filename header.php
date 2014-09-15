<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <!-- <link rel="shortcut icon" href="" type="image/png"> -->
  <title>
		<?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 */
			global $page, $paged;
			
			wp_title( '|', true, 'right' );
		
			// Add the blog name.
			bloginfo( 'name' );
		
			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";
		
			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s', THEME_TEXTDOMAIN ), max( $paged, $page ) );
		?>
  </title>
  
  <!-- Google Analytics here -->

  <?php wp_head(); ?>

  <!--[if lte IE 9]>
	<link rel="stylesheet" href="<?php echo THEME_URL; ?>/css/ie.css">
  <![endif]-->

</head>

<body <?php body_class(); ?>>

<!-- Mobile only -->
<nav class="mobile-nav-menu">
	<a class="mobile-logo" href="<?php echo home_url(); ?>"><img src="" alt="<?php bloginfo('name'); ?> logo"></a>
	<a class="mobile-menu-btn" href="#"><span></span>Menu</a>
	<div class="mobile-menu-container">
	<?php
		wp_nav_menu(array(
			'container' => false, // remove nav container
			'container_class' => 'left', // class of container
			'theme_location' => 'main-nav', // menu name
			'depth' => 2, // limit the depth of the nav
			'fallback_cb' => false, // fallback function (see below)
		));
	?>
	</div>
</nav>

