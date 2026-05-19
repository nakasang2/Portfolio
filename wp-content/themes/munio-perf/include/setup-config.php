<?php
/**
 * Created by Clapat.
 * Date: 04/02/19
 * Time: 6:21 AM
 */

// register navigation menus
if ( ! function_exists( 'munio_register_nav_menus' ) ){
	
	function munio_register_nav_menus() {
		
	  register_nav_menus(
		array(
		  'primary-menu' => esc_html__( 'Primary Menu', 'munio')
		)
	  );
	}
}
add_action( 'init', 'munio_register_nav_menus' );
 
// custom excerpt length
if( !function_exists('munio_custom_excerpt_length') ){

    function munio_custom_excerpt_length( $length ) {

        return intval( munio_get_theme_options( 'clapat_munio_blog_excerpt_length' ) );
    }
}

// theme setup
if ( ! function_exists( 'munio_theme_setup' ) ){

    function munio_theme_setup() {

        // Set content width
        if ( ! isset( $content_width ) ) $content_width = 1180;

        // add support for multiple languages
        load_theme_textdomain( 'munio', get_template_directory() . '/languages' );
			
	}

} // munio_theme_setup

/**
 * Tell WordPress to run munio_theme_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'munio_theme_setup' );