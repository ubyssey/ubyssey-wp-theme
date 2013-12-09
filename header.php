<?php
/*
 * The Header for The Ubyssey 2012 theme.
 * Leaves .l-content open.
 */
?>

<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">

    <title><?php if(!is_home()){ wp_title( '|', true, 'right'); echo ' | '; } ?>The Ubyssey, UBC's official student newspaper</title>

    <!-- Compiled to from various LESS files -->
    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

    <!-- The only script that gets loaded directly in header because it has to load first on every page -->
    <script src="<?php bloginfo( 'template_url' ); ?>/js/modernizr-2.5.3.min.js"></script>

    <!-- jQuery loaded here just so that I can write inline for dev @TODO: fix all scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>

    <link rel='stylesheet' href='<?php bloginfo( 'template_url' ); ?>/popup/style.css' type='text/css' media='all' />
    <script src="<?php bloginfo( 'template_url' ); ?>/popup/jquery.cookie.js"></script>
    <script src="<?php bloginfo( 'template_url' ); ?>/popup/script.js"></script>

    <!-- fitvid - responsive videos -->
    <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.fitvids-ck.js"></script>
    <script>
        $(document).ready(function(){
        // Target your .container, .wrapper, .post, etc.
        $(".video").fitVids();
        });
    </script>

    <!-- to make select nav work -->
    <script type="text/javascript">
    $(document).ready(function(){
        $("select.show-mobile").bind( "change", function(event, ui) {
            window.location = $(this).find("option:selected").val();
        });
    });
    </script>

    <!-- to make popular widget tabs work -->
    <script type="text/javascript">
    $(document).ready(function(){
        $(".popular-tab-toggle").click( function(e) {
            e.preventDefault();
            $('.popular-tab-toggle h2').toggleClass('active');
            $('.popular ul').toggleClass('active');
        });
        $(".headline-hover").mouseover( function() {
            $(".slide").attr( 'style', 'z-index: 1;');
            $(".headline").removeClass('active');
            $(this).parent().addClass('active');
            $("#slide-" + $(this).attr('ID')).attr( 'style', 'z-index: 2;');
        });
    });
    $( document ).ready(function() {
        var windowWidth = $(window).width();
        var sliderHeight = 0;
        var slider = $(".featured-slider");
        if ( windowWidth > 1099 ) { sliderHeight = 328; }
        if ( windowWidth < 1100 && windowWidth > 850) { sliderHeight = windowWidth * .297702298; }
        if ( windowWidth < 851 ) { sliderHeight = windowWidth * .490543735; }
        slider.height( sliderHeight );
        $(".headlines").show();
        $(window).resize(function() {
            sliderHeight = $("#slide-1").height();
            slider.height( sliderHeight );
        });
    });
    </script>

    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-2313592-2']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>

    <?php wp_head(); ?>

    <script type="text/javascript" src="//use.typekit.net/qex0fvk.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

    <div class="satire-overlay"></div>
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

<div id="page">
    <div class="l-topad l-contained advertisement hide-tablet">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Header Sidebar')) : ?>
        <?php endif; ?>
    </div><!-- .l-topad -->
    <div class="l-topad-mobile l-contained advertisement hide-desktop">
        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar( 'Mobile Header Sidebar')) : ?>
        <?php endif; ?>
    </div><!-- .l-topad -->

    <header class="l-masthead">
        <div class="l-contained clearfix">
            <div class="l-leftheader hide-tablet">
                <div class="date-update">
                    <span class="date"><?php ub_pst_time(); ?></span><br />
                    <span class="updated">Last updated: <span class="update-time">
                        <?php 	// Grab the time since the last post was added/updated
                                $the_query = new WP_Query( array( 'posts_per_page' => '1', 'post_type' => array( 'news', 'culture', 'opinion', 'features', 'sports', 'video', 'photo') ) );
                                while ( $the_query->have_posts() ) : $the_query->the_post();
                                    echo get_time_since_posted();
                                endwhile;
                                // Reset Post Data
                                wp_reset_postdata();
                        ?>
                    </span></span>
                </div>
                <div class="social-icons">
                    <span><a href="https://www.facebook.com/ubyssey/"><span class="fs1 facebook" aria-hidden="true" data-icon="&#x22;"></span></a><a href="http://twitter.com/Ubyssey"><span class="fs1 twitter" aria-hidden="true" data-icon="&#x21;"></span></a><a href="<?php bloginfo('rss2_url'); ?>"><span class="fs1" aria-hidden="true" data-icon="&#x27;"></span></a></span>
                </div>
            </div><!-- .l-leftheader -->
            <div class="l-rightheader clearfix">
                <nav class="second-nav hide-mobile">
                    <ul>
                        <li><a href="/advertise-with-us/">Advertise</a></li>
                        <li>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
                        <li><a href="/about/">About</a></li>
                        <li>&nbsp;&nbsp;|&nbsp;&nbsp;</li>
                        <li><a href="/contact/">Contact</a></li>
                    </ul>
                </nav>
                <div class="search-form clearfix">
                    <?php get_search_form(); ?>
                </div>
            </div><!-- .l-rightheader -->
            <div class="l-centerheader">
                <h1 class="branding">
                    <a href="/"><span class="dingbat">U</span><span class="minion">THE UBYSSEY</span></a>
                </h1>
            </div>
        </div><!-- .l-contained -->
    </header><!-- .l-masthead -->

    <nav class="l-primarynav">
        <div class="l-contained">
            <ul class="hide-mobile">
                <li><a href="/news/" class="<?php if( is_post_type_archive( 'news' ) || 'news' == get_post_type() ){ echo 'active'; }?>">News</a></li>
                <li><a href="/culture/" class="<?php if( is_post_type_archive( 'culture' ) || 'culture' == get_post_type() ){ echo 'active'; }?>">Culture</a></li>
                <li><a href="/opinion/" class="<?php if( is_post_type_archive( 'opinion' ) || 'opinion' == get_post_type() ){ echo 'active'; }?>">Opinion</a></li>
                <li><a href="/features/" class="<?php if( is_post_type_archive( 'features' ) || 'features' == get_post_type() ){ echo 'active'; }?>">Features</a></li>
                <li><a href="/sports/" class="<?php if( is_post_type_archive( 'sports' ) || 'sports' == get_post_type() ){ echo 'active'; }?>">Sports</a></li>
                <li><a href="/videos/" class="<?php if( is_post_type_archive( 'videos' ) || 'videos' == get_post_type() ){ echo 'active'; }?>">Video</a></li>
                <li><a href="/theblog/">Blog</a></li>
            </ul>
            <select class="show-mobile" >
                <option value="/" selected>Sections</option>
                <option value="/news/">News</option>
                <option value="/culture/">Culture</option>
                <option value="/opinion/">Opinion</option>
                <option value="/features/">Features</option>
                <option value="/sports/">Sports</option>
                <option value="/videos/">Video</option>
                <option value="/vilestblog/">Blog</option>
            </select>
        </div><!-- .l-contained -->
    </nav><!-- .l-primarynav -->

    <?php /* @TODO: Make plugin that shows breaking stories */ ?>
    <?php /* if( is_single() ) :
        <div class="recent-feed hide-mobile hide-tablet">
            <div class="l-contained">
                <p><span class="lead">Breaking news:</span> <a href="#">New UBC rugby facility to be ready to use in fall 2012</a> <span class="time hide-tablet">5 minutes ago &nbsp;  < &nbsp; ></span></p>
            </div>
        </div><!-- .recent-feed -->
     endif; */ ?>

    <div class="l-content l-contained clearfix">
