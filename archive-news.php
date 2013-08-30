<?php
/*
 * The section front for the news post type.
 *
 */
get_header(); ?>
    <div class="l-content l-contained clearfix">
        <div class="l-main section-front">
        <?php // Only show features and editors if it is the first page. they get really annoying when your looking from something.
        $paged = $wp_query->get( 'paged' );
        if ( ! $paged || $paged < 2 ) : ?>

            <div class="section-featured clearfix">
                <header>
                    <h2>Featured Stories</h2>
                </header>
                <div class="content">
                    <?php
                        // Count to hide second feature form mobile
                        $count = 0;
                        // Get the 2 most recent news article with 'news-feature' category
                        $args = array( 'posts_per_page' => '2', 'post_type' => 'news', 'news_category' => 'news-featured');
                        // The Query
                        $the_query = new WP_Query( $args );
                        // The Loop
                        while ( $the_query->have_posts() ) : $the_query->the_post();
                            // Increase count and open story div. add hide-mobile to the second story
                            $count = $count + 1;
                            if ( $count == 1 ) { echo '<div class="story">'; }
                            else { echo '<div class="story hide-mobile">'; }

                            get_template_part( 'content', 'section-features' );

                        endwhile;
                        wp_reset_postdata();
                    ?>
                </div><!-- .content -->
            </div><!-- .section-featured -->

            <div class="feature-box">
                <header class="clearfix">
                    <h2><a href="#">Editors Picks</a></h2>
                </header>
                <div class="content clearfix">
                    <section class="featured">
                        <?php
                            // Get the most recent news article with 'news-feature' category
                            $args = array( 'posts_per_page' => '1', 'post_type' => 'news', 'news_category' => 'news-editors' );
                            // The Query
                            $the_query = new WP_Query( $args );
                            // The Loop
                            while ( $the_query->have_posts() ) : $the_query->the_post();
                                echo '<a href="' . get_permalink() . '">' . get_the_post_thumbnail( get_the_ID(), 'homepage-thumb', array( 'class' => 'resp' ) ) . '</a>';
                                echo '<a href="' . get_permalink() . '"><p>' . get_the_title() . '</p></a>';
                            endwhile;
                            // Reset Post Data
                            wp_reset_postdata();
                        ?>
                    </section>
                    <nav class="section-feed">
                        <ul>
                            <?php
                                // Current news feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'news', 'news_category' => 'news-editors' ) );
                                wp_reset_postdata();
                                // Get the 4 most recent news articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'news', 'news_category' => 'news-editors', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                wp_reset_postdata();
                            ?>
                        </ul>
                    </nav>
                </div><!-- .content -->
            </div><!-- .feature-box -->
        <?php endif; ?>

            <div class="small-feed recent-feed">
                <header class="recent-feed">
                    <h2>Latest Stories</h2>
                </header>
                <ul class="recent-feed">
                    <?php while( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'small-feed' ); ?>

                    <?php endwhile; ?>
                </ul>

                <?php ub_content_nav( 'news-nav' ); ?>

            </div><!-- .recent -->

        </div><!-- .l-main -->
        <?php
get_sidebar();
get_footer();
?>
