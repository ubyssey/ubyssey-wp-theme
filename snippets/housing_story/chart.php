<div class="map-container">
	<h2 class="diagram-title">Where do we stand?</h2>
	<p class="diagram-description">This chart shows how UBC's housing costs compare to other major universities across Canada – both before and after the 20 per cent rent increase. Click the boxes under the graph to show how the costs of different types of housing stack up. When universities did not have comparable types of housing, no data is displayed.</p>
	<div id="schools-chart">
	</div>
	<div class="school-controls">
	<div class="left">
		<a href="#" class="school-toggle active" data-type="dorm">Dorm</a><a href="#" class="school-toggle" data-type="apartment">Apartment</a><a href="#" class="school-toggle" data-type="suite">Suite</a><a href="#" class="school-toggle" data-type="percent">% of students in residence</a>
	</div>
	<div class="right">
		<a href="#" class="school-toggle active" data-type="before">Before rent increase</a><a href="#" class="school-toggle" data-type="after">After rent increase</a>
	</div>
	</div>
</div>

<div id="tooltip"></div>

<script>var dataurl = '<?php bloginfo('template_url'); ?>/snippets/housing_story/';</script>

<?php
//wp_enqueue_script( 'jquery-ui', 'https://code.jquery.com/ui/1.11.2/jquery-ui.min.js' );
wp_enqueue_script( 'chroma', get_template_directory_uri() . '/snippets/housing_story/chroma.min.js' );
wp_enqueue_script( 'housing_story', get_template_directory_uri() . '/snippets/housing_story/housing_story.js' );

?>