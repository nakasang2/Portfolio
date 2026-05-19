<?php
/**
 * Created by Clapat.
 * Date: 09/04/19
 * Time: 7:26 AM
 */

if ( ! function_exists( 'munio_load_scripts' ) ){

    function munio_load_scripts() {

        // Register css files
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );

		wp_enqueue_style( 'munio-showcase', get_template_directory_uri() . '/css/showcase.css' );
		
        wp_enqueue_style( 'munio-portfolio', get_template_directory_uri() . '/css/portfolio.css' );
		
		wp_enqueue_style( 'munio-blog', get_template_directory_uri() . '/css/blog.css' );

		wp_enqueue_style( 'munio-shortcodes', get_template_directory_uri() . '/css/shortcodes.css' );

		wp_enqueue_style( 'munio-assets', get_template_directory_uri() . '/css/assets.css' );
		
		wp_enqueue_style( 'munio-theme', get_stylesheet_uri(), array('munio-showcase', 'munio-portfolio', 'munio-blog', 'munio-shortcodes', 'munio-assets') );

		// enqueue standard font style
		$munio_main_font_url  = '';
		$munio_secondary_font_url = '';
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'munio') ) {
			$munio_main_font_url = add_query_arg( 'family', urlencode( 'Poppins:300,400,600,700' ), "//fonts.googleapis.com/css" );
			$munio_secondary_font_url = add_query_arg( 'family', urlencode( 'Oswald:400,700' ), "//fonts.googleapis.com/css" );
		}
		wp_enqueue_style( 'munio-main-font', $munio_main_font_url, array(), '1.0.0' );
		wp_enqueue_style( 'munio-secondary-font', $munio_secondary_font_url, array(), '1.0.0' );

        // enqueue scripts
        if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		// Register scripts
        wp_enqueue_script(
            'modernizr',
            get_template_directory_uri() . '/js/modernizr.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
          'scrollmagic',
          get_template_directory_uri() . '/js/scrollmagic.min.js',
          array('jquery'),
          false,
          true
        );
		
		wp_enqueue_script(
          'animation-gsap',
          get_template_directory_uri() . '/js/animation.gsap.min.js',
          array('jquery'),
          false,
          true
        );
		
		wp_enqueue_script(
            'jquery-flexnav',
            get_template_directory_uri() . '/js/jquery.flexnav.min.js',
            array('jquery'),
            false,
            true
        );

		wp_enqueue_script(
            'jquery-waitforimages',
            get_template_directory_uri() . '/js/jquery.waitforimages.js',
            array('jquery'),
            false,
            true
        );

		wp_enqueue_script(
            'appear',
            get_template_directory_uri() . '/js/appear.js',
            array('jquery'),
            false,
            true
        );

		wp_enqueue_script(
            'owl-carousel',
            get_template_directory_uri() . '/js/owl.carousel.min.js',
            array('jquery'),
            false,
            true
        );

		wp_enqueue_script(
            'jquery-magnific-popup',
            get_template_directory_uri() . '/js/jquery.magnific-popup.min.js',
            array('jquery'),
            false,
            true
        );

		wp_enqueue_script(
            'jquery-justifiedgallery',
            get_template_directory_uri() . '/js/jquery.justifiedGallery.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'isotope-pkgd',
            get_template_directory_uri() . '/js/isotope.pkgd.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'packery-mode-pkd',
            get_template_directory_uri() . '/js/packery-mode.pkgd.js',
            array('jquery'),
            false,
            true
        );
		
		wp_enqueue_script(
            'fitthumbs',
            get_template_directory_uri() . '/js/fitthumbs.js',
            array('jquery'),
            false,
            true
        );
				
    	wp_enqueue_script(
          'jquery-scrollto',
          get_template_directory_uri() . '/js/jquery.scrollto.min.js',
          array('jquery'),
          false,
          true
        );

        wp_enqueue_script(
          'tweenmax',
          get_template_directory_uri() . '/js/tweenmax.min.js',
          array('jquery'),
          false,
          true
        );
		
		wp_enqueue_script(
          'wheel-indicator',
          get_template_directory_uri() . '/js/wheel-indicator.js',
          array('jquery'),
          false,
          true
        );
		
		wp_enqueue_script(
          'swiper',
          get_template_directory_uri() . '/js/swiper.min.js',
          array('jquery'),
          false,
          true
        );
		
		wp_enqueue_script(
          'smooth-scrollbar',
          get_template_directory_uri() . '/js/smooth-scrollbar.min.js',
          array('jquery'),
          false,
          true
        );
		
        wp_enqueue_script(
            'munio-scripts',
            get_template_directory_uri() . '/js/scripts.js',
            array('jquery'),
            false,
            true
        );
		
		wp_localize_script( 'munio-scripts',
                    'ClapatMunioThemeOptions',
                    array( "enable_ajax" 		=> munio_get_theme_options('clapat_munio_enable_ajax'),
							"enable_preloader" 	=> munio_get_theme_options('clapat_munio_enable_preloader') )
					);

		wp_localize_script( 'munio-scripts',
							'ClapatMapOptions',
							array(  "map_marker_image"  => esc_js( esc_url ( munio_get_theme_options("clapat_munio_map_marker") ) ),
									"map_address"       => munio_get_theme_options('clapat_munio_map_address'),
									"map_zoom"    		=> munio_get_theme_options('clapat_munio_map_zoom'),
									"marker_title"  	=> munio_get_theme_options('clapat_munio_map_company_name'),
									"marker_text"  		=> munio_get_theme_options('clapat_munio_map_company_info'),
									"map_type" 			=> munio_get_theme_options('clapat_munio_map_type'),
									"map_api_key"		=> munio_get_theme_options('clapat_munio_map_api_key') ) );
    }

}

add_action('wp_enqueue_scripts', 'munio_load_scripts');

if ( ! function_exists( 'munio_admin_load_scripts' ) ){

    function munio_admin_load_scripts() {
		
		// enqueue standard font style
		$munio_main_font_url  = '';
		$munio_secondary_font_url = '';
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'munio') ) {
			$munio_main_font_url = add_query_arg( 'family', urlencode( 'Poppins:300,400,600,700' ), "//fonts.googleapis.com/css" );
			$munio_secondary_font_url = add_query_arg( 'family', urlencode( 'Oswald:400,700' ), "//fonts.googleapis.com/css" );
		}
		wp_enqueue_style( 'munio-main-font', $munio_main_font_url, array(), '1.0.0' );
		wp_enqueue_style( 'munio-secondary-font', $munio_secondary_font_url, array(), '1.0.0' );
	}
}
add_action('admin_enqueue_scripts', 'munio_admin_load_scripts');