<?php
/*
 * The template that displays archives for individual authors. It also displays their bio and other info if they exist.
 *
 */
get_header(); ?>

	<div class="l-main section-front">
		<?php if ( have_posts() ) : ?>

			<?php
				/* Queue the first post, that way we know
				 * what author we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				the_post();
			?>

			<h1 class="archive-title"><?php printf( __( 'Archives of: %s', 'ubyssey' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>

			<?php
				/* Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>

			<?php
			// If a user has filled out their description, show a bio on their entries.
			if ( get_the_author_meta( 'description' ) ) : ?>
			<div class="author-info clearfix">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), 150 ); ?>
				<p><?php the_author_meta( 'description' ); ?></p>
			</div><!-- .author-info -->
			<?php endif; ?>
			
			<div class="small-feed recent-feed">
				<ul class="recent-feed">
					
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'small-feed' ); ?>
					<?php endwhile; ?>
					
					<nav class="bottom-nav clearfix">
						<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous page', 'ubyssey' ) ); ?></div>
						<div class="nav-next"><?php previous_posts_link( __( 'Next Page <span class="meta-nav">&rarr;</span>', 'ubyssey' ) ); ?></div>
					</nav><!-- .bottom-nav -->
					
				</ul>
			</div>

		<?php else : ?>
			<h1>No Archives Found.</h1>
		<?php endif; ?>
		
		
				
	</div><!-- .l-main -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
