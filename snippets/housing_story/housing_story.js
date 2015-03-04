var zone_data = [];

var zones_commute = {
	'v6t': 5,
	'v6r': 10,
	'v6k': 25,
	'v6s': 20,
	'v6l': 25,
	'v6n': 20,
	'v6m': 30,
	'v6p': 40,
	'v6j': 25,
	'v6h': 30,
	'v5z': 35,
	'v5y': 40,
	'v5x': 45,
	'v5w': 35,
	'v5v': 35,
	'v5t': 35,
	'v6a': 50,
	'v5l': 60,
	'v5n': 50,
	'v5p': 45,
	'v5k': 65,
	'v5m': 60,
	'v5r': 60,
	'v5s': 60,
	'v5c': 70,
	'v5g': 80,
	'v5h': 80,
	'v5j': 80,
	'downtown': 35
}

var school_data = [];
var cur_school_type = 'dorm';
var cur_school_sort = 'before';
cur_map2_type = "ub_vs_ubc";

$(function() {

	$.getJSON( dataurl + '/data.json', function( data ) {
	  zone_data = data;
	  updateMap1('population');
	});

	$.getJSON( dataurl + '/schools.json', function( data ) {
	  school_data = data;
	  drawSchoolData(cur_school_type, cur_school_sort);
	});

	$(".map1 rect, .map1 polygon, .map1 path").mousemove(function(e){
		$("#tooltip").show();
		$("#tooltip").html($(this).data("value"));
		$("#tooltip").css({
	       left:  e.pageX - ($("#tooltip").width() / 2),
	       top:   e.pageY + 25
	    });
	});

	$(".map1 rect, .map1 polygon, .map1 path").mouseleave(function(e){
		$("#tooltip").hide();
	});

	$('.school-toggle').click(function(e){
		e.preventDefault();
		$(this).parent().find('.school-toggle').removeClass('active');
		$(this).addClass('active');
		var type = $(this).data('type');
		if (type == 'before' || type == 'after'){
			cur_school_sort = type;
			drawSchoolData(cur_school_type, cur_school_sort);
		} else {
			cur_school_type = type;
			drawSchoolData(cur_school_type, cur_school_sort);
		}
	});

	// Map 2

	genMap2Data(cur_map2_type);

	$(document).on('mousemove', '#schools-chart .bar', function(e){
		$("#tooltip").show();

		var school = school_data[cur_school_sort][$(this).parent().data("school")];

		var html = 
			school.name + "<br/>" +
			"<strong>Dorm:</strong> " + schoolFormat(school.dorm, 'dorm') + "<br/>" +
			"<strong>Apartment:</strong> " + schoolFormat(school.apartment, 'apartment') + "<br/>" +
			"<strong>Suite:</strong> " + schoolFormat(school.suite, 'suite') + "<br/>" +
			"<strong>% in residence:</strong> " + schoolFormat(school.percent, 'percent') + "<br/>";

		$("#tooltip").html(html);
		$("#tooltip").css({
	       left:  e.pageX - ($("#tooltip").width() / 2),
	       top:   e.pageY + 25
		});
	});

	$(document).on('mouseleave', '#schools-chart .bar', function(e){
		$("#tooltip").hide();
	});

	$( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) );

	$( "#commute-slider" ).slider({
	  value:1,
	  min: 1,
	  max: 90,
	  step: 1,
	  slide: function( event, ui ) {
	    var amount = ui.value;
	    $("#cur-slider-value").html(amount);
	    updateCommuteMap(amount);
	  }
	});
});

function schoolFormat(value, format) {
	if(value){
		if(format == 'dorm' || format == 'apartment' || format == 'suite')
			return "$" + parseInt(value);
		else
			return parseInt(value) + "%";
	} else {
		return "no data";
	}
}

function sortByDorm(a,b) {
  if (a.dorm < b.dorm)
     return -1;
  if (a.dorm > b.dorm)
    return 1;
  return 0;
}

function sortByApart(a,b) {
  if (a.apartment < b.apartment)
     return -1;
  if (a.apartment > b.apartment)
    return 1;
  return 0;
}

function sortBySuite(a,b) {
  if (a.suite < b.suite)
     return -1;
  if (a.suite > b.suite)
    return 1;
  return 0;
}

function sortByPer(a,b) {
  if (a.percent < b.percent)
     return -1;
  if (a.percent > b.percent)
    return 1;
  return 0;
}

var max_schools = {
	'dorm': 1078,
	'apartment': 1048,
	'suite': 1167,
	'percent': 23
}

function drawSchoolData(type, sort){
	$('#schools-chart').html("");

	if(type == 'dorm')
		school_data[sort].sort(sortByDorm);
	if(type == 'apartment')
		school_data[sort].sort(sortByApart);
	if(type == 'suite')
		school_data[sort].sort(sortBySuite);
	if(type == 'percent')
		school_data[sort].sort(sortByPer);

	var scale = chroma.scale(['rgb(240,249,232)','rgb(204,235,197)','rgb(168,221,181)','rgb(123,204,196)','rgb(67,162,202)','rgb(8,104,172)']);
	$.each(school_data[sort], function( index, value) {
		var school = $('<div id="school-'+value.name+'" class="school"><div class="bar"></div><div class="label-con"><div class="label"></div></div></div>');
		school.data('school', index);
		var bar = school.find('.bar');
		var label = school.find('.label');
		label.html(value.name);
		bar.html(schoolFormat(value[type], type));
		if(!value[type]){
			label.addClass('inactive');
		}
		var weight = value[type] / max_schools[type];
		if(value.name == "UBC"){
			var color = "red";
		} else {
			var color = scale(weight).hex();
		}
		bar.css('height',  weight * 220);
		bar.css('background-color', color);
		$('#schools-chart').append(school);
	});
}

var commute_zones = [];

function updateCommuteMap(amount) {
	$.each(zones_commute, function( index, value ) {
		if(value <= amount){
			addCommuteZone(index);
		} else {
			removeCommuteZone(index);
		}

		var total = 0;
		$.each(commute_zones, function( index, value ) {	
			total += zone_data['population']['values'][value]['raw'];
		});

		var percent = parseInt((total / zone_data['total_pop']) * 100);

		$("#cur-percentage").html(percent);

	});
}

var colors = {
	'population': ['rgb(253,141,60)','rgb(189,0,38)'],
	'cost': ['rgb(65,182,196)','rgb(37,52,148)'],
	'commute': ['rgb(173,221,142)','rgb(49,163,84)'],
	'roommates': ['rgb(250,159,181)','rgb(197,27,138)'],
}


function addCommuteZone(zone) {
	var highlighted = $("#zone-"+zone).data('highlighted');
	if(!highlighted){
		$("#zone-"+zone).css('fill', colors['commute'][1]);
		$("#zone-"+zone).css('stroke', colors['commute'][1]);
		$("#zone-"+zone).data('highlighted', 1);
		commute_zones.push(zone);
	}
}

function removeCommuteZone(zone) {
	var highlighted = $("#zone-"+zone).data('highlighted');
	if(highlighted){
		$("#zone-"+zone).css('fill', colors['commute'][0]);
		$("#zone-"+zone).css('stroke', colors['commute'][0]);
		$("#zone-"+zone).data('highlighted', 0);
		//remove from array
		var index = commute_zones.indexOf(zone);
		if (index > -1) {
		    commute_zones.splice(index, 1);
		}
	}
}

var cur_type = 'population';

$(".toggle-commute").click(function(e){

	e.preventDefault();
	$(this).parent().parent().find('li').removeClass('active');
	$(this).parent().addClass('active');
	$('.legend').hide();
	$('.commute-info').show();
	$('#commute-slider').slider('value',1);
	$("#cur-slider-value").html(1);
	$("#cur-percentage").html(0);
	updateCommuteMap(1);
	cur_type = 'commute';
	$('.map1 rect, .map1 polygon, .map1 path').css('fill', colors['commute'][0]);
	$('.map1 rect, .map1 polygon, .map1 path').css('stroke', colors['commute'][0]);

	$.each(zones_commute, function( index, value ) {
		var display_string = "Commute time: " + value + " minutes";
		$("#zone-"+index).data('value', display_string);
	});

});

function updateMap1(type) {
	cur_type = type;

	$('.legend').show();
	$('.legend .low .block').css('background-color', colors[type][0]);
	$('.legend .high .block').css('background-color', colors[type][1]);

	$('.legend .low span').html(zone_data[type]['legend']['low']);
	$('.legend .high span').html(zone_data[type]['legend']['high']);

	var i=1;

	var scale = chroma.scale(colors[type]);

	$.each(zone_data[type]['values'], function( index, value ) {

		var weight = value['weight'];
		var display_value = value['display_value'];

		var display_string = zone_data[type]['display_label'] + ": " + display_value;

		$("#zone-"+index).data('value', display_string);

		var color = scale(0).hex();

		$('.map1 rect, .map1 polygon, .map1 path').css('fill', color);
		$('.map1 rect, .map1 polygon, .map1 path').css('stroke', color);

		var parsed = scale(weight).hex();

		setTimeout(function() { 
			if(cur_type == type){
				$("#zone-"+index).css('fill', parsed);
				$("#zone-"+index).css('stroke', parsed);
			}
	    }, i * 25); 
		i++;
	});
}

$(".toggle-heat-map").click(function(e){
	e.preventDefault();
	$('.commute-info').hide();
	var type = $(this).data('type');
	$(this).parent().parent().find('li').removeClass('active');
	$(this).parent().addClass('active');
	updateMap1(type);
	
})

function fillPopulation(index, value, type, i) {
	var color = 125 - ((value / max_values[type]) * 255);
	color = parseInt(color);
	setTimeout(function() { 
        $("#zone-"+index).css('fill', 'rgb(255,'+color+','+color+')');
		$("#zone-"+index).css('stroke', 'rgb(255,'+color+','+color+')');
    }, i * 25); 
}

function fillCost(index, value, type, i) {
	var color = 200 - ((value / max_values[type]) * 255);
	color = parseInt(color);
	setTimeout(function() { 
        $("#zone-"+index).css('fill', 'rgb('+color+',255,'+color+')');
		$("#zone-"+index).css('stroke', 'rgb('+color+',255,'+color+')');
    }, i * 25); 
}

zones = [
	{
		name: 'West of Arbutus',
		ub_avg: 728,
		ubc_avg: 823,
		ub_per: 58,
		ubc_per: 57,
		avg_roommates: 2
	},
	{
		name: 'Arbutus to Cambie',
		ub_avg: 724,
		ubc_avg: 750,
		ub_per: 16,
		ubc_per: 16,
		avg_roommates: 2
	},
	{
		name: 'Cambie to Commercial',
		ub_avg: 705,
		ubc_avg: 757,
		ub_per: 16,
		ubc_per: 19,
		avg_roommates: 1
	},
	{
		name: 'East of Commercial',
		ub_avg: 644,
		ubc_avg: 682,
		ub_per: 9,
		ubc_per: 7,
		avg_roommates: 1
	}
]

zones_roommates = [
	{
		'avg': 695,
		'per': 50,
		'room': 2,
		'apartment': 30,
		'house': 70,
	},
	{
		'avg': 653,
		'per': 15,
		'room': 2,
		'apartment': 51,
		'house': 49
	},
	{
		'avg': 673,
		'per': 14,
		'room': 1,
		'apartment': 40,
		'house': 60
	},
	{
		'avg': 613,
		'per': 8,
		'room': 1,
		'apartment': 47,
		'house': 53
	}
]

zones_alone = [
	{
		'avg': 971,
		'per': 6,
		'apartment': 70,
		'house': 30,
	},
	{
		'avg': 1175,
		'per': 2,
		'apartment': 89,
		'house': 11,
	},
	{
		'avg': 916,
		'per': 2,
		'apartment': 72,
		'house': 28,
	},
	{
		'avg': 851,
		'per': 2,
		'apartment': 56,
		'house': 44,
	}
]

active_zones = []

function genMap2Data(type){

	$('.zone-data').hide();
	$('.zone-data.'+type).show();

	if(type == 'ub_vs_ubc'){
		genType1();
	} else if(type == 'all'){
		genType2();
	} else if(type == 'roommates'){
		genType3();
	} else if(type == 'alone'){
		genType4();
	}
}

function genType1(){

	if(active_zones.length > 0){

		var ub_avg_total = 0;
		var ubc_avg_total = 0;
		var ub_per = 0;
		var ubc_per = 0;
		var n = 0;

		$.each(active_zones, function( index, value ) {
			var cur_zone = zones[value - 1];
			ub_avg_total = ub_avg_total + cur_zone.ub_avg;
			ubc_avg_total = ubc_avg_total + cur_zone.ubc_avg;
			ub_per = ub_per + cur_zone.ub_per;
			ubc_per = ubc_per + cur_zone.ubc_per;
			n = n + 1;
		});

		var ub_avg = "$" + parseInt(ub_avg_total / n);
		var ubc_avg = "$" + parseInt(ubc_avg_total / n);
		if(ub_per == 99){
			ub_per = 100;
		}
		if(ubc_per == 99){
			ubc_per = 100;
		}
		ub_per = ub_per + "%";
		ubc_per = ubc_per + "%";
	} else {
		var ub_avg = "--";
		var ubc_avg = "--";
		var ub_per = "--";
		var ubc_per = "--";
	}
	
	$('.ub_avg').html(ub_avg);
	$('.ubc_avg').html(ubc_avg)
	$('.ub_per').html(ub_per)
	$('.ubc_per').html(ubc_per)
}

function genType2(){

	if(active_zones.length > 0){

		var ub_avg_total = 0;
		var ub_per = 0;
		var ubc_per = 0;
		var rooommmates_total = 0;
		var n = 0;

		$.each(active_zones, function( index, value ) {
			var cur_zone = zones[value - 1];
			ub_avg_total = ub_avg_total + cur_zone.ub_avg;
			rooommmates_total = rooommmates_total + cur_zone.avg_roommates;
			ub_per = ub_per + cur_zone.ub_per;
			n = n + 1;
		});

		var ub_avg = "$" + parseInt(ub_avg_total / n);
		var avg_roommates = parseInt(rooommmates_total / n);
		if(ub_per == 99){
			ub_per = 100;
		}
		ub_per = ub_per + "%";
	} else {
		var ub_avg = "--";
		var ub_per = "--";
		var avg_roommates = "--";
	}
	
	$('.all_avg').html(ub_avg);
	$('.all_per').html(ub_per);
	$('.all_roommates').html(avg_roommates);
}

function genType3(){

	if(active_zones.length > 0){

		var ub_avg_total = 0;
		var ub_per = 0;
		var ubc_per = 0;
		var house_total = 0;
		var apartment_total = 0;
		var rooommmates_total = 0;
		var n = 0;

		$.each(active_zones, function( index, value ) {
			var cur_zone = zones_roommates[value - 1];
			ub_avg_total = ub_avg_total + cur_zone.avg;
			house_total = house_total + cur_zone.house;
			apartment_total = apartment_total + cur_zone.apartment;
			rooommmates_total = rooommmates_total + cur_zone.room;
			ub_per = ub_per + cur_zone.per;
			n = n + 1;
		});

		var ub_avg = "$" + parseInt(ub_avg_total / n);
		var avg_house = parseInt(house_total / n) + "%";
		var avg_apartment = parseInt(apartment_total / n) + "%";
		var avg_roommates = parseInt(rooommmates_total / n);
		if(ub_per == 99){
			ub_per = 100;
		}
		ub_per = ub_per + "%";
	} else {
		var ub_avg = "--";
		var ub_per = "--";
		var avg_house = "--";
		var avg_apartment = "--";
		var avg_roommates = "--";
	}
	
	$('.room_avg').html(ub_avg);
	$('.room_per').html(ub_per);
	$('.room_room').html(avg_roommates);
	$('.room_house').html(avg_house);
	$('.room_apartment').html(avg_apartment);
}

function genType4(){

	if(active_zones.length > 0){

		var ub_avg_total = 0;
		var ub_per = 0;
		var ubc_per = 0;
		var house_total = 0;
		var apartment_total = 0;
		var n = 0;

		$.each(active_zones, function( index, value ) {
			var cur_zone = zones_alone[value - 1];
			ub_avg_total = ub_avg_total + cur_zone.avg;
			house_total = house_total + cur_zone.house;
			apartment_total = apartment_total + cur_zone.apartment;
			ub_per = ub_per + cur_zone.per;
			n = n + 1;
		});

		var ub_avg = "$" + parseInt(ub_avg_total / n);
		var avg_house = parseInt(house_total / n) + "%";
		var avg_apartment = parseInt(apartment_total / n) + "%";
		if(ub_per == 99){
			ub_per = 100;
		}
		ub_per = ub_per + "%";
	} else {
		var ub_avg = "--";
		var ub_per = "--";
		var avg_house = "--";
		var avg_apartment = "--";
	}
	
	$('.alone_avg').html(ub_avg);
	$('.alone_per').html(ub_per);
	$('.alone_house').html(avg_house);
	$('.alone_apartment').html(avg_apartment);
}


$('.toggle-zone-map').click(function(e){
	e.preventDefault();
	cur_map2_type = $(this).data('type');
	$(this).parent().parent().find('li').removeClass('active');
	$(this).parent().addClass('active');
	genMap2Data(cur_map2_type);
});

$('path.clickable').click(function(e){

	var active = $(this).data('active');
	var zone = $(this).data('zone');
	if(active){
		$(this).attr("class", "clickable");
		$(this).data('active', 0);
		var index = active_zones.indexOf(zone);
		if (index > -1) {
		    active_zones.splice(index, 1);
		}
	} else {
		$(this).attr("class", "clickable active");
		$(this).data('active', 1);
		active_zones.push(zone);
	}

	genMap2Data(cur_map2_type);

});