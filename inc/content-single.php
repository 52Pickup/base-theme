<?php
/**
 * Content Single
 *
 * Loop content in single post template (single.php)
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h1 class="page_heading"><?php the_title(); ?></h1>
	<?php the_content(); ?>
</article>

<div class="responses">
	<?php comments_template(); ?>
</div>