<?php
/**
 * Content
 *
 * Displays content shown in the 'index.php' loop
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<span class="post_date">Posted on <?php echo get_the_date('F j, Y'); ?></span>
	<?php the_excerpt(); ?>
</article>
