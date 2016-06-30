<?php 
/************************
 Template Name: example
 ***********************/
get_header(); ?>

<section id="wrapper">

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
                        
        <?php endwhile;?>    
    <?php else:?>
        <h2>No posts.</h2>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
