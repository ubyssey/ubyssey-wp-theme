<?php
/**
 * Template Name: Full Width Feature Article
 *
 * The template for full width articles.
 */
get_header(); ?>

    <div class="l-featured single">
        <?php while( have_posts() ) : the_post(); ?>

            <span class="date"><?php the_time('F j, Y, g:ia T'); ?></span>
            <h1 class="l-featured title"><?php the_title(); ?></h1>
            <span class="l-featured snippet"><?php echo get_post_meta(get_the_ID(), 'snippet', true); ?></span>
            <span>By: <?php the_author_posts_link(); ?></a></span>

            <div class="entry-content"><?php the_content(); ?></div>

        <?php endwhile; //end of loop ?>

    </div>
    <div class="l-main single">
        <?php get_template_part( 'share', 'single-bottom' ); ?>

        <div class="small-feed">
            <h3>You may also like:</h3>
            <ul>
                <?php
                    // Get the 3 most recent articles of the same post type
                    $args = array( 'posts_per_page' => '3', 'post_type' => get_post_type( $post->ID ) );
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

        <?php comments_template(); ?>
    </div><!-- .l-main -->

<?php get_footer(); ?>