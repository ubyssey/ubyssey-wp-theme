<?php
/*
 * The featured slider to be used on the homepage.
 */
?>

<div class="featured-slider resp hide-mobile">
    <?php
        $args = array( 'posts_per_page' => '3', 'post_type' => 'featured-slide' );
        // Grab 3 most recent feature-slider featured images
        $the_query = new WP_Query( $args );
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
            $the_query = new WP_Query( $args );
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
