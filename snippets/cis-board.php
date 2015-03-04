<?php wp_enqueue_style( 'flipcard', get_bloginfo('template_url') . '/styles/flipcard.css' ); ?>
<?php wp_enqueue_script( 'flipcard', get_bloginfo('template_url') . '/js/flipcard.js' ); ?>
<?php wp_enqueue_script( 'flipboard', get_bloginfo('template_url') . '/js/flipboard.js' ); ?>

<div class="card-game hide-mobile">
	<div class="year-options">
		<a class="year active" href="#" data-year="2010">2010</a>
		<a class="year" href="#" data-year="2011">2011</a>
		<a class="year" href="#" data-year="2012">2012</a>
		<a class="year" href="#" data-year="2013">2013</a>
		<a class="year" href="#" data-year="full-stats">Full Stats</a>
	</div>

	<div class="gameboard" id="2010"></div>
	<div class="gameboard" id="2011"></div>
	<div class="gameboard" id="2012"></div>
	<div class="gameboard" id="2013"></div>
</div>