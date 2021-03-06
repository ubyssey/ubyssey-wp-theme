<?php
/**
 * Template Name: AMS Elections 2015 Page
 *
 * Pulls posts of any type that have the category ams-elections for the feed,
 * as well as a custom sidebar that lists this year's candidates.
 *
 */

get_header('ams-elections-2015');

$terms = array('ams-elections', 'ams-elections-featured');

$cat_slug = 'all';

if( isset($_GET['cat']) ){
    $cat = get_term_by( 'slug', $_GET['cat'], 'ams_category');
    if( $cat ){
        $terms = array($_GET['cat']);
        $cat_slug = $_GET['cat'];
    }
}

?>
<div class="l-content l-contained clearfix">
    <div class="l-main section-front">
        <div class="section-header">
            <h1 class="elections">The Stories</h1>
            <ul class="elections-categories">
                <li><a class="<?php echo ($cat_slug == 'all' ? 'active' : ''); ?>" href="http://ubyssey.ca/ams-elections-2015/?cat=all">All</a></li>
                <li><a class="<?php echo ($cat_slug == 'debate-recap' ? 'active' : ''); ?>" href="http://ubyssey.ca/ams-elections-2015/?cat=debate-recap">Debate recaps</a></li>
                <li><a class="<?php echo ($cat_slug == 'race-breakdown' ? 'active' : ''); ?>" href="http://ubyssey.ca/ams-elections-2015/?cat=race-breakdown">Race breakdowns</a></li>
                <li><a class="<?php echo ($cat_slug == 'results' ? 'active' : ''); ?>" href="http://ubyssey.ca/ams-elections-2015/?cat=results">Results</a></li>
            </ul>
        </div>
        <div class="small-feed recent-feed">
            <ul class="recent-feed">
                <?php
                // Get most recent news, opinion, or features articles with the ams-elections category

                $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type' => array('news', 'opinion', 'features', 'ams'),
                    'year' => 2015,
                    'posts_per_page' => '10',
                    'paged' => $paged,
                    'tax_query' => array(
                        'relation' => 'OR',
                        array(
                            'taxonomy' => 'news_category',
                            'field' => 'slug',
                            'terms' => $terms,
                        ),
                        array(
                            'taxonomy' => 'opinion_category',
                            'field' => 'slug',
                            'terms' => $terms,
                        ),
                        array(
                            'taxonomy' => 'feature_category',
                            'field' => 'slug',
                            'terms' => $terms,
                        ),
                        array(
                            'taxonomy' => 'ams_category',
                            'field' => 'slug',
                            'terms' => $terms,
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
                <div class="nav-previous"><?php echo next_posts_link( '<span class="meta-nav">&larr;</span> Previous page', $the_query->max_num_pages ); ?></div>
                <div class="nav-next"><?php echo previous_posts_link( 'Next Page <span class="meta-nav">&rarr;</span>' ); ?></div>
            </nav><!-- .bottom-nav -->
            <?php wp_reset_postdata(); ?>
        </div>
    </div><!-- .l-main -->
    <div class="l-secondary">
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
                            'terms' => 'ams-elections-2015'
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
