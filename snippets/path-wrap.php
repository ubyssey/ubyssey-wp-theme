<?php

?>
<style>


.fw_left {
	float: left;
	margin-left: -20%;
	width: 75%;
	shape-outside: url('<?php bloginfo( 'template_url' ); ?>/snippets/culture-costume/mask.png');
	shape-margin: 15px;
	shape-image-threshold: 0.5;
}

@media(max-width: 768px){
	.fw_left {
		display: none;
	}
}

</style>

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/shapes-polyfill.min.js"></script>
