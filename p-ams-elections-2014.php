<?php
/**
 * Template Name: AMS Elections 2014 Page
 *
 * Pulls posts of any type that have the category ams-elections for the feed,
 * as well as a custom sidebar that lists this year's candidates.
 *
 */

get_header('ams-elections-2014'); ?>
</div>

<div class="l-content clearfix">
    <div class="fw_center center-text">
        <div class="elections-header">
            <a href="<?php $page = get_page_by_title('AMS Elections 2014'); echo get_permalink($page->ID) ?>"><p class="countdown"></p></a>
        </div>
    </div>
</div>

<div class="l-content l-contained clearfix">
    <div class="l-main section-front">
        <div class="section-header">
            <h1 class="elections">The Stories</h1>
        </div>
        <div class="featured-slider resp hide-mobile">
            <?php
                // Get most recent news, opinion, or features articles with the ams-elections category
                $args = array(
                    'post_type' => array('news', 'opinion', 'features'),
                    'year' => 2014,
                    'posts_per_page' => '3',
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
                $query = new WP_Query( $args );
                $the_query = clone $query;

                $count = 1;
                $zindex = '';

                while ( $the_query->have_posts() ) : $the_query->the_post();
                    if( $count === 1 ){ $zindex = 'style="z-index: 2;"'; }
                    else { $zindex = 'style="z-index: 1;"'; }
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured-slider' );
                    echo '<img src="' . $image[0] . '" alt="" class="resp slide" id="slide-' . $count . '"' . $zindex . '>';
                    $count = $count + 1;
                endwhile;
                wp_reset_postdata(); ?>

                <div class="headlines">
                    <?php
                    // Get most recent news, opinion, or features articles with the ams-elections category
                    $the_query = clone $query;

                    $count = 1;
                    $child = '';
                    while ( $the_query->have_posts() ) : $the_query->the_post();
                        if( $count === 1 ){ $child = 'child-left active'; }
                        if( $count === 2 ){ $child = 'child-center'; }
                        if( $count === 3 ){ $child = 'child-right'; }
                        echo '<div class="headline floatLeft ' . $child . '"><a href="' . get_post_meta( get_the_ID(), 'url', true) . '" class="headline-hover" id="' . $count . '"><h3>' . get_the_title() . '</h3></a></div>';
                        $count = $count + 1;
                    endwhile;
                    wp_reset_postdata(); ?>
                </div>
        </div><!-- featured-slider -->

        <div class="small-feed recent-feed">
            <ul class="recent-feed">
                <?php
                // Get most recent news, opinion, or features articles with the ams-elections category
                $the_query = clone $query;
                $to_exclude = array();
                foreach($the_query->posts as $exclude) {
                    $to_exclude[] = $exclude->ID;
                }
                $args['post__not_in'] = $to_exclude;
                $args['posts_per_page'] = 10;
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

            <?php wp_reset_postdata(); ?>
        </div>
    </div><!-- .l-main -->

    <div class="l-secondary hide-mobile">
        <div class="section-header">
            <h1 class="elections">The Candidates</h1>
        </div>
        <div class="candidates">
            <ul><span class="position">President</span>
                <?php
                $args = array(
                    'post_type' => 'ams',
                    'orderby' => 'title',
                    'order' => 'ASC',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'ams_category',
                            'field' => 'slug',
                            'terms' => 'ams-elections-2014'
                        ),
                        array(
                            'taxonomy' => 'ams_tag',
                            'field' => 'slug',
                            'terms' => 'president'
                        )
                    )
                );
                $the_query = new WP_Query($args);
                // The Loop
                while ($the_query->have_posts()) : $the_query->the_post();
                    echo '<a href="' . get_permalink() . '"><li>';
                    if (has_post_thumbnail()) {
                        the_post_thumbnail(array(64, 64));
                    }
                    echo '<span class="candidate-name">';
                    the_title();
                    echo '</span></li></a>';
                endwhile; ?>
            </ul>

            <ul><span class="position">VP Academic</span>
                <?php
                $args['tax_query'][1]['terms'] = 'vp-academic';
                $the_query = new WP_Query($args);
                // The Loop
                while ($the_query->have_posts()) : $the_query->the_post();
                    echo '<a href="' . get_permalink() . '"><li>';
                    if (has_post_thumbnail()) {
                        the_post_thumbnail(array(64, 64));
                    }
                    echo '<span class="candidate-name">';
                    the_title();
                    echo '</span></li></a>';
                endwhile; ?>
            </ul>

            <ul><span class="position">VP External</span>
                <?php
                $args['tax_query'][1]['terms'] = 'vp-external';
                $the_query = new WP_Query($args);
                // The Loop
                while ($the_query->have_posts()) : $the_query->the_post();
                    echo '<a href="' . get_permalink() . '"><li>';
                    if (has_post_thumbnail()) {
                        the_post_thumbnail(array(64, 64));
                    }
                    echo '<span class="candidate-name">';
                    the_title();
                    echo '</span></li></a>';
                endwhile; ?>
            </ul>

            <ul><span class="position">VP Admin</span>
                <?php
                $args['tax_query'][1]['terms'] = 'vp-admin';
                $the_query = new WP_Query($args);
                // The Loop
                while ($the_query->have_posts()) : $the_query->the_post();
                    echo '<a href="' . get_permalink() . '"><li>';
                    if (has_post_thumbnail()) {
                        the_post_thumbnail(array(64, 64));
                    }
                    echo '<span class="candidate-name">';
                    the_title();
                    echo '</span></li></a>';
                endwhile; ?>
            </ul>

            <ul><span class="position">VP Finance</span>
                <?php
                $args['tax_query'][1]['terms'] = 'vp-finance';
                $the_query = new WP_Query($args);
                // The Loop
                while ($the_query->have_posts()) : $the_query->the_post();
                    echo '<a href="' . get_permalink() . '"><li>';
                    if (has_post_thumbnail()) {
                        the_post_thumbnail(array(64, 64));
                    }
                    echo '<span class="candidate-name">';
                    the_title();
                    echo '</span></li></a>';
                endwhile; ?>
            </ul>

            <ul><span class="position">Board of Governors</span>
                <?php
                $args['tax_query'][1]['terms'] = 'bog';
                $the_query = new WP_Query($args);
                // The Loop
                while ($the_query->have_posts()) : $the_query->the_post();
                    echo '<a href="' . get_permalink() . '"><li class="small">';
                    if (has_post_thumbnail()) {
                        the_post_thumbnail(array(64, 64));
                    }
                    echo '</li></a>';
                endwhile; ?>
            </ul>

            <ul><span class="position">Academic Senate</span>
                <?php
                $args['tax_query'][1]['terms'] = 'senate';
                $the_query = new WP_Query($args);
                // The Loop
                while ($the_query->have_posts()) : $the_query->the_post();
                    echo '<a href="' . get_permalink() . '"><li class="small">';
                    if (has_post_thumbnail()) {
                        the_post_thumbnail(array(64, 64));
                    }
                    echo '</li></a>';
                endwhile; ?>
            </ul>
        </div>
    </div>
<?php get_footer(); ?>
