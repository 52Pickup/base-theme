<?php
/**
 * Content Page
 *
 * Loop content in page template (page.php)
 *
 */
?>
		
<div id="page-<?php the_ID(); ?>"  class="row">
	
	<div class="column large-12">
			
		<h1><?php the_title(); ?></h1>
		<?php the_content(); ?>
						
	</div>	
		
</div>
