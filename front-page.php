<?php
/*
 * The front page of The Ubyssey website.
 * Opens and closes .l-main
 */
get_header(); ?>

        <div class="l-main">
            <?php get_template_part( 'content', 'featured-slider' ); ?>

            <!-- NEWS FEATURE BOX -->
            <div class="feature-box news">
                <header class="clearfix">
                    <h2><a href="/news/">News</a></h2>
                    <nav class="tags hide-mobile">
                        <ul class="news">
                            <?php /* @TODO: Add javascript tabs for sections */ ?>
                            <li><a href="#" class="ubc">UBC</a></li>
                            <li><a href="#" class="provincial">Provincial</a></li>
                            <li><a href="#" class="student-life">Student Life</a></li>
                        </ul>
                    </nav>
                </header>
                <div class="content clearfix">
                    <section class="featured">
                        <?php
                            // Get the most recent news article with 'news-feature' category
                            $args = array( 'posts_per_page' => '1', 'post_type' => 'news', 'news_category' => 'news-featured');
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
                    <nav class="section-feed news">
                        <ul class="tab base">
                            <?php
                                // Current news feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'news', 'news_category' => 'news-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent news articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'news', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab ubc">
                            <?php
                                // Current sports feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'news', 'news_category' => 'news-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent news articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'news', 'news_category' => 'ubc', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab provincial">
                            <?php
                                // Current sports feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'news', 'news_category' => 'news-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent news articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'news', 'news_category' => 'provincial', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab student-life">
                            <?php
                                // Current sports feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'news', 'news_category' => 'news-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent news articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'news', 'news_category' => 'student-life', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>

                    </nav>
                </div><!-- .content -->
            </div><!-- NEWS .feature-box -->

            <!-- CULTURE FEATURE BOX -->
            <div class="feature-box culture">
                <header class="clearfix">
                    <h2><a href="/culture/">Culture</a></h2>
                    <nav class="tags hide-mobile">
                        <ul class="culture">
                            <li><a href="#" class="campus">Campus</a></li>
                            <li><a href="#" class="vancouver">Vancouver</a></li>
                            <li><a href="#" class="interviews">Interviews</a></li>
                            <li><a href="#" class="guides">Guides</a></li>
                        </ul>
                    </nav>
                </header>
                <div class="content clearfix">
                    <section class="featured">
                        <?php
                            // Get the most recent culture article with 'culture-feature' category
                            $args = array( 'posts_per_page' => '1', 'post_type' => 'culture', 'culture_category' => 'culture-featured');
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
                    <nav class="section-feed culture">
                        <ul class="tab base">
                            <?php
                                // Current culture feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'culture', 'culture_category' => 'culture-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent culture articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'culture', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab campus">
                            <?php
                                // Current culture feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'culture', 'culture_category' => 'culture-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent culture articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'culture', 'culture_category' => 'campus', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab vancouver">
                            <?php
                                // Current culture feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'culture', 'culture_category' => 'culture-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent culture articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'culture', 'culture_category' => 'vancouver', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab interviews">
                            <?php
                                // Current culture feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'culture', 'culture_category' => 'culture-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent culture articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'culture', 'culture_category' => 'interviews', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab guides">
                            <?php
                                // Current culture feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'culture', 'culture_category' => 'culture-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent culture articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'culture', 'culture_category' => 'guides', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>

                    </nav>
                </div><!-- .content -->
            </div><!-- culture .feature-box -->

            <?php adsanity_show_ad_group(
                array(
                    'group_ids'     => array(227), // an array of valid group ids
                    'num_ads'       => 1, // number of ads to show total
                    'num_columns'   => 1 // number of ads to show per row
                )
            ); ?>

            <!-- OPINION FEATURE BOX -->
            <div class="feature-box opinion">
                <header class="clearfix">
                    <h2><a href="/opinion/">Opinion</a></h2>
                    <nav class="tags hide-mobile">
                        <ul class="opinion">
                            <li><a href="#" class="editorials">Editorials</a></li>
                            <li><a href="#" class="last-words">Last Words</a></li>
                            <li><a href="#" class="columnists">Columnists</a></li>
                        </ul>
                    </nav>
                </header>
                <div class="content clearfix">
                    <section class="featured">
                        <?php
                            // Get the most recent opinion article with 'opinion-feature' category
                            $args = array( 'posts_per_page' => '1', 'post_type' => 'opinion', 'opinion_category' => 'opinion-featured');
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
                    <nav class="section-feed opinion">
                        <ul class="tab base">
                            <?php
                                // Current opinion feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'opinion', 'opinion_category' => 'opinion-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent opinion articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'opinion', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab editorials">
                            <?php
                                // Current opinion feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'opinion', 'opinion_category' => 'opinion-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent opinion articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'opinion', 'opinion_category' => 'editorials', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab last-words">
                            <?php
                                // Current opinion feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'opinion', 'opinion_category' => 'opinion-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent opinion articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'opinion', 'opinion_category' => 'last-words', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab columnists">
                            <?php
                                // Current opinion feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'opinion', 'opinion_category' => 'opinion-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent opinion articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'opinion', 'opinion_category' => 'columnists', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                    </nav>
                </div><!-- .content -->
            </div><!-- opinion .feature-box -->

            <!-- FEATURES FEATURE BOX -->
            <div class="feature-box features">
                <header class="clearfix">
                    <h2><a href="/features/">Features</a></h2>
                    <nav class="tags hide-mobile">
                        <ul class="features">
                            <li><a href="#" class="profiles-2">Profiles</a></li>
                            <li><a href="#" class="features">Features</a></li>
                            <li><a href="#" class="supplements">Supplements</a></li>
                        </ul>
                    </nav>
                </header>
                <div class="content clearfix">
                    <section class="featured">
                        <?php
                            // Get the most recent features article with 'features-feature' category
                            $args = array( 'posts_per_page' => '1', 'post_type' => 'features', 'feature_category' => 'features-featured');
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
                    <nav class="section-feed features">
                        <ul class="tab base">
                            <?php
                                // Current features feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'features', 'feature_category' => 'features-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent features articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'features', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab profiles-2">
                            <?php
                                // Current features feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'features', 'feature_category' => 'features-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent features articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'features', 'feature_category' => 'profiles-2', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab features">
                            <?php
                                // Current features feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'features', 'feature_category' => 'features-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent features articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'features', 'feature_category' => 'features', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab supplements">
                            <?php
                                // Current features feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'features', 'feature_category' => 'features-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent features articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'features', 'feature_category' => 'supplements', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                    </nav>
                </div><!-- .content -->
            </div><!-- features .feature-box -->

            <!-- SPORTS FEATURE BOX -->
            <div class="feature-box sports">
                <header class="clearfix">
                    <h2><a href="/sports/">Sports</a></h2>
                    <nav class="tags hide-mobile">
                        <ul class="sports">
                            <?php /* @TODO: Add javascript tabs for sections */ ?>
                            <li><a href="#" class="recaps">Recaps</a></li>
                            <li><a href="#" class="recreation">Recreation</a></li>
                            <li><a href="#" class="profiles">Profiles</a></li>
                        </ul>
                    </nav>
                </header>
                <div class="content clearfix">
                    <section class="featured">
                        <?php
                            // Get the most recent sports article with 'sports-feature' category
                            $args = array( 'posts_per_page' => '1', 'post_type' => 'sports', 'sports_category' => 'sports-featured');
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
                    <nav class="section-feed sports">

                        <script type="text/javascript">
                            $(document).ready(function() {
                                $(".section-feed .tab").hide();
                                $(".section-feed .base").show();
                                $(".tags a").click(function(e) {
                                    var theSection = $(this).parent().parent().attr("class");
                                    $("." + theSection + " .tab").hide();
                                    var theClass = $(this).attr("class");
                                    $(".section-feed ." + theClass).fadeIn(300);
                                    e.preventDefault();
                                });
                            });
                        </script>

                        <ul class="tab base">
                            <?php
                                // Current sports feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'sports', 'sports_category' => 'sports-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent sports articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'sports', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab recaps">
                            <?php
                                // Current sports feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'sports', 'sports_category' => 'sports-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent sports articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'sports', 'sports_category' => 'recaps', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab recreation">
                            <?php
                                // Current sports feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'sports', 'sports_category' => 'sports-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent sports articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'sports', 'sports_category' => 'recreation', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                        <ul class="tab profiles">
                            <?php
                                // Current sports feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'sports', 'sports_category' => 'sports-featured') );
                                wp_reset_postdata();
                                // Get the 4 most recent sports articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'sports', 'sports_category' => 'profiles', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                    </nav>
                </div><!-- .content -->
            </div><!-- SPORTS .feature-box -->

            <!-- VIDEO FEATURE BOX -->
            <div class="feature-box video">
                <header class="clearfix">
                    <h2><a href="/videos/">Video</a></h2>
                    <nav class="tags hide-mobile">
                    </nav>
                </header>
                <div class="content clearfix">
                    <section class="featured">
                        <?php
                            // EDITED: Video now features the most recent, not the most recent featured. Editor wanted it this way.
                            $args = array( 'posts_per_page' => '1', 'post_type' => 'video' );
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
                    <nav class="section-feed video">
                        <ul class="tab base">
                            <?php
                                // Current video feature (to remove from query)
                                $to_exclude = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => 'video' ) );
                                wp_reset_postdata();
                                // Get the 4 most recent video articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Arguments for final query
                                $args = array( 'posts_per_page' => '4', 'post_type' => 'video', 'post__not_in' => $to_exclude );
                                // The Query
                                $the_query = new WP_Query( $args );
                                // The Loop
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                            ?>
                        </ul>
                    </nav>
                </div><!-- .content -->
            </div><!-- video .feature-box -->

        </div><!-- .l-main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
