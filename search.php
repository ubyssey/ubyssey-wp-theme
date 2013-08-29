<?php
/*
 * The template to display search results.
 *
 */
get_header(); ?>
	<div class="l-content l-contained clearfix">
		<div class="l-main section-front">
			<div class="small-feed recent-feed">
				<header class="recent-feed">
					<h2><?php printf( __( 'Search Results for: %s', 'ubyssey' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
				</header>
				<ul class="recent-feed">
					<?php while( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', 'small-feed' ); ?>

					<?php endwhile; ?>
				</ul>
				<nav class="bottom-nav clearfix">
					<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous page', 'ubyssey' ) ); ?></div>
					<div class="nav-next"><?php previous_posts_link( __( 'Next Page <span class="meta-nav">&rarr;</span>', 'ubyssey' ) ); ?></div>
				</nav><!-- .bottom-nav -->
			</div><!-- .recent -->

		</div><!-- .l-main -->
		<?php
get_sidebar();
get_footer(); 
?>