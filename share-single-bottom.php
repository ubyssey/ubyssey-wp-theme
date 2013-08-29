<?php
/*
 * The template used to display the sharing bar at the bottom of the single template.
 *
 */
?>

<div class="bottom-share">
	<div class="button facebook">
		<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="box_count" data-width="100" data-show-faces="false" data-action="recommend"></div>
	</div>
	<div class="button twitter">
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-lang="en" data-text="<?php the_title(); ?>" data-via="ubyssey" data-count="vertical">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
	<div class="button reddit">
		<script type="text/javascript" src="http://www.reddit.com/static/button/button3.js"></script>
	</div>
</div><!-- .bottom-share -->