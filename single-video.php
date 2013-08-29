<?php
/*
 * The tempalted used to display a single video post
 *
 */
get_header(); ?>
	<div class="l-content l-contained clearfix">
		
	<?php while( have_posts() ) : the_post(); ?>
		<div class="l-main section-front">
			<div class="main-video">
				<h1><?php the_title(); ?></h1>
				<div class="vid-wrap"><?php echo get_post_meta( get_the_ID(), 'url', true); ?></div>
			</div><!-- .main-video -->
			<div class="post-content">
				<?php the_content(); ?>
			</div><!-- .post-content -->
			<div class="comments">
				<?php comments_template(); ?>
			</div><!-- .comments -->
		</div><!-- .l-main -->
	<?php endwhile; ?>


		<div class="l-secondary">
			<div class="recent-video">
				<h2>Recent Videos:</h2>
				<ul>
				<?php
					// Get the 3 most recent videos
					$args = array( 'posts_per_page' => '5', 'post_type' => 'video' );
					// The Query
					$the_query = new WP_Query( $args );
					// The Loop
					while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<li>
							<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
							<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'homepage-thumb', array( 'class' => 'resp' ) ); ?></a>
						</li>
							
					<?php endwhile;
					wp_reset_postdata();
				?>
			</ul>
			</div>
		</div><!-- .l-secondary -->




<?php get_footer(); ?>