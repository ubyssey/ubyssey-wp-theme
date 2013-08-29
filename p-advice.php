<?php
/**
 * Template Name: Advice Page
 * 
 * The advice page with input form
 *
 */

get_header(); ?>

	<div class="l-main">
		<h1>Wondering what you should do?</h1>
		<p>Got a question for Dr.* Bryce Warnes, our resident advice giver? Just fill out the form below with your anonymous query, and get ready for some solid tips on What You Should Do!<br />
		<small>* not actually a doctor.</small></p>
		<form action="<?php bloginfo('template_url'); ?>/advice-submit.php" method="post">
			<p><textarea name="advice-input" id="advice-input" cols="60" rows="15"></textarea></p>
			<p><div><input type="submit" id="advice-submit"></div></p>
		</form>
	</div><!-- .l-main -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>

