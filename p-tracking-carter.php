<?php
/**
 * Template Name: Natural Geographics - Tracking Carter
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />
<title>Tracking Carter - Natural Geographics</title>
<meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
<link rel="shortcut icon" href="//dotcom-media.nationalgeographic.com/static-media/homepage/images/favicon.ico" />
<script src='https://api.tiles.mapbox.com/mapbox.js/v2.1.6/mapbox.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox.js/v2.1.6/mapbox.css' rel='stylesheet' />
<script type="text/javascript" src="//use.typekit.net/qex0fvk.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<style>
  body { margin:0; padding:0; }
  #header {
    position: absolute; top: 0; height: 40px; width: 100%;
    background: black;
    padding: 5px 0;
    text-align: center;
  }
  #header img {
    position: absolute;
    height: 40px;
    width: auto;
    left: 20px;
  }
  #header p {
    margin: 0;
    color: white;
    height: 40px;
    line-height: 40px;
    font-family: "lft-etica", sans-serif;
    font-size: 13px;
  }
  #header strong {
    font-size: 18px;
    font-family: Georgia,serif;
    font-style: italic;  
    margin-right: 10px;
  }
  .share-button {
    position: absolute;
    top: 15px;
    right: 20px;
  }
  #map { position:absolute; top:50px; bottom:0; width:100%; }
  @media(max-width: 500px){
    #header p, .share-button {
      display: none;
    }
  }
</style>
<?php wp_head(); ?>
</head>
<body>
<style>
.popup {
  text-align:center;
  }
.popup .slideshow .image        { display:none; }
.popup .slideshow .image.active { display:block; }
.popup .slideshow img {
  width:100%;
  }
.popup .slideshow .caption {
  background:#eee;
  padding:10px;
  }
</style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=426310577435118&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script src='https://code.jquery.com/jquery-1.11.0.min.js'></script>
<div id='header'>
  <a href="http://issuu.com/ubyssey/docs/natural_geographics-web"><img src="http://ubyssey.ca/wp-content/themes/theme/custom/tracking-carter/natural_geographics.png"></img></a>
  <p><strong>Tracking Carter</strong><span> Keep up with the UBC coyote's whereabouts using data gathered from Instagram.</span></p>
  <div class="share-button"><div class="fb-share-button" data-href="http://ubyssey.ca/tracking-carter/" data-layout="button_count"></div></div>
</div>
<div id='map'></div>

<script>
L.mapbox.accessToken = 'pk.eyJ1IjoicHNpZW1lbnMiLCJhIjoiaVNqb1pwVSJ9.vWJSVxoxYDWJkKKHxyXtXw';
var map = L.mapbox.map('map', 'psiemens.lk4n1cbk');

var myLayer = L.mapbox.featureLayer().loadURL('http://ubyssey.ca/wp-content/themes/theme/custom/tracking-carter/geodata.json').addTo(map);

myLayer.on('layeradd', function(e) {
    var marker = e.layer;
    var feature = marker.feature;

    var slideshowContent = '<div class="image active">' +
                              '<img src="' + feature.properties.image[0] + '" />' +
                              '<div class="caption">' + feature.properties.image[1] + '</div>' +
                            '</div>';

    var popupContent =  '<div id="' + feature.properties.id + '" class="popup">' +
                            '<h2>' + feature.properties.date + '</h2>' +
                            '<div class="slideshow">' +
                                slideshowContent +
                            '</div>' +
                        '</div>';

    marker.bindPopup(popupContent,{
        closeButton: false,
        minWidth: 320
    });
});

$('#map').on('click', '.popup .cycle a', function() {
    var $slideshow = $('.slideshow'),
        $newSlide;

    $slideshow.find('.active').removeClass('active').hide();
    $newSlide.addClass('active').show();
    return false;
});

map.setView([49.2645, -123.2515], 16);
</script>
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