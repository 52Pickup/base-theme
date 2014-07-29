<?php get_header(); ?>

<section class="row" id="wrapper">

	<?php if ( have_posts() ) : ?>

		<h1><?php the_title(); ?></h1>
		
		<?php while ( have_posts() ) : the_post(); ?>
						
			<?php get_template_part('inc/content'); ?>
		
		<?php endwhile; ?>
		
	<?php else : ?>
	
		<h2>No posts.</h2>
				
	<?php endif; ?>

<?php get_sidebar(); ?>

</section>

<?php get_footer(); ?>
