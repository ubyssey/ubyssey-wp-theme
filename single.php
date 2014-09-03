<?php
/*
 * The template used to show single articles if nothing more specific is present.
 */
get_header(); ?>

    <div class="l-main single">
        <?php while( have_posts() ) : the_post(); ?>

            <h1><?php the_title(); ?></h1>
            <div class="post-meta">
                <span>By: <?php the_author_posts_link(); ?></a></span>
                <span class="date"><?php the_time('F j, Y, g:ia T'); ?></span>
            </div>

            <div class="entry-content"><?php the_content(); ?></div>

        <?php endwhile; //end of loop ?>

        <?php get_template_part( 'share', 'single-bottom' ); ?>

        <div class="mobile-footer">
            <!-- Mobile_Box_300x250 -->
            <div class='adslot' data-dfp='Mobile_Box_300x250' id='div-gpt-ad-1409604038885-30' style='width:300px; height:250px;'>
            <script type='text/javascript'>
            googletag.cmd.push(function() { googletag.display('div-gpt-ad-1409604038885-30'); });
            </script>
            </div>                        
        </div>

        <div class="small-feed">
            <h3>You may also like:</h3>
            <ul>
                <?php
                    // Get the 3 most recent articles of the same post type
                    $args = array(
                        'posts_per_page' => '3',
                        'post_type' => get_post_type($post->ID),
                        'post__not_in' => array(get_the_ID()),
                    );
                    // The Query
                    $the_query = new WP_Query( $args );
                    // The Loop
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        get_template_part( 'content', 'small-feed');
                    endwhile;
                    wp_reset_postdata();
                ?>
            </ul>
        </div><!-- .small-feed -->
    </div><!-- .l-main -->

<?php get_sidebar(); ?>

<div class="l-main comments">
    <?php comments_template(); ?>
</div>

<?php get_footer(); ?>
