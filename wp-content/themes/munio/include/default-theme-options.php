<?php

if( !isset( $munio_default_theme_options ) ){
	
	$munio_default_theme_options = array();

	$munio_default_theme_options['clapat_munio_enable_ajax'] = 0;
	$munio_default_theme_options['clapat_munio_enable_smooth_scrolling'] = 0;
	$munio_default_theme_options['clapat_munio_enable_preloader'] = 1;
	$munio_default_theme_options['clapat_munio_enable_fullscreen_menu'] = 0;
	$munio_default_theme_options['clapat_munio_enable_back_to_top'] = 1;
	$munio_default_theme_options['clapat_munio_back_to_top_caption'] = esc_html__( 'Back Top', 'munio' );
	$munio_default_theme_options['clapat_munio_menu_btn_caption'] = esc_html__( 'Menu', 'munio' );
	$munio_default_theme_options['clapat_munio_stretch_title'] = 0;
	$munio_default_theme_options['clapat_munio_default_page_bknd_type'] = 'light-content';
	$munio_default_theme_options['clapat_munio_enable_page_title_as_hero'] = 1;
	$munio_default_theme_options['clapat_munio_enable_magic_cursor'] = 1;
	$munio_default_theme_options['clapat_munio_logo'] = esc_url( get_template_directory_uri() . '/images/logo.png' );
	$munio_default_theme_options['clapat_munio_logo_light'] = esc_url( get_template_directory_uri() . '/images/logo-white.png' );
	$munio_default_theme_options['clapat_munio_footer_copyright'] = wp_kses_post( __('2019 Copyright <a target="_blank" href="https://www.clapat.com/themes/munio/">Munio Theme</a>.', 'munio') );
	$munio_default_theme_options['clapat_munio_footer_social_links_prefix'] = esc_html__( 'Follow Us', 'munio' );
	global $munio_social_links;
	$social_network_ids = array_keys( $munio_social_links );
	for( $idx = 1; $idx <= MUNIO_MAX_SOCIAL_LINKS; $idx++ ){

		$munio_default_theme_options['clapat_munio_footer_social_' . $idx] = 'Fb';
		$munio_default_theme_options['clapat_munio_footer_social_url_' . $idx] = '';
	}
	$munio_default_theme_options['clapat_munio_portfolio_custom_slug'] = '';
	$munio_default_theme_options['clapat_munio_showcase_all_caption'] = esc_html__('All Projects', 'munio');
	$munio_default_theme_options['clapat_munio_showcase_close_all_caption'] = esc_html__('Close', 'munio');
	$munio_default_theme_options['clapat_munio_portfolio_filter_all_caption'] = esc_html__('All', 'munio');
	$munio_default_theme_options['clapat_munio_portfolio_show_categories_caption'] = esc_html__('Categories', 'munio');
	$munio_default_theme_options['clapat_munio_portfolio_show_filters_hover_caption'] = esc_html__('Show', 'munio');
	$munio_default_theme_options['clapat_munio_portfolio_show_filters_caption'] = esc_html__('Filters', 'munio');
	$munio_default_theme_options['clapat_munio_portfolio_next_caption'] = esc_html__('Next Project', 'munio');
	$munio_default_theme_options['clapat_munio_portfolio_navigation_order'] = 'forward';
	$munio_default_theme_options['clapat_munio_blog_next_post_caption'] = esc_html__('Next', 'munio');
	$munio_default_theme_options['clapat_munio_blog_default_title'] = esc_html__('Blog', 'munio');
	$munio_default_theme_options['clapat_munio_map_address'] = esc_html__('775 New York Ave, Brooklyn, Kings, New York 11203', 'munio');
	$munio_default_theme_options['clapat_munio_map_marker'] = esc_url( get_template_directory_uri() . '/images/marker.png');
	$munio_default_theme_options['clapat_munio_map_zoom'] = 16;
	$munio_default_theme_options['clapat_munio_map_company_name'] = esc_html__('Munio', 'munio');
	$munio_default_theme_options['clapat_munio_map_company_info'] = esc_html__('Here we are. Come to drink a coffee!', 'munio');
	$munio_default_theme_options['clapat_munio_map_type'] = 'satellite';
	$munio_default_theme_options['clapat_munio_map_api_key'] = '';
	$munio_default_theme_options['clapat_munio_error_title'] = esc_html__('404', 'munio');
	$munio_default_theme_options['clapat_munio_error_info'] = esc_html__('The page you are looking for could not be found.', 'munio');
	$munio_default_theme_options['clapat_munio_error_back_button'] = esc_html__('Home Page', 'munio');
	$munio_default_theme_options['clapat_munio_error_back_button_hover_caption'] = esc_html__('Go Back', 'munio');
	$munio_default_theme_options['clapat_munio_error_back_button_url'] = esc_url( get_home_url() );
	$munio_default_theme_options['clapat_munio_error_page_bknd_type'] = 'light-content';
}

if( !class_exists('Clapat\Munio\Metaboxes\Meta_Boxes') ){
	
	$munio_default_meta_options = array (
									"munio-opt-page-bknd-color" =>"light-content", 
									"munio-opt-page-enable-hero" =>"", 
									"munio-opt-page-hero-caption-title" =>"", 
									"munio-opt-page-hero-caption-subtitle" =>"", 
									"munio-opt-page-enable-navigation" =>"", 
									"munio-opt-page-navigation-caption-title" =>"", 
									"munio-opt-page-navigation-next-url" =>"", 
									"munio-opt-page-navigation-next-title" =>"", 
									"munio-opt-page-navigation-next-subtitle" =>"", 
									"munio-opt-page-portfolio-mixed-items" =>"", 
									"munio-opt-page-portfolio-mixed-content-position" =>"1", 
									"munio-opt-page-showcase-filter-category" =>"", 
									"munio-opt-blog-bknd-color" =>"light-content", 
									"munio-opt-portfolio-bknd-color" =>"light-content", 
									"munio-opt-portfolio-showcase-include" =>"yes", 
									"munio-opt-portfolio-hero-img" => "", 
									"munio-opt-portfolio-video" =>"", 
									"munio-opt-portfolio-video-webm" =>"", 
									"munio-opt-portfolio-video-mp4" =>"", 
									"munio-opt-portfolio-hero-caption-title" =>"", 
									"munio-opt-portfolio-hero-caption-subtitle" =>"", 
									"munio-opt-portfolio-hero-scroll-caption" => esc_html__('Scroll Down', 'munio'),
									"munio-opt-portfolio-hero-project-info" => "",
									"munio-opt-portfolio-hero-position" =>"fixed-onscroll", 
								);
}

?>
