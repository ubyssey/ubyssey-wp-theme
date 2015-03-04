$(document).ready(function() {
  // to make select nav work
  $("select.show-mobile").bind( "change", function(event, ui) {
    window.location = $(this).find("option:selected").val();
  });

  if($('.full-height').is(':visible')){
    var windowHeight = $(window).height();
    $('.full-height').css('max-height', windowHeight);
  }

  if($('.cover').is(':visible')){
    var windowHeight = $(window).height();
    $('.cover').css('height', windowHeight - 40);
  }
  
  // continue reading for mobile ads
  $('.continue-reading a').click(function(e){
    e.preventDefault();
    var block = $(this).parent().parent();
    var cur_pos = block.offset().top;  // current y position on the page
    var offset = block.height();
    $("html, body").animate({ scrollTop: cur_pos+offset });
  });

  // to make front page tab switching work
  $(".section-feed .tab").hide();
  $(".section-feed .base").show();
  $(".tags a").click(function(e) {
    var theSection = $(this).parent().parent().attr("class");
    $("." + theSection + " .tab").hide();
    var theClass = $(this).attr("class");
    $(".section-feed ." + theClass).fadeIn(300);
    e.preventDefault();
  });

  // to make popular widget tabs work
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
  var windowWidth = $(window).width();
  var sliderHeight = 0;
  var slider = $(".featured-slider");
  if ( windowWidth > 1099 ) { sliderHeight = 328; }
  if ( windowWidth < 1100 && windowWidth > 850) { sliderHeight = windowWidth * 0.297702298; }
  if ( windowWidth < 851 ) { sliderHeight = windowWidth * 0.490543735; }
  slider.height( sliderHeight );
  $(".headlines").show();
  $(window).resize(function() {
    sliderHeight = $("#slide-1").height();
    slider.height( sliderHeight );
  });

  // fitvid - responsive videos
  // Target your .container, .wrapper, .post, etc.
  //$(".video").fitVids();
});
