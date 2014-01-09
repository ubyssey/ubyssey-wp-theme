<?php
/**
 * Template Name: AMS Elections Feed
 *
 * The feed for posts of any type that have the category ams-elections.
 *
 */

get_header(); ?>
    <div class="l-content l-contained clearfix">
        <div class="l-main section-front">
            <div class="small-feed recent-feed">

                <header class="ams-elections-feed">
                    <img src="http://ubyssey.ca/wp-content/themes/ubyssey2012/images/ubams.jpg" alt="" class="resp">
                </header>

                <div id="ams-elections-featured" class="featured-post clearfix">
                    <?php
                        // Get most recent news, opinion or features articles with the ams-elections category
                        $args = array(
                            'post_type' => array('news', 'opinion', 'features'),
                            'posts_per_page' => '1',
                            'tax_query' => array(
                                'relation' => 'OR',
                                array(
                                    'taxonomy' => 'news_category',
                                    'field' => 'slug',
                                    'terms' => 'ams-elections'
                                ),
                                array(
                                    'taxonomy' => 'opinion_category',
                                    'field' => 'slug',
                                    'terms' => 'ams-elections'
                                ),
                                array(
                                    'taxonomy' => 'feature_category',
                                    'field' => 'slug',
                                    'terms' => 'ams-elections'
                                )
                            )
                        );
                        // The Query
                        $the_query = new WP_Query( $args );

                        // The Loop
                        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="img-wrap hide-mobile"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'featured-slide', array( 'class' => 'resp' ) ); ?></a></div>
                                <article>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                    <div class="meta hide-mobile">
                                        <span><?php the_time('F jS, Y'); ?> &nbsp;|&nbsp;</span>
                                        <span><?php the_author_posts_link(); ?>&nbsp;|&nbsp;</span>
                                        <span><a href="<?php echo substr(get_permalink(), 0, -1) . '#disqus_thread'; ?>"><span class="fs1" aria-hidden="true" data-icon="&#x2b;"></span>&nbsp;<span><?php comments_number('0 comments', '1 comment', '% comments'); ?><span></a></span>
                                    </div><!-- .meta -->
                                    <a href="#"><?php the_excerpt(); ?></a>
                                </article>
                        <?php endwhile;

                        wp_reset_postdata();
                    ?>
                </div>

                <ul class="recent-feed">
                    <?php
                        // Get all news, opinion or features articles with the ams-elections category, minus first
                        $args2 = array(
                            'post_type' => array('news', 'opinion', 'features'),
                            'posts_per_page' => '1',
                            'tax_query' => array(
                                'relation' => 'OR',
                                array(
                                    'taxonomy' => 'news_category',
                                    'field' => 'slug',
                                    'terms' => 'ams-elections'
                                ),
                                array(
                                    'taxonomy' => 'opinion_category',
                                    'field' => 'slug',
                                    'terms' => 'ams-elections'
                                ),
                                array(
                                    'taxonomy' => 'feature_category',
                                    'field' => 'slug',
                                    'terms' => 'ams-elections'
                                )
                            )
                        );
                        // The Query
                        $to_exclude = new WP_Query( $args2 );
                        $to_exclude = array( $to_exclude->post->ID );

                        $args3 = array(
                            'post_type' => array('news', 'opinion', 'features'),
                            'post__not_in' => $to_exclude,
                            'tax_query' => array(
                                'relation' => 'OR',
                                array(
                                    'taxonomy' => 'news_category',
                                    'field' => 'slug',
                                    'terms' => 'ams-elections'
                                ),
                                array(
                                    'taxonomy' => 'opinion_category',
                                    'field' => 'slug',
                                    'terms' => 'ams-elections'
                                ),
                                array(
                                    'taxonomy' => 'feature_category',
                                    'field' => 'slug',
                                    'terms' => 'ams-elections'
                                )
                            )
                        );

                        $the_query = new WP_Query( $args3 );

                        // The Loop
                        while ( $the_query->have_posts() ) : $the_query->the_post();

                            get_template_part( 'content', 'small-feed' );

                        endwhile; ?>
                </ul>

                <nav class="bottom-nav clearfix">
                    <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous page', 'ubyssey' ) ); ?></div>
                    <div class="nav-next"><?php previous_posts_link( __( 'Next Page <span class="meta-nav">&rarr;</span>', 'ubyssey' ) ); ?></div>
                </nav><!-- .bottom-nav -->

                <?php wp_reset_postdata(); ?>

            </div>

        </div><!-- .l-main -->

    <?php get_sidebar(); ?>

<?php get_footer(); ?>
