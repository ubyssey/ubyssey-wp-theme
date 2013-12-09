<?php
/*
 * The section front for the satire post type.
 */
get_header(); ?>
</div>

<div class="l-content clearfix">
    <?php
        $args = array('posts_per_page' => '20', 'satire_category' => 'saunder');
        //$args = array('satire_category' => 'rebel');
        query_posts($args);
    ?>

    <?php while( have_posts() ) : the_post(); ?>
        <article class="l-fullwidth single">
            <div class="fw_center clearfix">
                <span class="l-fullwidth date"><?php the_time('F j, Y, g:ia T'); ?></span>
                <h1 class="l-fullwidth title"><?php the_title(); ?></h1>
                <p class="l-fullwidth snippet"><?php echo get_post_meta(get_the_ID(), 'snippet', true); ?></p>
                <span class="l-fullwidth author"><span class="blue-green">&#9658;</span> By <?php the_author(); ?></a></span>
            </div>

            <div class="l-fullwidth entry-content clearfix"><?php the_content(); ?></div>
        </article>
    <?php endwhile; //end of loop ?>
</div>
<div class="l-content l-contained clearfix">
<?php get_footer(); ?>
