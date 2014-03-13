<?php
/*
 * The section front for the blog post type.
 *
 */
get_header(); ?>
    <div class="fw_center center-text">
        <h1>Welcome to the Social Club</h1>
        <h2>How we really feel about what's happening at UBC, and other idle gossip</h2>
    </div>

    <div id="blog">
        <?php function get_post_type_taxonomies($id, $type, $tax = 'category') {
            $out = array();
            $terms = get_the_terms($id, $type . '_' . $tax);
            if (!empty($terms)) {
                foreach ($terms as $term) {
                    $out[] =
                        '  <a href="'
                        .    get_term_link( $term->slug, $type . '_' . $tax) .'">'
                        .    $term->name
                        . "</a>\n";
                }
            }
            return implode('', $out);
        } ?>
        <?php while(have_posts()) : the_post(); ?>
            <div <?php post_class( 'post' ); ?>>
                <div class="meta left-col hide-mobile">
                    <ul>
                        <li><?php the_time('F jS, Y'); ?></li>
                        <li>By <?php the_author_posts_link(); ?></li>
                        <li><a href="<?php echo substr(get_permalink(), 0, -1) . '#disqus_thread'; ?>"><span class="fs1" aria-hidden="true" data-icon="&#x2b;"></span>&nbsp;<span><?php comments_number('0 comments', '1 comment', '% comments'); ?><span></a></li>
                        <li>In <?php echo get_post_type_taxonomies($post->ID, $post->post_type, 'category'); ?></li>
                    </ul>
                </div><!-- .meta -->

                <div class="content center-col">
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

                    <div class="entry">
                        <?php the_content(); ?>
                    </div>
                </div>

                <div class="related right-col hide-mobile">
                    <h3>Related</h3>
                    <?php
                    $saved = $wp_query;
                    $cats = strip_tags( get_the_category_list( ',' ) );
                    $cats = explode( ',', $cats );

                    if( !empty( $cats ) ){
                        $cat_ids = array();
                        foreach ( $cats as $cat ) {
                            $term_data = get_term_by( 'name', $cat, 'category' );
                            $cat_ids[] = $term_data->term_id;
                        }
                    }
                    //print_r($cat_ids);
                    $cats = implode( ',', $cat_ids );

                    $more_posts = query_posts( array(
                        'posts_per_page' => $woo_options['woo_more_from_count'],
                        'post__not_in' => array( get_the_id() ),
                        'category__and' => $cat_ids )
                    );

                    if ( have_posts() ) :?>
                    <ul>
                        <li>
                            <?php while ( have_posts() ) : the_post(); $count++; ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <span class="related-title"><?php the_title(); ?></span>
                                    <span><?php the_time( get_option( 'date_format' ) ); ?></span>
                            </a>
                            <?php endwhile; ?>
                        </li>
                    </ul>
                    <?php
                    endif;
                    $wp_query = $saved;
                    ?>
                </div><!-- /.related -->
            </div>

        <?php endwhile; ?>

        <?php ub_content_nav( 'blog-nav' ); ?>
    </div><!-- #blog -->
<?php get_footer(); ?>
