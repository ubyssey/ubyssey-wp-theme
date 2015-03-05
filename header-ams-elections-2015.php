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

    <link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>">
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/custom/ams-elections-2015/js/flipclock/flipclock.css">
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/custom/ams-elections-2015/ams-2015.css">

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

    <!-- The only script that gets loaded directly in header because it has to load first on every page -->
    <script src="<?php bloginfo( 'template_url' ); ?>/js/modernizr-2.5.3.min.js"></script>

    <!-- jQuery loaded here just so that I can write inline for dev @TODO: fix all scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
    <script src="<?php bloginfo( 'template_url' ); ?>/custom/ams-elections-2015/js/flipclock/flipclock.min.js"></script>
    <script src="<?php bloginfo( 'template_url' ); ?>/custom/ams-elections-2015/ams-2015.js"></script>

    <!-- fitvid - responsive videos -->
    <script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.fitvids-ck.js"></script>
    <script>
        $(document).ready(function(){
        // Target your .container, .wrapper, .post, etc.
        $(".video").fitVids();
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
    <header class="header-ams">
        <div class="centerheader">
            <div class="ubyssey-logo"></div>
        </div>
        <div class="logo"></div>
        <div class="countdown-wrapper">
            <div class="countdown"></div>
            <p>Until voting begins</p>
            <a class="continue bounce" href="#">
                <div class="arrow-down"></div>
            </a>
        </div>
    </header><!-- .l-masthead -->