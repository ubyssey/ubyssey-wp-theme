<?php
/*
 * The 404 page.
 *
 */

get_header(); ?>
	
	<div class="l-main">
		<h1>We can't find what you're looking for. 404 Error.</h1>
		<p>This page may have been moved or deleted. Hopefully the search box below can help you find what you're looking for.</p>
		<div class="search-form search-form-page clearfix">
			<?php get_search_form(); ?>
		</div>
		<p>If you believe something is wrong or that you have encountered a bug, please email <a href="mailto:webmaster@ubyssey.ca" target="_blank">webmaster@ubyssey.ca</a>.</p>
	</div><!-- .l-main -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
