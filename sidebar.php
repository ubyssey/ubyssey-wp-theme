<?php
/*
 * The sidebar for The Ubyssey 2012 theme.
 * Opens and closes .l-secondary
 * Selects the appropriate sidebar based on the current page.
 */
?>

<div class="l-secondary hide-mobile">
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
