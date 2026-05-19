<?php

require_once ( get_template_directory() . '/include/defines.php' );

// Metaboxes
require_once ( get_template_directory() . '/include/metabox-config.php');

// Customizer options
require_once( get_template_directory() . '/include/admin-config.php' );

// Load the default options
require_once( get_template_directory() . '/include/default-theme-options.php' );

if( !function_exists('munio_get_theme_options') ){

	function munio_get_theme_options( $option_id ){

		global $munio_default_theme_options;
		
		$default_value = false;
		if ( isset( $munio_default_theme_options ) && isset( $munio_default_theme_options[$option_id] ) ){

			$default_value  = $munio_default_theme_options[$option_id];

		}

		return get_theme_mod( $option_id, $default_value );

	}
}

if( !function_exists('munio_get_post_meta') ){

	function munio_get_post_meta( $opt_name = "", $thePost = array(), $meta_key = "", $def_val = "" ) {

		if( class_exists('Clapat\Munio\Metaboxes\Meta_Boxes') ){
			
			return Clapat\Munio\Metaboxes\Meta_Boxes::get_metabox_value( $thePost, $meta_key );
		}
		
		return "";
	}
}

if( !function_exists('munio_get_current_query') ){

	function munio_get_current_query(){

		global $munio_posts_query;
		global $wp_query;
		if( $munio_posts_query == null ){
			return $wp_query;
		}
		else{
			return $munio_posts_query;
		}

	}
}

// Hero properties
require_once ( get_template_directory() . '/include/hero-properties.php');
if( !function_exists('munio_get_hero_properties') ){

	function munio_get_hero_properties( $post_type ){

		global $munio_hero_properties;
		if( !isset( $munio_hero_properties ) || ( $munio_hero_properties == null ) ){
			$munio_hero_properties = new MunioHeroProperties();
		}
		$munio_hero_properties->getProperties( $post_type );
		return $munio_hero_properties;
	}
}

// Portfolio Masonry images
if( !function_exists('munio_portfolio_images') ){

	function munio_portfolio_images( $portfolio_images_param = null ){

		global $munio_portfolio_images;
		if( isset( $portfolio_images_param ) && ( $portfolio_images_param != null ) ){
			
			$munio_portfolio_images = $portfolio_images_param;
		}
		
		return $munio_portfolio_images;
	}
}

// Portfolio Next Project Image
if( !function_exists('munio_portfolio_next_project_image') ){

	function munio_portfolio_next_project_image( $portfolio_image_param = null ){

		global $munio_portfolio_image_param;
		if( isset( $portfolio_image_param ) && ( $portfolio_image_param != null ) ){
			
			$munio_portfolio_image_param = $portfolio_image_param;
		}
		
		return $munio_portfolio_image_param;
	}
}

// Wraps each character of the hero title in <span> and each word with anonymous div
if( !function_exists('munio_span_wordwrap') ){
	
	function munio_span_wordwrap( $param_text_input ){
		
		if( empty( $param_text_input ) ){
			
			return '<span></span>';
		}
		
		$word_wrapped = "";
		
		$text_words = mb_split("\s", $param_text_input);
		foreach( $text_words as $text_word ){
		
			$word_wrapped .= "<div>";
			$mb_len = mb_strlen( wp_specialchars_decode($text_word) );
			for( $idx = 0; $idx < $mb_len; $idx++) 
			{
				$mb_character = mb_substr( $text_word, $idx, 1);
				$word_wrapped .= '<span>' . $mb_character . '</span>';
			}
			$word_wrapped .= "</div>";
		}
				
		return $word_wrapped;
		
	}
}
	
// Support for automatic plugin installation
require_once(  get_template_directory() . '/components/helper_classes/tgm-plugin-activation/class-tgm-plugin-activation.php');
require_once(  get_template_directory() . '/components/helper_classes/tgm-plugin-activation/required_plugins.php');

// Widgets
require_once(  get_template_directory() . '/components/widgets/widgets.php');

// Util functions
require_once ( get_template_directory() . '/include/util_functions.php');

// Add theme support
require_once ( get_template_directory() . '/include/theme-support-config.php');

// Theme setup
require_once ( get_template_directory() . '/include/setup-config.php');

// Enqueue scripts
require_once ( get_template_directory() . '/include/scripts-config.php');

// Hooks
require_once ( get_template_directory() . '/include/hooks-config.php');

// Blog comments and pagination
require_once ( get_template_directory() . '/include/blog-config.php');

// Visual Composer
if ( function_exists( 'vc_set_as_theme' ) ) {
	require_once ( get_template_directory() . '/include/vc-config.php');
}

// Editor styles
add_editor_style( 'style-editor.css' );
?>
