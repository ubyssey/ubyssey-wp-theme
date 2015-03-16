<?php
/*

 * Template Name: AMS Elections 2015 Front Page

 * The front page of The Ubyssey website.
 * Opens and closes .l-main
 */
get_header(); ?>
    
     <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/styles/ams-elections.css">
     <style>

        #results-feed {
            margin-bottom: 15px;
        }

        div.live-results {
            border: 1px solid #E8E8E8;
        }

        span.results-dot {
            display: inline-block;
            margin-right: 10px;
            height: 12px;
            width: 12px;
            border-radius: 15px;
            background: red;
        }

        div.live-results ul {
            margin: 0;
            padding: 0;
        }

        div.live-results ul li a {
            display: block;
            padding: 20px 30px;
        }

        div.live-results ul li a:hover h1, div.live-results ul li a:hover h2 {
            color: #0084b4;
        }

        div.live-results ul li {
            border-bottom: 1px solid #E8E8E8;
        }

        div.live-results ul li:last-child {
            border-bottom: none;
        }

        div.live-results h1, div.live-results h2 {
            margin: 0;
            padding: 0;
            font-family: 'lft-etica';
        }

        div.live-results ul h1 {
            font-size: 18px;
            color: #2A2F33;
            line-height: 26px;
        }

        div.live-results ul h2 {
            font-size: 18px;
            color: #212121;
            line-height: 26px;
            font-weight: 100;
        }

        div.results-header {
            padding: 12px 30px;
            border-bottom: 1px solid #E8E8E8;
        }

        div.results-header h2 {
            margin: 0;
            font-size: 14px;
        }

        div.up-next {
            background: #BE2A2A;
            padding: 30px 30px;
        }

        div.up-next span.label {
            font-size: 14px;
            font-weight: 600;
            color: rgba(255,255,255,0.75);
            text-transform: uppercase;
            line-height: 20px;
        }

        div.race-block {
            overflow: auto;
        }

        div.race-block.upcoming {
            opacity: 0.6;
        }

        div.up-next h1 {
            font-weight: 600;
            font-size: 36px;
            color: #FFFFFF;
            line-height: 52px;
            margin: 0;
            padding-right: 25px;
        }

        div.up-next div.race-block {
            margin-top: 15px;
        }

        div.up-next h2 {
            font-weight: 100;
            font-size: 18px;
            color: #FFFFFF;
            line-height: 52px;
            margin: 0;
        }

        @media(max-width: 500px){
            div.race-block .name, div.race-block .name {
                float: none;
            }
            #results-feed {
                margin-top: 15px;
            }
        }

     </style>
     <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/custom/elections-results/react.min.js"></script>
     <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/custom/elections-results/results.js"></script>

        <div class="l-main">
            
            <div id="results-feed">
            </div>

            <!-- AMS FEATURE BOX -->
            <div class="feature-box ams" id="ams-elections-box">
                <header class="clearfix">
                    <h2><a href="/ams-elections-2015/">AMS Elections</a></h2>
                </header>
                <div class="content clearfix">
                    <section class="featured">
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

                            $args = array(
                                'post_type' => array('news', 'opinion', 'features', 'ams'),
                                'year' => 2015,
                                'posts_per_page' => '1',
                                'tax_query' => array(
                                    'relation' => 'OR',
                                    array(
                                        'taxonomy' => 'news_category',
                                        'field' => 'slug',
                                        'terms' => 'ams-elections',
                                    ),
                                    array(
                                        'taxonomy' => 'opinion_category',
                                        'field' => 'slug',
                                        'terms' => 'ams-elections',
                                    ),
                                    array(
                                        'taxonomy' => 'feature_category',
                                        'field' => 'slug',
                                        'terms' => 'ams-elections',
                                    ),
                                    array(
                                        'taxonomy' => 'ams_category',
                                        'field' => 'slug',
                                        'terms' => 'ams-elections',
                                    )
                                )
                            );

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
                                $to_exclude = new WP_Query( $args );
                                wp_reset_postdata();
                                // Get the 4 most recent news articles (excluding most recent feature)
                                $to_exclude = array( $to_exclude->post->ID );
                                // Get all news, opinion or features articles with the ams-elections category, minus first
                                $args2 = array(
                                    'post_type' => array('news', 'opinion', 'features'),
                                    'post__not_in' => $to_exclude,
                                    'posts_per_page' => '4',
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

                                $args2 = array(
                                    'post_type' => array('news', 'opinion', 'features', 'ams'),
                                    'post__not_in' => $to_exclude,
                                    'year' => 2015,
                                    'posts_per_page' => '4',
                                    'tax_query' => array(
                                        'relation' => 'OR',
                                        array(
                                            'taxonomy' => 'news_category',
                                            'field' => 'slug',
                                            'terms' => 'ams-elections',
                                        ),
                                        array(
                                            'taxonomy' => 'opinion_category',
                                            'field' => 'slug',
                                            'terms' => 'ams-elections',
                                        ),
                                        array(
                                            'taxonomy' => 'feature_category',
                                            'field' => 'slug',
                                            'terms' => 'ams-elections',
                                        ),
                                        array(
                                            'taxonomy' => 'ams_category',
                                            'field' => 'slug',
                                            'terms' => 'ams-elections',
                                        )
                                    )
                                );

                                // The Query
                                $the_query = new WP_Query( $args2 );
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
            </div><!-- AMS .feature-box -->

            <!-- NEWS FEATURE BOX -->
            <div class="feature-box news">
                <header class="clearfix">
                    <h2><a href="/news">News</a></h2>
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
                    <h2><a href="/culture">Culture</a></h2>
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

            <!-- OPINION FEATURE BOX -->
            <div class="feature-box opinion">
                <header class="clearfix">
                    <h2><a href="/opinion">Opinion</a></h2>
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
                    <h2><a href="/features">Features</a></h2>
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
                    <h2><a href="/sports">Sports</a></h2>
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
                    <h2><a href="/videos">Video</a></h2>
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
