
$(function(){
	fullHeight('.header-ams');

	var curTime = new Date().getTime();
	var startTime = new Date("March 9, 2015 00:00:00").getTime();

	console.log(curTime);
	console.log(startTime);

	var countdownTime = parseInt((startTime - curTime) / 1000);

	console.log(countdownTime);

	var clock = $('.countdown').FlipClock({});
	clock.setTime(countdownTime);
	clock.setCountdown(true);

	$("a.continue").click(function(e) {
		e.preventDefault();
	    $('html, body').animate({
	        scrollTop: $(".l-content").offset().top
	    }, 500);
	});

});

function fullHeight(element){
	var windowH = $(window).height();
	var item = $(element);
	var padding = parseInt(item.css('padding-top')) + parseInt(item.css('padding-bottom'));
	item.css({'height':($(window).height() - padding)+'px'});
}