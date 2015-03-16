<?php
/*
 * The sidebar for The Ubyssey 2012 theme.
 * Opens and closes .l-secondary
 * Selects the appropriate sidebar based on the current page.
 */
?>

<div class="l-secondary">
	<div class="ams-twitter-stream">
		<a class="twitter-timeline" href="https://twitter.com/hashtag/AMSElections" data-widget-id="576096927671975936">#AMSElections Tweets</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    </div>
    <?php
    if ( is_post_type_archive( 'news' ) ){
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'News Sidebar')) { }
    }
    elseif ( is_post_type_archive( 'culture' ) ){
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Culture Sidebar')) { }
    }
    elseif ( is_post_type_archive( 'opinion' ) ){
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Opinion Sidebar')) { }
    }
    elseif ( is_post_type_archive( 'features' ) ){
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Features Sidebar')) { }
    }
    elseif ( is_post_type_archive( 'sports' ) ){
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Sports Sidebar')) { }
    }
    elseif ( is_single() ){
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Article Sidebar')) { }
    }
    elseif ( $post->post_parent == '35693' || is_page(35693) ){
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'AMS Sidebar')) { }
    }
    else {
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Default Sidebar')) { }
    }
    ?>
</div><!-- .l-secondary -->