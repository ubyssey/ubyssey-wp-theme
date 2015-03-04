var ptb = {
	v: {
		mapHeight: 0,
	    mapoffset: null,
	    scrollspeed: 500,
	    callouts: [ 1, 2, 3, 4, 5, 6, 7, 8, 9]
	},
	load: function() {
		ptb.v.mapHeight = $('img.map').height();
		ptb.callouts = d3.select("#callouts");
		ptb.update.callouts(ptb.v.callouts);
		ptb.setup.triggers();
		ptb.setup.callouts();
		ptb.listen.scroll();
	},
	setup: {
		triggers: function() {
			ptb.helpers.getTriggers('.ptb-trigger', ['top', 'left', 'rot']);
		},
		callouts: function(){
			controller = new ScrollMagic();

			$.each( ptb.v.callouts, function( index, label ) {
				id = index + 1;
				var selector = ".callout-"+id,
					tween = new TimelineMax()
						.add(TweenMax.to(selector, 0.75, { opacity: 1}))
						.add(TweenMax.to(selector, 0.25, { opacity: 0}));
					scene = new ScrollScene({triggerElement: "#image-"+id,  duration: 800})
						.offset(-150)
						.addTo(controller)
						.setTween(tween);
			});
		}
	},
	map: { 
		top: d3.scale.linear(),
		left: d3.scale.linear(),
		rot: d3.scale.linear(),
		scale: d3.scale.linear(),
		//opacity: d3.scale.linear()
	},
	animation: {
		triggers: {
			top: {
				dom: [0],
				rng: [0]
			},
			left: {
				dom: [0],
				rng: [0]
			},
			rot: {
				dom: [0],
				rng: [0]
			},
			opacity: {
				dom: [0],
				rng: [0]
			}
		},
	},
	helpers: {
		next: {
			top: function(pos){
				var mH = $('img.map').height();
				return pos / mH;
			},
			left: function(pos){
				var mW = $('img.map').width();
				return pos / mW;
			},
			rot: function(deg){
				return deg / 360;
			},
			opacity: function(val){
				return val / 1;
			}
		},
		point: {
			x: function(d){
				var point = $("#point-"+d);
    			var r = point.attr('r');
    			return point.offset().left - $("#tolkein-map").offset().left + parseInt(r);
			},
			y: function(d){
				var point = $("#point-"+d);
    			var r = point.attr('r');
    			return point.offset().top - $(document).scrollTop() + parseInt(r);
			},
			mid: function(d){
				var image = $('#image-'+d);
    			var img_top = image.offset().top;
    			return img_top - $(window).scrollTop() + image.height() / 2;
			}
		},
		getTriggers: function(selector, actions) {

			var curOffset = 0;

			var base = {
				top: 0.05,
				left: 0,
				rot: 0,
				opacity: 0,
			}
			
			var cur = {
				top: base.top,
				left: 0,
				rot: 0,
				opacity: 0,
			}

			$(selector).each( function(index, element){
				var data = $(this).data();
				var dur = $(this).data('dur');

				var offset = ptb.helpers.offset(this);
				var nextOffset = offset + ptb.helpers.nextOffset(dur);

				$.each(actions, function( index, type ){
					if(type in data){
						var value = data[type];
						var next = cur[type] + ptb.helpers.next[type](value);

						ptb.animation.triggers[type].dom.push(offset);
						ptb.animation.triggers[type].dom.push(nextOffset);
						ptb.animation.triggers[type].rng.push(cur[type]);
						ptb.animation.triggers[type].rng.push(next);

						cur[type] = next + base[type]
					}
				});
			
				curOffset = offset;

 			});

			ptb.animation.triggers.top.dom.push(1);
			ptb.animation.triggers.top.rng.push(cur.top);

			ptb.animation.triggers.left.dom.push(1);
			ptb.animation.triggers.left.rng.push(cur.left);

			ptb.animation.triggers.rot.dom.push(1);
			ptb.animation.triggers.rot.rng.push(cur.rot);

		},
		offset: function(element){
			var extra = 0
			if($(element).data('offset'))
				extra = $(element).data('offset');

			var tY = $(element).offset().top + extra;
		        dH = $(document).height();
		    return tY/dH;
		},
		nextOffset: function(dur){
			var dH = $(document).height();
			return dur / dH;
		},
		nextTop: function(pos){
			var mH = $('img.map').height();
			return pos / mH;
		}
	},
	listen: {
	    scroll: function() {
	    	document.addEventListener("scroll", ptb.interaction.scroll, false);
	    }
	},
	update: {
		callouts: function(data) {
			// Join new data with old elements, if any.
		    var lines = ptb.callouts.selectAll("line")
		        .data(data);

		    // UPDATE
		    // Update old elements as needed.
		    lines.attr("y1", ptb.helpers.point.mid)
		      .attr("x2", ptb.helpers.point.x)
		      .attr("y2", ptb.helpers.point.y);

		    // ENTER
		    // Create new elements as needed.
		    lines.enter().append("line")
		      .attr("class", function(d){ return "callout callout-"+(d); })
		      .attr("x1", 140)
		      .attr("y1", ptb.helpers.point.mid)
		      .attr("x2", ptb.helpers.point.x)
		      .attr("y2", ptb.helpers.point.y)
		      .attr("stroke-width", 1)
		      .attr("stroke", "black");

		    // EXIT
		    // Remove old elements as needed.
		    lines.exit()
		        .remove();
		}
	},
	interaction: {
		scroll: function() {

			ptb.update.callouts(ptb.v.callouts);

			var yP = $(document).scrollTop(),
		        dH = $(document).height();
		    // Rotational stuff
		    //var 
		    // All animations
		    var start = 0;

		    // translates document locations to map offsets, scaled differently depending on position
		    // domain defines breaks as a percentage of document height
		    // while range defines corresponding map locations

		    //ptb.map.pos.domain(anim.pos.dom).range(anim.pos.rng).clamp(true)
		    ptb.map.top.domain(ptb.animation.triggers.top.dom).range(ptb.animation.triggers.top.rng)
		    ptb.map.left.domain(ptb.animation.triggers.left.dom).range(ptb.animation.triggers.left.rng)
		    ptb.map.rot.domain(ptb.animation.triggers.rot.dom).range(ptb.animation.triggers.rot.rng)

		    //ptb.map.opacity.domain(ptb.animation.triggers.opacity.dom).range(ptb.animation.triggers.opacity.rng)

		    var mapHeight = $('img.map').height();
		    var yOff = -mapHeight * ptb.map.top(yP/dH);

		    var mapWidth = $('img.map').width();
		    var xOff = mapWidth * ptb.map.left(yP/dH);

		    var deg = 360 * ptb.map.rot(yP/dH);

		    //var opacity = 1 * ptb.map.opacity(yP/dH);

		    var offsetter = d3.select("#map-container")
		    offsetter.style('top',yOff+'px')
		    offsetter.style('left',xOff+'px')
		    offsetter.style('transform', 'rotate('+deg+'deg)')
		    offsetter.style('-ms-transform', 'rotate('+deg+'deg)')
		    offsetter.style('-webkit-transform', 'rotate('+deg+'deg)')

		    //var callouts = d3.selectAll(".callout")
		    //callouts.style('opacity',opacity);
		    
		}
	}
}

$(function(){
	if($(window).width() > 768){
		$( window ).load( function(){
			$('.ptb-loader').hide();
			$('#ptb-main').show();
			ptb.load();
		});
	} else {
		$('.ptb-loader').hide();
		$('#ptb-main').show();
	}
});


