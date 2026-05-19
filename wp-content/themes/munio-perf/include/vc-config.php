<?php

if ( function_exists( 'vc_set_as_theme' ) ) {

	// settings
	vc_set_as_theme( true );
	vc_disable_frontend();
	vc_set_default_editor_post_types( array( 'page', 'munio_portfolio', 'post' ) );
	
	// Map Munio shortcodes
	require_once ( get_template_directory() . '/include/vc_map.php');
}
	
?>