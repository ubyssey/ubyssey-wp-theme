jQuery(document).ready(function($){
	var boards = {
		'2010' : [
			{ sport: 'Football', pre: 'Calgary', champ: 'Laval', icon: 'football' },
			{ sport: "Men's Soccer", pre: 'Laval', champ: 'York', icon: 'soccer' },
			{ sport: "Women's Soccer", pre: 'Trinity Western', champ: "Queen's", icon: 'soccer' },
			{ sport: "Men's Basketball", pre: 'Carleton', champ: 'Carleton', icon: 'basketball' },
			{ sport: "Women's Basketball", pre: 'Windsor', champ: 'Windsor', icon: 'basketball' },
			{ sport: "Men's Hockey", pre: 'Alberta', champ: 'UNB', icon: 'hockey' },
			{ sport: "Women's Hockey", pre: 'Alberta', champ: 'McGill', icon: 'hockey' },
			{ sport: "Men's Swimming", pre: 'Calgary', champ: 'Calgary', icon: 'swimming' },
			{ sport: "Women's Swimming", pre: 'Calgary', champ: 'Calgary', icon: 'swimming' },
			{ sport: "Men's Volleyball", pre: 'Alberta', champ: 'Trinity Western', icon: 'volleyball' },
			{ sport: "Women's Volleyball", pre: 'Laval', champ: 'UBC', icon: 'volleyball' },
			{ sport: "Women's Rugby", pre: 'Lethbridge', champ: 'StFX', icon: 'rugby' },
			],
		'2011' : [
			{ sport: 'Football', pre: 'Laval', champ: 'McMaster', icon: 'football' },
			{ sport: "Men's Soccer", pre: 'York', champ: 'Victoria', icon: 'soccer' },
			{ sport: "Women's Soccer", pre: "Queen's", champ: "Queen's", icon: 'soccer' },
			{ sport: "Men's Basketball", pre: 'Carleton', champ: 'Carleton', icon: 'basketball' },
			{ sport: "Women's Basketball", pre: 'Regina', champ: 'Windsor', icon: 'basketball' },
			{ sport: "Men's Hockey", pre: 'UNB', champ: 'McGill', icon: 'hockey' },
			{ sport: "Women's Hockey", pre: 'McGill', champ: 'Calgary', icon: 'hockey' },
			{ sport: "Men's Swimming", pre: 'Toronto', champ: 'UBC', icon: 'swimming' },
			{ sport: "Women's Swimming", pre: 'Calgary', champ: 'UBC', icon: 'swimming' },
			{ sport: "Men's Volleyball", pre: 'Tinity Western', champ: 'Trinity Western', icon: 'volleyball' },
			{ sport: "Women's Volleyball", pre: 'UBC', champ: 'UBC', icon: 'volleyball' },
			{ sport: "Women's Rugby", pre: 'StFX', champ: 'Guelph', icon: 'rugby' },
			],
		'2012' : [
			{ sport: 'Football', pre: 'McMaster', champ: 'Laval', icon: 'football' },
			{ sport: "Men's Soccer", pre: 'Victoria', champ: 'UBC', icon: 'soccer' },
			{ sport: "Women's Soccer", pre: "Queen's", champ: "Trinity Western", icon: 'soccer' },
			{ sport: "Men's Basketball", pre: 'Carleton', champ: 'Carleton', icon: 'basketball' },
			{ sport: "Women's Basketball", pre: 'Windsor', champ: 'Windsor', icon: 'basketball' },
			{ sport: "Men's Hockey", pre: 'UNB', champ: 'UNB', icon: 'hockey' },
			{ sport: "Women's Hockey", pre: 'Calgary', champ: 'Montreal', icon: 'hockey' },
			{ sport: "Men's Swimming", pre: 'Toronto', champ: 'Toronto', icon: 'swimming' },
			{ sport: "Women's Swimming", pre: 'Montreal', champ: 'UBC', icon: 'swimming' },
			{ sport: "Men's Volleyball", pre: 'Trinity Western', champ: 'Laval', icon: 'volleyball' },
			{ sport: "Women's Volleyball", pre: 'UBC', champ: 'UBC', icon: 'volleyball' },
			{ sport: "Women's Rugby", pre: 'StFX', champ: 'StFX', icon: 'rugby' },
			],
		'2013' : [
			{ sport: 'Football', pre: 'Laval', champ: 'Laval', icon: 'football' },
			{ sport: "Men's Soccer", pre: 'UBC', champ: 'UBC', icon: 'soccer' },
			{ sport: "Women's Soccer", pre: 'Trinity Western', champ: "Trinity Western", icon: 'soccer' },
			{ sport: "Men's Basketball", pre: 'Carleton', champ: 'Carleton', icon: 'basketball' },
			{ sport: "Women's Basketball", pre: 'Windsor', champ: 'Windsor', icon: 'basketball' },
			{ sport: "Men's Hockey", pre: 'Alberta', champ: 'Alberta', icon: 'hockey' },
			{ sport: "Women's Hockey", pre: 'McGill', champ: 'McGill', icon: 'hockey' },
			{ sport: "Men's Swimming", pre: 'Toronto', champ: 'Toronto', icon: 'swimming' },
			{ sport: "Women's Swimming", pre: 'UBC', champ: 'UBC', icon: 'swimming' },
			{ sport: "Men's Volleyball", pre: 'Alberta', champ: 'Alberta', icon: 'volleyball' },
			{ sport: "Women's Volleyball", pre: 'UBC', champ: 'Manitoba', icon: 'volleyball' },
			{ sport: "Women's Rugby", pre: 'StFX', champ: 'Alberta', icon: 'rugby' },
			],
	};

	$.each(boards, function( year, board ) {
		var n = 1;
		$.each(board, function( index, value ) {
			var card = '<div class="col"><div class="card-container"><div class="card"><div class="front color-' + n + '"><label><img src="http://ubyssey.ca/wp-content/themes/theme/snippets/card_icons/' + value.icon + '.png"/>' + value.sport + '</label><div class="con"><div class="inner">Preseason #1<h2>' + value.pre + '</h2></div></div></div><div class="back"><div class="con"><div class="inner">Champion<h2>' + value.champ + '</h2></div></div></div></div></div></div>';
			n = n + 1;
		  	$('#'+year).append(card);
		});
	});

	$('#2010').show();

	$('.year').click(function(e){
		e.preventDefault();
		$('.gameboard').hide();
		$('#full-stats').hide();
		$('.year').removeClass('active');
		$(this).addClass('active');
		var year = $(this).data('year');
		$('#'+year).show();
	});

	$(".card-container").click(function(e){
		$(this).flip();
	});
});