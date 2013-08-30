<?php
/*
 * The main template file. Used as the default if no more specific templates are found.
 * Opens and closes .l-main
 */
get_header(); ?>

    <div class="l-main">
        <?php while( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div class="entry-content"><?php the_content(); ?></div>
        <?php endwhile; // end of loop ?>
    </div><!-- .l-main -->

    <?php get_sidebar(); ?>

<?php get_footer(); ?>
