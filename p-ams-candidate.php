<?php
/**
 * Template Name: AMS Candidate
 * 
 * The template for individual candidate pages.
 *
 */

get_header(); ?>

	<div class="l-main" id="ams-elections-candidate">
		<?php while( have_posts() ) : the_post(); ?>
			<h1><?php the_title(); ?></h1>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile; // end of loop ?>
	</div><!-- .l-main -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>