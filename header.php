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
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">
  <![endif]-->

</head>

<body <?php body_class(); ?>>

