<?php
/**
 * Template Name: Vancouver Music Scene
 *
 * The template for the September 2014 Vancouver music article.
 */
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">

    <title><?php if(!is_home()){ wp_title( '|', true, 'right'); echo ' | '; } ?>The Ubyssey, UBC's official student newspaper</title>

    <!-- Compiled to from various LESS files -->
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>?<?php echo time();?>">

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

    <!-- The only script that gets loaded directly in header because it has to load first on every page -->
    <script src="<?php bloginfo( 'template_url' ); ?>/js/modernizr-2.5.3.min.js"></script>

    <!-- jQuery loaded here just so that I can write inline for dev @TODO: fix all scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

    <script type="text/javascript">

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-2313592-2', 'ubyssey.ca');
        ga('send', 'pageview');
        
    </script>

    <script>
        // Initialize DFP 
        var googletag = googletag || {};
        googletag.cmd = googletag.cmd || [];
        (function() {
        var gads = document.createElement('script');
        gads.async = true;
        gads.type = 'text/javascript';
        var useSSL = 'https:' == document.location.protocol;
        gads.src = (useSSL ? 'https:' : 'http:') +
        '//www.googletagservices.com/tag/js/gpt.js';
        var node = document.getElementsByTagName('script')[0];
        node.parentNode.insertBefore(gads, node);
        })();
    </script>

    <script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/dfp.js"></script>

    <?php wp_head(); ?>

    <script type="text/javascript" src="//use.typekit.net/qex0fvk.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
    <!-- fitvid - responsive videos -->
    <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.fitvids-ck.js"></script>
    
</head>

<body <?php body_class(); ?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="page-dark">
	<div class="l-topad-mobile l-contained advertisement hide-desktop mobile-header">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Mobile Header Sidebar')) : ?>
        <?php endif; ?>
    </div><!-- .l-topad -->
	<header class="bar dark">
	    <h1 class="branding">
		    <a href="/"><span class="dingbat">U</span></a>
		</h1>
	</header>

	<img src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>" style="display: none;" alt="vancouver music scene">

	<div class="l-content clearfix">
	    <div class="l-fullwidth-story dark single">
	        <?php while( have_posts() ) : the_post(); ?>
	        <div class="cover-container">
	        	<div class="cover">
		        	<div class="left">
			            <img src="<?php bloginfo('template_url');?>/images/miccutout.png" />
			        </div>
			        <div class="right">
			        	<div class="dark-headers">
			                <h1 class="title"><?php the_title(); ?></h1>
			                <p class="snippet"><?php echo get_post_meta(get_the_ID(), 'snippet', true); ?></p>
			                <span class="author">By <?php the_author(); ?></a></span>
			            </div>
			        </div>
			    </div>
			</div>
	        <div class="l-fullwidth-story dark entry-content clearfix"><?php the_content(); ?></div>
	        <?php endwhile; //end of loop ?>
	    </div>
	</div>
	<div class="l-content l-contained clearfix">
	    <div class="l-fullwidth-story l-main single">
	        <?php get_template_part( 'share', 'single-bottom' ); ?>

	        <div class="small-feed">
	            <h3>You may also like:</h3>
	            <ul>
	                <?php
	                    // Get the 3 most recent articles of the same post type
	                    $args = array( 'posts_per_page' => '3', 'post_type' => get_post_type( $post->ID ) );
	                    // The Query
	                    $the_query = new WP_Query( $args );
	                    // The Loop
	                    while ( $the_query->have_posts() ) : $the_query->the_post();
	                        get_template_part( 'content', 'small-feed');
	                    endwhile;
	                    wp_reset_postdata();
	                ?>
	            </ul>
	        </div><!-- .small-feed -->

	        <?php comments_template(); ?>
	    </div><!-- .l-main -->
<?php get_footer(); ?>
