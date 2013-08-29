<?php
/*
 * The template used to view articles in a small feed (used on single.php for similar section)
 *
 */
?>

<li class="clearfix">
	<div class="img-wrap hide-mobile"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'small-square', array( 'class' => 'resp' ) ); ?></a></div>
	<article>
		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<div class="meta hide-mobile">
			<span><?php the_time('F jS, Y'); ?> &nbsp;|&nbsp;</span>
			<span><?php the_author_posts_link(); ?>&nbsp;|&nbsp;</span>
			<span><a href="<?php echo substr(get_permalink(), 0, -1) . '#disqus_thread'; ?>"><span class="fs1" aria-hidden="true" data-icon="&#x2b;"></span>&nbsp;<span><?php comments_number('0 comments', '1 comment', '% comments'); ?><span></a></span>
		</div><!-- .meta -->
		<a href="#"><?php the_excerpt(); ?></a>
	</article>
</li>