<?php
/*
 * The search form template.
 *
 */
?>

<form class="clearfix" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<input type="text" value="" name="s" id="s" />
	<input type="image" src="<?php bloginfo( 'template_url' ); ?>/images/search.jpg" height="27" width="26" border="0" alt="Search"/>
</form>