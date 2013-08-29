<?php
/*
 * The section front for the Video post type.
 *
 */
get_header(); ?>
<div class="video-subhead clearfix">
	<div class="featured-video">
	<?php
		// Gets the most recent featured video post
		$args = array(
			'posts_per_page' => '1', 
			'post_type' => 'video',
			'video_category' => 'video-featured'
		);
		// The Query
		$the_query = new WP_Query( $args );
		// The Loop
		$the_url = '';
		$the_title = '';
		while ( $the_query->have_posts() ) : $the_query->the_post();
			
			echo get_post_meta( get_the_ID(), 'url', true);
		
		endwhile;
		
		// Reset Post Data
		wp_reset_postdata(); ?>

		<h2>Featured Video</h2>
	</div>
	<div class="weekly-show">
	<?php
		// Gets the most recent featured video post
		$args = array(
			'posts_per_page' => '1', 
			'post_type' => 'video',
			'video_category' => 'weekly-show'
		);
		// The Query
		$the_query = new WP_Query( $args );
		// The Loop
		$the_url = '';
		$the_title = '';
		while ( $the_query->have_posts() ) : $the_query->the_post();
			
			echo get_post_meta( get_the_ID(), 'url', true);
		
		endwhile;
		
		// Reset Post Data
		wp_reset_postdata(); ?>

		<h2>Ubyssey Weekly Show</h2>
	</div>
</div>
		<div class="l-main section-front video-page">
			<div class="video-nav">
				<h4>Segments:</h4>
				<ul class="clearfix">
					<li><a href="<?php bloginfo( 'url' ); ?>/video-categories/weekly-show/">Weekly Show</a></li>
					<li><a href="<?php bloginfo( 'url' ); ?>/video-categories/culture/">Culture</a></li>
					<li><a href="<?php bloginfo( 'url' ); ?>/video-categories/features-2/">Features</a></li>
					<li><a href="<?php bloginfo( 'url' ); ?>/video-categories/news/">News</a></li>
					<li><a href="<?php bloginfo( 'url' ); ?>/video-categories/sessions/">Sessions</a></li>
					<li><a href="<?php bloginfo( 'url' ); ?>/video-categories/sports/">Sports</a></li>
					<li><a href="<?php bloginfo( 'url' ); ?>/video-categories/thunderbirds-vs-thundernerds/">Thunderbirds vs Thundernerds</a></li>
				</ul>
			</div>
			<div class="small-feed recent-feed">
				<header class="recent-feed">
					<h2>Latest Videos</h2>
				</header>
				<ul class="recent-feed video-feed">
					<?php while( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'small-feed' ); ?>

					<?php endwhile; ?>
				</ul>

				<?php ub_content_nav( 'video-nav' ); ?>

			</div><!-- .recent -->

		</div><!-- .l-main -->
		<?php
get_sidebar();
get_footer(); 
?>