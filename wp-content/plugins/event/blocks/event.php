<?php

add_action( 'init', function() {
	register_block_type( 'a8c/event', [
		'editor_script' => 'a8c-event',
		'style' => 'a8c-event',
		'editor_style' => 'a8c-event-editor',
	] );

	wp_set_script_translations( 'a8c-event', 'event' );
} );
