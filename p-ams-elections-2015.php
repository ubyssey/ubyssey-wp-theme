<?php
/**
 * Template Name: AMS Elections 2015 Page
 *
 * Pulls posts of any type that have the category ams-elections for the feed,
 * as well as a custom sidebar that lists this year's candidates.
 *
 */

get_header('ams-elections-2015'); ?>

<div class="l-content l-contained clearfix">
    <div class="l-main section-front">
        <div class="section-header">
            <h1 class="elections">The Stories</h1>
        </div>
        <div class="small-feed recent-feed">
            <ul class="recent-feed">
                <?php
                // Get most recent news, opinion, or features articles with the ams-elections category
                $args = array(
                    'post_type' => array('news', 'opinion', 'features', 'ams'),
                    'year' => 2015,
                    'posts_per_page' => '10',
                    'tax_query' => array(
                        'relation' => 'OR',
                        array(
                            'taxonomy' => 'news_category',
                            'field' => 'slug',
                            'terms' => array('ams-elections', 'ams-elections-featured')
                        ),
                        array(
                            'taxonomy' => 'opinion_category',
                            'field' => 'slug',
                            'terms' => array('ams-elections', 'ams-elections-featured')
                        ),
                        array(
                            'taxonomy' => 'feature_category',
                            'field' => 'slug',
                            'terms' => array('ams-elections', 'ams-elections-featured')
                        ),
                        array(
                            'taxonomy' => 'ams_category',
                            'field' => 'slug',
                            'terms' => array('ams-elections', 'ams-elections-featured')
                        )
                    )
                );
                $the_query = new WP_Query( $args );

                // The Loop
                while ( $the_query->have_posts() ) : $the_query->the_post();
                    get_template_part( 'content', 'small-feed' );
                endwhile; ?>
            </ul>

            <nav class="bottom-nav clearfix">
                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous page', 'ubyssey' ) ); ?></div>
                <div class="nav-next"><?php previous_posts_link( __( 'Next Page <span class="meta-nav">&rarr;</span>', 'ubyssey' ) ); ?></div>
            </nav><!-- .bottom-nav -->
        </div>
    </div><!-- .l-main -->
<?php get_footer(); ?>
