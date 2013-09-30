<?php
/*
 * Where all the magic happens
 */

// Setup post thumbnails (featured images)
add_theme_support( 'post-thumbnails' );
add_image_size( 'homepage-thumb', 499, 295, true );
add_image_size( 'small-square', 200, 166, true );
add_image_size( 'pdf-thumb', 300, 9999, false );
add_image_size( 'featured-slide', 833, 417, true );

// Widget Setup
// Default Sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Default Sidebar',
        'id' => "default-sidebar",
        'description' => '',
        'class' => 'sidebar-class',
        'before_widget' => '<div class="l-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
    ));
}
// Article Sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Article Sidebar',
        'id' => "article-sidebar",
        'description' => '',
        'class' => 'sidebar-class',
        'before_widget' => '<div class="l-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
    ));
}
// News Sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'News Sidebar',
        'id' => "news-sidebar",
        'description' => '',
        'class' => 'sidebar-class',
        'before_widget' => '<div class="l-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
    ));
}
// Culture Sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Culture Sidebar',
        'id' => "culture-sidebar",
        'description' => '',
        'class' => 'sidebar-class',
        'before_widget' => '<div class="l-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
    ));
}
// Opinion Sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Opinion Sidebar',
        'id' => "opinion-sidebar",
        'description' => '',
        'class' => 'sidebar-class',
        'before_widget' => '<div class="l-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
    ));
}
// Features Sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Features Sidebar',
        'id' => "features-sidebar",
        'description' => '',
        'class' => 'sidebar-class',
        'before_widget' => '<div class="l-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
    ));
}
// Sports Sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Sports Sidebar',
        'id' => "sports-sidebar",
        'description' => '',
        'class' => 'sidebar-class',
        'before_widget' => '<div class="l-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
    ));
}
// AMS Sidebar
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'AMS Sidebar',
        'id' => "ams-sidebar",
        'description' => '',
        'class' => 'sidebar-class',
        'before_widget' => '<div class="l-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>'
  ));
}
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Header Sidebar',
        'id' => "header-sidebar",
        'description' => '',
        'class' => '',
        'before_widget' => '<div class="l-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
    ));
}
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Mobile Header Sidebar',
        'id' => "mobile-header-sidebar",
        'description' => '',
        'class' => '',
        'before_widget' => '<div class="l-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => ''
    ));
}

//Display navigation to next/previous pages when applicable
function ub_content_nav( $nav_id ) {
    global $wp_query;

    if ( $wp_query->max_num_pages > 1 ) : ?>
        <nav class="bottom-nav clearfix" id="<?php echo $nav_id; ?>">
            <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'ubyssey' ) ); ?></div>
            <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'ubyssey' ) ); ?></div>
        </nav><!-- .bottom-nav -->
    <?php endif;
}

// Custom Captions
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {
    /* We're not worried abut captions in feeds, so just return the output here. */
    if ( is_feed() )
        return $output;

    /* Set up the default arguments. */
    $defaults = array(
        'id' => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => ''
    );

    /* Merge the defaults with user input. */
    $attr = shortcode_atts( $defaults, $attr );

    /* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
    if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
        return $content;

    /* Set up the attributes for the caption <div>. This is where we remove the width attribute! */
    $attributes = ( !empty( $attr['id'] ) ? ' id="' . esc_attr( $attr['id'] ) . '"' : '' );
    $attributes .= ' class="wp-caption ' . esc_attr( $attr['align'] ) . '"';
    // $attributes .= ' style="width: ' . esc_attr( $attr['width'] ) . 'px"';

    /* Open the caption <div>. */
    $output = '<div' . $attributes .'>';

    /* Allow shortcodes for the content the caption was created for. */
    $output .= do_shortcode( $content );

    /* Append the caption text. */
    $output .= '<p class="wp-caption-text">' . $attr['caption'] . '</p>';

    /* Close the caption </div>. */
    $output .= '</div>';

    /* Return the formatted, clean caption. */
    return $output;
}

// Returns time since posted
function get_time_since_posted() {
    $time_since_posted = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' ago';
    return $time_since_posted;
}

// Removes the visual editor for everyone
add_filter ( 'user_can_richedit' , create_function ( '$a' , 'return false;' ) , 50 );
//add_filter( 'user_can_richedit' , '__return_false', 50 );

// custom admin login logo
function custom_login_logo() {
    echo '<style type="text/css">
    h1 a { background-image: url('.get_bloginfo('template_directory').'/images/UbysseySealLogo.png) !important; background-size: 300px 300px !important; width: 315px !important; height: 300px !important; }
    </style>';
}
add_action('login_head', 'custom_login_logo');

// Add custom post types to RSS feed
function modified_feed_request($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array( 'post', 'news', 'culture', 'opinion', 'features', 'sports', 'video' );
    return $qv;
}
add_filter('request', 'modified_feed_request');

// Get date outsite loop, modified to be PST not UTC
function ub_pst_time() {
    // Save backup for default time
    $timezoneSettingBackup = date_default_timezone_get();

    // Set default time to Vancouver time (PST/PDT)
    date_default_timezone_set("America/Vancouver");

    // Get Vancouver time from server and echo
    $my_date = date('Y-m-d H:i:s');
    echo mysql2date('l, F j, Y', $my_date, true);

    // Set default time back to original
    date_default_timezone_set($timezoneSettingBackup);
}

// Make Authors archives check all of the custom posts
function custom_post_author_archive( &$query )
{
    if ( $query->is_author ) {
      $query->set( 'post_type', array('news', 'ams', 'culture', 'features', 'opinion', 'sports', 'photo', 'video', 'post') );
    }

    remove_action( 'pre_get_posts', 'custom_post_author_archive' ); // run once!
}
add_action( 'pre_get_posts', 'custom_post_author_archive' );

add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
    //if(is_category() || is_tag()) {
        $post_type = get_query_var('post_type');
        if($post_type)
            $post_type = $post_type;
        else
            $post_type = array('post','news'); // replace cpt to your custom post type
        $query->set('post_type',$post_type);
        return $query;
    //}
}
