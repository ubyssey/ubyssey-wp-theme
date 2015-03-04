<?php
/*
 * The section front for the data post type.
 */
get_header(); ?>
    <div class="l-content l-contained clearfix">
        <div class="l-main section-front">
            <div class="small-feed recent-feed">
                <header class="recent-feed">
                    <h2>Latest Stories</h2>
                </header>
                <ul class="recent-feed">
                    <?php
                        // Get the 2 most recent data article with 'data-feature' category
                        $args = array( 'posts_per_page' => '10', 'post_type' => array('data', 'features', 'sports'),
                            'tax_query' => array(
                                'relation' => 'OR',
                                array(
                                    'taxonomy' => 'feature_category',
                                    'field'    => 'slug',
                                    'terms'    => array( 'data', ),
                                ),
                                array(
                                    'taxonomy' => 'sports_category',
                                    'field'    => 'slug',
                                    'terms'    => array( 'data', ),
                                ),
                                array(
                                    'taxonomy' => 'data_category',
                                    'field'    => 'slug',
                                    'terms'    => array( 'data', ),
                                ),));
                        // The Query
                        $the_query = new WP_Query( $args );
                        // The Loop
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                            get_template_part( 'content', 'small-feed' );
                        endwhile;
                        wp_reset_postdata();
                    ?>
                </ul>

                <?php ub_content_nav( 'data-nav' ); ?>
            </div><!-- .recent -->
        </div><!-- .l-main -->
        <?php
get_sidebar();
get_footer();
?>
