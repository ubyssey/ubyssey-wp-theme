<?php
/*
 * The template used to display the features on each section front. div.story is already open from the archive page because it needs to keep a count.
 *
 */
?>
	<div class="img-wrap"><a href="<?php the_permalink(); ?> "><?php echo get_the_post_thumbnail( get_the_ID(), 'homepage-thumb', array( 'class' => 'resp' ) ); ?></a></div>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<div class="meta">
		<span><?php the_time('F jS, Y'); ?> &nbsp;|&nbsp;</span>
		<span><?php the_author_posts_link(); ?>&nbsp;|&nbsp;</span>
		<span><a href="<?php echo substr(get_permalink(), 0, -1) . '#disqus_thread'; ?>"><span class="fs1" aria-hidden="true" data-icon="&#x2b;"></span>&nbsp;<span><?php comments_number('0 comments', '1 comment', '% comments'); ?><span></a></span>
	</div><!-- .meta -->
	<p><?php the_excerpt(); ?></p>
</div><!-- story -->