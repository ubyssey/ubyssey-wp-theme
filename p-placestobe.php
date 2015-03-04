<?php
/**
 * Template Name: Places to Be Map
 *
 * The template for places to be articles.
 */
  $ptb_url = get_bloginfo('template_url') .'/snippets/ptb';
?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
  <title><?php wp_title( '|', true, 'right'); ?></title>
  <script src="//use.typekit.net/mwx0bni.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>
  <link rel="stylesheet" href="<?php echo $ptb_url; ?>/ptb.css" />
  <?php wp_head(); ?>
</head>
<body>
<div class="bar top">
  <div class="ptb-container">
    <div class="inner"><a href="http://ubyssey.ca"><img class="logo" src="<?php echo $ptb_url; ?>/ubyssey-logo.png" /></a></div>
  </div>
</div>
<div class="ptb-loader">
  <img src="<?php echo $ptb_url; ?>/loader2.gif" />
  <span> Loading story</span>
</div>
<div id="ptb-main">
<div class="ptb-container">
  <div class="map-container">
    <div class="map-overlay"></div>
    <svg id="callouts">
    </svg>
    <div id="tolkein-map">
      <div id="map-container">
        <div id="map-contents">
          <svg id="map-image" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
   width="1800px" height="1992px" viewBox="0 0 1800 1992" enable-background="new 0 0 1800 1992" xml:space="preserve">
            <path class="trace" opacity="1" stroke="#FFFF00" fill="none" stroke="#000000" stroke-miterlimit="10" d="M358.207,180.646c0,0-3.193-5.98,1.473-14.98s-7.727-20-9.53-36.333
  s-10.481-74.942-20.47-93c-8.667-15.667-28.12-20.216-26-36.333"/>
            <path fill="none" stroke="#000000" stroke-width="5" stroke-miterlimit="10" d="M358,180.333c0,7.252,16.698,16.613,23.667,29
  c6,10.667-2.667,25.333,10.667,28.667C421.114,245.196,440,258.333,436,289c-5.935,45.506,29.667,73.999,22.667,96.999
  S429.552,431.795,428,465c-1.667,35.666,37.486,129,31.743,166s-25.936,45,0.661,89S500,787,495,837
  c-3.213,32.132,3.072,61.373,17.264,84.008c0,0,24.885-14.598,29.071-8.305c6.438,9.68-34.566,26.05-29.071,36.294
  c5.527,10.304,36.53-24.604,44.071-15.667c6.538,7.749-32.71,20.357-28,29.335c3.71,7.073,23.092-17.651,29.333-12.667
  c3.875,3.095-11.535,14.213-8.333,18c3.47,4.104,13.934-13.214,18.667-10.667c4.706,2.534-4,21-4,21
  c18.732,13.363,26.924,11.402,33,32.667c8,28,42,49,82,59s38,10,46,18s7,9,37,7s28.799-4.98,52,0.887
  c22.381,5.66,46.526-3.192,52-7.887c4.667-4.002,28.188-20.932,39-23.669c23.295-5.897,41.646-31.608,70.667-46.667
  c13.827-7.174,22.784-20.824,36.374-26.915C1029.333,982.998,1057,966.332,1068,952c23.684-30.856,41.202-47.078,59-58
  c22-13.5,36-6,36-6s62.5,22,92,17.5s66.5-17.5,76-24s44-8,42.5,21s-6.232,46.895-8.5,62.5c-0.785,5.403-1.482,17.933-6,21
  c-5.44,3.694-25.786-2.574-25.997,3.998c-0.225,7.003,26.12,5.75,25,12.667c-1.266,7.817-28.71-2.806-31.333,4.667
  c-1.796,5.116,16.141,10.365,15,15.666c-1.267,5.885-22.333,9-22.333,9"/>
            <path class="main" fill="none" stroke="#FFFF00" stroke-width="2" stroke-miterlimit="10" d="M358,180.333c0,7.252,16.698,16.613,23.667,29
  c6,10.667-2.667,25.333,10.667,28.667C421.114,245.196,440,258.333,436,289c-5.935,45.506,29.667,73.999,22.667,96.999
  S429.552,431.795,428,465c-1.667,35.666,37.486,129,31.743,166s-25.936,45,0.661,89S500,787,495,837
  c-3.213,32.132,3.072,61.373,17.264,84.008c0,0,24.885-14.598,29.071-8.305c6.438,9.68-34.566,26.05-29.071,36.294
  c5.527,10.304,36.53-24.604,44.071-15.667c6.538,7.749-32.71,20.357-28,29.335c3.71,7.073,23.092-17.651,29.333-12.667
  c3.875,3.095-11.535,14.213-8.333,18c3.47,4.104,13.934-13.214,18.667-10.667c4.706,2.534-4,21-4,21
  c18.732,13.363,26.924,11.402,33,32.667c8,28,42,49,82,59s38,10,46,18s7,9,37,7s28.799-4.98,52,0.887
  c22.381,5.66,46.526-3.192,52-7.887c4.667-4.002,28.188-20.932,39-23.669c23.295-5.897,41.646-31.608,70.667-46.667
  c13.827-7.174,22.784-20.824,36.374-26.915C1029.333,982.998,1057,966.332,1068,952c23.684-30.856,41.202-47.078,59-58
  c22-13.5,36-6,36-6s62.5,22,92,17.5s66.5-17.5,76-24s44-8,42.5,21s-6.232,46.895-8.5,62.5c-0.785,5.403-1.482,17.933-6,21
  c-5.44,3.694-25.786-2.574-25.997,3.998c-0.225,7.003,26.12,5.75,25,12.667c-1.266,7.817-28.71-2.806-31.333,4.667
  c-1.796,5.116,16.141,10.365,15,15.666c-1.267,5.885-22.333,9-22.333,9"/>
            <circle class="waypoint" id="point-1" fill="#FFFF00" cx="358.207" cy="180.646" r="8"/>
            <circle class="waypoint" id="point-2" fill="#FFFF00" cx="435.207" cy="508.646" r="8"/>
            <circle class="waypoint" id="point-3" fill="#FFFF00" cx="504.207" cy="904.646" r="8"/>
            <circle class="waypoint" id="point-4" fill="#FFFF00" cx="720.207" cy="1083.646" r="8"/>
            <circle class="waypoint" id="point-5" fill="#FFFF00" cx="893.207" cy="1068.646" r="8"/>
            <circle class="waypoint" id="point-6" fill="#FFFF00" cx="1010.207" cy="990.646" r="8"/>
            <circle class="waypoint" id="point-7" fill="#FFFF00" cx="1216.207" cy="902.646" r="8"/>
            <circle class="waypoint" id="point-8" fill="#FFFF00" cx="1366.207" cy="955.646" r="8"/>
            <circle class="waypoint" id="point-9" fill="#FFFF00" cx="1319.207" cy="1031.646" r="8"/>
            <text class="callout callout-1" transform="matrix(1 0 0 1 375 184.646)" font-family="'LFTEtica-Regular'" font-size="11">TRAILHEAD</text>
            <text class="callout callout-2" transform="matrix(1 0 0 1 450.5142 513.146)" font-family="'LFTEtica-Regular'" font-size="11">MEADOW</text>
            <text class="callout callout-3" transform="matrix(0.9777 -0.21 0.21 0.9777 521.8472 904.5078)" font-family="'LFTEtica-Regular'" font-size="11">SWITCHBACKS</text>
            <text class="callout callout-4" transform="matrix(0.6209 -0.7839 0.7839 0.6209 733.8867 1074.3125)" font-family="'LFTEtica-Regular'" font-size="11">LONG LAKE</text>
            <text class="callout callout-5" transform="matrix(-0.1109 -0.9938 0.9938 -0.1109 894.8857 1053.7031)" font-family="'LFTEtica-Regular'" font-size="11">CABIN</text>
            <text class="callout callout-6" transform="matrix(-0.436 -0.8999 0.8999 -0.436 1007.3936 976.8486)" font-family="'LFTEtica-Regular'" font-size="11">UPPER LAKE</text>
            <text class="callout callout-7" transform="matrix(-0.2209 -0.9753 0.9753 -0.2209 1217.1777 888.373)" font-family="'LFTEtica-Regular'" font-size="11">ROCK GARDEN</text>
            <text class="callout callout-8" transform="matrix(-0.5706 -0.8212 0.8212 -0.5706 1362.6494 942.0684)" font-family="'LFTEtica-Regular'" font-size="11">THE COL</text>
            <text class="callout callout-9" transform="matrix(-0.5706 -0.8212 0.8212 -0.5706 1314.7461 1017.4629)" font-family="'LFTEtica-Regular'" font-size="11">TURN AROUND</text>
            <g class="scale">
              <text transform="matrix(-4.371139e-08 -1 1 -4.371139e-08 554.3862 134.9263)" fill="#F2F2F2" font-family="'LFTEtica-Regular'" font-size="11">400m</text>
              <polyline fill="none" stroke="#FFFFFF" stroke-width="2" stroke-miterlimit="10" points="552,73 563,73 563,173 552,173 "/>
              <text transform="matrix(0.4442 -0.8959 0.8959 0.4442 462.7178 172.7925)" fill="#FFFFFF" font-family="'LFTEtica-Regular'" font-size="11">PEMBERTON 31km</text>
              <polyline fill="#FFFFFF" points="496.739,77.775 508.974,70.887 511.893,84.619 "/>
            </g>
          </svg>
          <img class="map" src="<?php echo $ptb_url; ?>/map.jpg" />
        </div>
      </div>
    </div>
  </div>

  <div id="story-container">
    <?php while( have_posts() ) : the_post(); ?>
    <div class="ptb-header">
      <span class="date"><?php the_time('F j, Y'); ?></span>
      <h1><?php the_title(); ?></h1>
      <h3><?php echo get_post_meta(get_the_ID(), 'author_credit', true); ?></h3>
    </div>
    <div class="rule"></div>
    <div class="main-content">
      <?php the_content(); ?>
      <div class="social">
        <div class="facebook">
          <div class="fb-like" data-width="100" data-layout="button_count" data-action="recommend" data-show-faces="true" data-share="true"></div>
        </div>
        <div class="twitter">
          <a href="https://twitter.com/share" class="twitter-share-button" data-via="petersiemens">Tweet</a>
          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>
      </div>
    </div>
    <?php endwhile; //end of loop ?>
  </div>

</div>
<div class="bar bottom">
  <div class="ptb-container">
    <div class="inner">
      <span>Produced by Peter Siemens</span>
    </div>
  </div>
</div>
</div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=294908990714006&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript" src="<?php echo $ptb_url; ?>/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo $ptb_url; ?>/js/_dependent/greensock/TweenMax.min.js"></script>
<script type="text/javascript" src="<?php echo $ptb_url; ?>/js/jquery.scrollmagic.min.js"></script>
<script src="<?php echo $ptb_url; ?>/js/d3.v3.min.js"></script>
<script src="<?php echo $ptb_url; ?>/js/ptb.js"></script>
<script type="text/javascript">

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-2313592-2', 'ubyssey.ca');
    ga('send', 'pageview');
    
</script>
</body>
</html>