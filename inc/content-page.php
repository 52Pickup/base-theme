<?php
/**
 * Content Page
 *
 * Loop content in page template (page.php)
 *
 */
?>

<article id="page-<?php the_ID(); ?>" class="body-content">
		
	<div class="row">
	
		<div class="column large-12">
			
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
						
		</div>	
		
	</div>
	
</article>