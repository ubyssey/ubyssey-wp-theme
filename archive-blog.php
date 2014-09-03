<?php
/**
 * Template Name: Blog
 *
 * The section front for the blog post type.
 *
 */
get_header(); ?>

    <div class="blog-masthead">
        <h1 class="blog-title">Welcome to the Social Club</h1>
        <span class="blog-description">How we really feel about what's happening at UBC, and other idle gossip</span>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:700' rel='stylesheet' type='text/css'>
    </div>
    <div class="blog-banner">
        <img src="<?php bloginfo( 'template_url' ); ?>/images/blog-header.jpg" alt="Vancouver in the Summer" />
        <div class="blog-banner-nav">
            <ul>
                <li><a href="http://ubyssey.ca/blog/vancouver-summer-july-events-352/">July Events</a></li>
                <li><a href="http://ubyssey.ca/blog/vancouver-summer-music-235/">Music</a></li>
                <li><a href="http://ubyssey.ca/blog/vancouver-summer-beaches-385/">Beaches</a></li>
                <li><a href="http://ubyssey.ca/blog/vancouver-summer-markets-235">Markets</a></li>
            </ul>
        </div>
    </div>
    <div id="blog">
        <?php function get_post_type_taxonomies($id, $type, $tax = 'category') {
            $out = array();
            $terms = get_the_terms($id, $type . '_' . $tax);
            if (!empty($terms)) {
                foreach ($terms as $term) {
                    $out[] =
                        '<a href="' .
                        get_term_link( $term->slug, $type . '_' . $tax) .'">' .
                        $term->name .
                        '</a>';
                }
            }
            return implode(', ', $out);
        } ?>
        <?php while(have_posts()) : the_post(); ?>
            <div <?php post_class( 'post' ); ?>>
                <div class="meta left-col hide-mobile">
                    <ul>
                        <h3><?php the_time('F jS, Y'); ?></h3>
                        <li>by: <?php the_author_posts_link(); ?></li>
                        <li>in: <?php $categories = get_post_type_taxonomies($post->ID, $post->post_type, 'category'); echo $categories ?></li>
                        <li>has:<a href="<?php echo substr(get_permalink(), 0, -1) . '#disqus_thread'; ?>"></span>&nbsp;<span><?php comments_number('0 comments', '1 comment', '% comments'); ?><span class="fs1 meta-comment-icon" aria-hidden="true" data-icon="&#x2b;"></span></a></li>
                    </ul>
                </div><!-- .meta -->

                <div class="content center-col">
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

                    <div class="entry">
                        <?php the_content(); ?>
                    </div>
                </div>

                <div class="related right-col hide-mobile">
                    <h3>Similar</h3>
                    <?php
                        $args = array(
                            'post__not_in' => array($post->ID),
                            'posts_per_page' => '5',
                            'post_type' => 'blog',
                            'blog_category' => $categories
                        );
                        // The Query
                        $the_query = new WP_Query( $args );
                        // The Loop
                        if ($the_query->have_posts()) {
                            echo '<ul>';
                            while ($the_query->have_posts()) {
                                $the_query->the_post();
                                echo '<li><a href="' . get_permalink() . '">';
                                echo '<span class="related-title">' . get_the_title() . '</span>';
                                echo '<span class="related-timestamp">' . get_the_time(get_option('date_format')) . '</span></a></li>';
                            }
                            echo '</ul>';
                        }
                        // Reset Post Data
                        wp_reset_postdata();
                    ?>
                </div><!-- /.related -->
            </div>

            <div class="blog-advertisement">
                <?php if (function_exists('adsanity_show_ad_group')) {
                    adsanity_show_ad_group(array(
                        'group_ids'     => array(659), // an array of valid group ids
                        'num_ads'       => 1, // number of ads to show total
                        'num_columns'   => 1 // number of ads to show per row
                    ));
                } ?>
            </div>

        <?php endwhile; ?>

        <?php ub_content_nav( 'blog-nav' ); ?>
    </div><!-- #blog -->
<?php get_footer(); ?>
