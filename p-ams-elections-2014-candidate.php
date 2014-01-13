<?php
/**
 * Template Name: AMS Elections 2014 Candidate Page
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
    <div class="l-main" id="ams-elections-candidate">
        <?php while( have_posts() ) : the_post(); ?>
            <div class="section-header">
                <h1 class="elections"><?php the_title(); ?></h1>
            </div>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        <?php endwhile; // end of loop ?>
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
