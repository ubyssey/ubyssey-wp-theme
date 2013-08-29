<?php
/*
 * The template used to display the sharing at the top of a single article.
 *
 */
?>

<div class="top-share">
	<ul class="clearfix">
		<li class="facebook-like"><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="126" data-show-faces="true" data-action="recommend"></div></li>
		<li class="tweet">Tweet</li>
		<li class="reddit hide-mobile"><script type="text/javascript" src="http://www.reddit.com/static/button/button1.js"></script></li>
		<li class="hide-mobile hide-tablet"><a href="mailto:?subject=The Ubyssey: <?php the_title(); ?>&body=<?php the_permalink(); ?>" target="_blank"><span aria-hidden="true" class="icon-email"></span>&nbsp; email</a></li>
		<li class="hide-mobile hide-tablet"><a href="javascript:window.print()"><span aria-hidden="true" class="icon-printer"></span>&nbsp; print</a></li>
	</ul>
</div><!-- .top-share -->