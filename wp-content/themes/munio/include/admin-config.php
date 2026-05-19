<?php
/**
 * Munio Theme Config File
 */

if ( ! function_exists( 'munio_options_config' ) ) {

    function munio_options_config( $wp_customize ){

		$munio_before_default_section = 40; // Before Colors.
		
		/*** General Settings section ***/
		$wp_customize->add_section(
			'general_settings',
			array(
				'title'    => esc_html__( 'General Settings', 'munio' ),
				'priority' => ($munio_before_default_section - 7),
			)
		);
	
		// Enable AJAX
		$wp_customize->add_setting(
			'clapat_munio_enable_ajax',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_enable_ajax',
			array(
				'label'   		=> esc_html__( 'Load Pages With Ajax', 'munio' ),
				'description'  	=> esc_html__( 'When navigates to another page it loads the target content without reloading the current page.', 'munio' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Smooth Scroll
		$wp_customize->add_setting(
			'clapat_munio_enable_smooth_scrolling',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_enable_smooth_scrolling',
			array(
				'label'   		=> esc_html__( 'Enable Smooth Scrolling', 'munio' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Preloader
		$wp_customize->add_setting(
			'clapat_munio_enable_preloader',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_enable_preloader',
			array(
				'label'   		=> esc_html__( 'Enable Preloader', 'munio' ),
				'description'  	=> esc_html__( 'Enable preloader mask while the page is loading.', 'munio' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Fullscreen Menu
		$wp_customize->add_setting(
			'clapat_munio_enable_fullscreen_menu',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_enable_fullscreen_menu',
			array(
				'label'   		=> esc_html__( 'Enable Fullscreen menu on desktop', 'munio' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Menu button caption
		$wp_customize->add_setting(
			'clapat_munio_menu_btn_caption',
			array(
				'default'           	=> esc_html__( 'Menu', 'munio' ),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_menu_btn_caption',
			array(
				'label'   		=> esc_html__( 'Menu button caption', 'munio' ),
				'description'	=> esc_html__( 'Text preceding the burger menu button.', 'munio' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'text',
			)
		);
		
		// Enable Back To Top button
		$wp_customize->add_setting(
			'clapat_munio_enable_back_to_top',
			array(
				'default'          		=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_enable_back_to_top',
			array(
				'label'   		=> esc_html__( 'Enable Back To Top Button', 'munio' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_munio_back_to_top_caption',
			array(
				'default'          		=> esc_html__( 'Back Top', 'munio' ),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_back_to_top_caption',
			array(
				'label'   		=> esc_html__( 'Back To Top Caption', 'munio' ),
				'description'	=> esc_html__( 'Caption displayed next to the back to top button in the footer.', 'munio' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'text',
			)
		);
		
		// Stretch Title
		$wp_customize->add_setting(
			'clapat_munio_stretch_title',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_stretch_title',
			array(
				'label'   		=> esc_html__( 'Stretch Titles', 'munio' ),
				'description'  	=> esc_html__( 'Flattens hero, menu and bottom navigation titles with a factor of 0.7.', 'munio' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Global background page type
		$wp_customize->add_setting(
			'clapat_munio_default_page_bknd_type',
			array(
				'default'           	=> 'light-content',
				'sanitize_callback' 	=> 'munio_sanitize_default_page_bknd_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_default_page_bknd_type',
			array(
				'label'   		=> esc_html__('Default Background Type', 'munio'),
				'description'	=> esc_html__('Default background type for pages, posts and category pages. The background type set in page options will overwrite this option.', 'munio'),
				'section' 		=> 'general_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'dark-content' => esc_html__('White', 'munio'),
										'light-content' => esc_html__('Black', 'munio') ),
			)
		);
		
		// Enable page title as hero caption
		$wp_customize->add_setting(
			'clapat_munio_enable_page_title_as_hero',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_enable_page_title_as_hero',
			array(
				'label'   		=> esc_html__( 'Display Page Title When Hero Section Is Disabled', 'munio' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		// Enable Magic Cursor
		$wp_customize->add_setting(
			'clapat_munio_enable_magic_cursor',
			array(
				'default'           	=> 1,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_enable_magic_cursor',
			array(
				'label'   		=> esc_html__( 'Enable Magic Cursor', 'munio' ),
				'section' 		=> 'general_settings',
				'type'    		=> 'checkbox',
			)
		);
		/*** End General Settings section ***/
		
		
		/*** Header Settings section ***/
		$wp_customize->add_section(
			'header_settings',
			array(
				'title'    => esc_html__( 'Header Settings', 'munio' ),
				'priority' => ($munio_before_default_section - 6),
			)
		);
		
		// Logo (default)
		$wp_customize->add_setting(
			'clapat_munio_logo',
			array(
				'default'           		=> get_template_directory_uri() . '/images/logo.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_munio_logo', 
			array(
				'label'      => esc_html__( 'Header Logo', 'munio' ),
				'description' => esc_html__('Upload your logo to be displayed at the left side of the header menu.', 'munio'),
				'section'    => 'header_settings'
			)
		));
		
		// Logo (light version)
		$wp_customize->add_setting(
			'clapat_munio_logo_light',
			array(
				'default'           	=> get_template_directory_uri() . '/images/logo-white.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_munio_logo_light', 
			array(
				'label'      => esc_html__( 'Header Logo Light', 'munio' ),
				'description' => esc_html__('Light logo displayed on dark backgrounds.', 'munio'),
				'section'    => 'header_settings'
			)
		));
		/*** End Header Settings section ***/
		
		
		/*** Footer Settings section ***/
		$wp_customize->add_section(
			'footer_settings',
			array(
				'title'    => esc_html__( 'Footer Settings', 'munio' ),
				'priority' => ($munio_before_default_section - 5),
			)
		);
		
		// Copyright
		$wp_customize->add_setting(
			'clapat_munio_footer_copyright',
			array(
				'default'           	=> wp_kses_post( __('2019 Copyright <a target="_blank" href="https://www.clapat.com/themes/munio/">Munio Theme</a>.', 'munio') ),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_footer_copyright',
			array(
				'label'   		=> esc_html__( 'Copyright text', 'munio' ),
				'description'	=> esc_html__( 'This is the copyright text displayed in the footer if there is no background music.', 'munio' ),
				'section' 		=> 'footer_settings',
				'type'    		=> 'textarea',
			)
		);
		
		// Social links
		$wp_customize->add_setting(
			'clapat_munio_footer_social_links_prefix',
			array(
				'default'           	=> esc_html__( 'Follow Us', 'munio' ),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_footer_social_links_prefix',
			array(
				'label'   		=> esc_html__( 'Social Links Prefix', 'munio' ),
				'description'	=> esc_html__('Text preceding the social links.', 'munio'),
				'section' 		=> 'footer_settings',
				'type'    		=> 'text',
			)
		);
		
		// Social Links Display
		$wp_customize->add_setting(
			'clapat_munio_social_links_icons',
			array(
				'default'           	=> 0,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_social_links_icons',
			array(
				'label'   		=> esc_html__( 'Display Social Links As Fontawesome Icons', 'munio' ),
				'description'  	=> esc_html__( 'If unchecked will display the social networks acronyms.', 'munio' ),
				'section' 		=> 'footer_settings',
				'type'    		=> 'checkbox',
			)
		);
		
		global $munio_social_links;
		$social_network_ids = array_keys( $munio_social_links );
		for( $idx = 1; $idx <= MUNIO_MAX_SOCIAL_LINKS; $idx++ ){

			$wp_customize->add_setting(
				'clapat_munio_footer_social_' . $idx,
				array(
					'default'           	=> 'Fb',
					'sanitize_callback' 	=> 'munio_sanitize_social_links',
				)
			);
			
			$wp_customize->add_control(
				'clapat_munio_footer_social_' . $idx,
				array(
					'label'   		=>  esc_html__('Social Network Name ', 'munio' ) . $idx,
					'section' 		=> 'footer_settings',
					'type'    		=> 'select',
					'choices'   	=> $munio_social_links,
				)
			);
			
			$wp_customize->add_setting(
				'clapat_munio_footer_social_url_' . $idx,
				array(
					'default'           	=> '',
					'sanitize_callback' 	=> 'esc_url_raw',
				)
			);
			
			$wp_customize->add_control(
				'clapat_munio_footer_social_url_' . $idx,
				array(
					'label'   		=>  esc_html__('Social Link URL ', 'munio' ) . $idx,
					'section' 		=> 'footer_settings',
					'type'    		=> 'url',
				)
			);
			
		}
		/*** End Footer Settings section ***/
		
		/*** Portfolio Settings section ***/
		$wp_customize->add_section(
			'portfolio_settings',
			array(
				'title'    => esc_html__( 'Portfolio Settings', 'munio' ),
				'priority' => ($munio_before_default_section - 4),
			)
		);
		
		// Custom portfolio slug
		$wp_customize->add_setting(
			'clapat_munio_portfolio_custom_slug',
			array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'munio_sanitize_slug_field',
				'transport'         	=> 'postMessage',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_portfolio_custom_slug',
			array(
				'label'   		=> esc_html__( 'Custom Slug', 'munio' ),
				'description'	=> esc_html__('If you want your portfolio post type to have a custom slug in the url, please enter it here. You will still have to refresh your permalinks after saving this! This is done by going to Settings > Permalinks and clicking save.', 'munio'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Next caption
		$wp_customize->add_setting(
			'clapat_munio_portfolio_next_caption',
			array(
				'default'           	=> esc_html__('Next Case', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_portfolio_next_caption',
			array(
				'label'   		=> esc_html__( 'Next Project Caption', 'munio' ),
				'description'	=> esc_html__('Caption of the next project in portfolio navigation.', 'munio'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Showcase Quick Menu caption
		$wp_customize->add_setting(
			'clapat_munio_showcase_all_caption',
			array(
				'default'           	=> esc_html__('All Projects', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_showcase_all_caption',
			array(
				'label'   		=> esc_html__('Showcase - View All Projects Caption', 'munio'),
				'description'	=> esc_html__('The caption the quick menu button displaying a summary of all projects in Showcase template.', 'munio'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_munio_showcase_close_all_caption',
			array(
				'default'           	=> esc_html__('Close', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_showcase_close_all_caption',
			array(
				'label'   		=> esc_html__('Showcase - Close All Project Caption', 'munio'),
				'description'	=> esc_html__('The caption the quick menu button closing a summary of all projects in Showcase template.', 'munio'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// 'All' portfolio category caption
		$wp_customize->add_setting(
			'clapat_munio_portfolio_filter_all_caption',
			array(
				'default'           	=> esc_html__('All', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_portfolio_filter_all_caption',
			array(
				'label'   		=> esc_html__('All Category Caption', 'munio'),
				'description'	=> esc_html__('The caption the All category displaying all portfolio items in portfolio page templates.', 'munio'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Portfolio Show Categories caption
		$wp_customize->add_setting(
			'clapat_munio_portfolio_show_categories_caption',
			array(
				'default'           	=> esc_html__('Categories', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_portfolio_show_categories_caption',
			array(
				'label'   		=> esc_html__( 'Categories Filters Caption', 'munio' ),
				'description'	=> esc_html__( 'Caption of the categories label displayed in Portfolio Grid layout filters overlay.', 'munio' ),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Responsive portfolio Show Filters caption
		$wp_customize->add_setting(
			'clapat_munio_portfolio_show_filters_hover_caption',
			array(
				'default'           	=> esc_html__('Show', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_portfolio_show_filters_hover_caption',
			array(
				'label'   		=> esc_html__( 'Responsive Portfolio Grid - Show Filters Caption On Tap', 'munio' ),
				'description'	=> esc_html__('Caption of the responsive Show Filters button displayed on tap in Portfolio Grid layout.', 'munio'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		$wp_customize->add_setting(
			'clapat_munio_portfolio_show_filters_caption',
			array(
				'default'           	=> esc_html__('Filters', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_portfolio_show_filters_caption',
			array(
				'label'   		=> esc_html__( 'Responsive Portfolio Grid - Show Filters Caption', 'munio' ),
				'description'	=> esc_html__('Caption of the responsive Show Filters button displayed in Portfolio Grid layout.', 'munio'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'text',
			)
		);
		
		// Portfolio navigation order
		$wp_customize->add_setting(
			'clapat_munio_portfolio_navigation_order',
			array(
				'default'           	=> 'forward',
				'sanitize_callback' 	=> 'munio_sanitize_portfolio_navigation_order',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_portfolio_navigation_order',
			array(
				'label'   		=> esc_html__('Portfolio Items Navigation Order', 'munio'),
				'section' 		=> 'portfolio_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'forward' => esc_html__('Forward in time (next item is newer or loops to the oldest if current item is the newest)', 'munio'),
											  'backward' => esc_html__('Backward in time (next item is older or loops to the newest if current item is the oldest)', 'munio') ),
			)
		);
		/*** End Portfolio Settings section ***/
		
		/*** Blog Settings section ***/
		$wp_customize->add_section(
			'blog_settings',
			array(
				'title'    => esc_html__( 'Blog Settings', 'munio' ),
				'priority' => ($munio_before_default_section - 3),
			)
		);
		
		// Navigation caption
		$wp_customize->add_setting(
			'clapat_munio_blog_next_post_caption',
			array(
				'default'           	=> esc_html__('Next', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_blog_next_post_caption',
			array(
				'label'   		=> esc_html__('Next Post Caption', 'munio'),
				'description'	=> esc_html__('Caption of the button linking to the next single blog post page.', 'munio'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		
		// Blog pages default title
		$wp_customize->add_setting(
			'clapat_munio_blog_default_title',
			array(
				'default'           	=> esc_html__('Blog', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_blog_default_title',
			array(
				'label'   		=> esc_html__('Default Posts Page Title', 'munio'),
				'description'	=> esc_html__('Title of the default blog posts page. The default blog posts page is the page displaying blog posts when there is no front page set in Settings -> Reading.', 'munio'),
				'section' 		=> 'blog_settings',
				'type'    		=> 'text',
			)
		);
		/*** End Blog Settings section ***/
		
		/*** Map Settings section ***/
		$wp_customize->add_section(
			'map_settings',
			array(
				'title'    => esc_html__( 'Map Settings', 'munio' ),
				'priority' => ($munio_before_default_section - 2),
			)
		);
		
		// Map address
		$wp_customize->add_setting(
			'clapat_munio_map_address',
			array(
				'default'           	=>  esc_html__('775 New York Ave, Brooklyn, Kings, New York 11203', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_map_address',
			array(
				'label'   		=> esc_html__('Google Map Address', 'munio'),
				'description'  	=> esc_html__('Example: 775 New York Ave, Brooklyn, Kings, New York 11203. Or you can enter latitude and longitude for greater precision. Example: 41.40338, 2.17403 (in decimal degrees - DDD)', 'munio'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Map marker image
		$wp_customize->add_setting(
			'clapat_munio_map_marker',
			array(
				'default'           	=> get_template_directory_uri() . '/images/marker.png',
				'sanitize_callback' 	=> 'esc_url_raw',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( 
			$wp_customize, 
			'clapat_munio_map_marker', 
			array(
				'label'      => esc_html__( 'Map Marker', 'munio' ),
				'description' => esc_html__('Please choose an image file for the marker.', 'munio'),
				'section'    => 'map_settings'
			)
		));
		
		// Map zoom
		$wp_customize->add_setting(
			'clapat_munio_map_zoom',
			array(
				'default'           	=> 16,
				'sanitize_callback' 	=> 'absint',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_map_zoom',
			array(
				'label'   		=> esc_html__( 'Map Zoom Level', 'munio' ),
				'description'  	=> esc_html__('Higher number will be more zoomed in.', 'munio'),
				'section' 		=> 'map_settings',
				'type'    		=> 'number',
				'input_attrs' 	=> array( 'min' => 0, 'max' => 30, 'step'  => 1 )
			)
		);
		
		// Pop-up marker title
		$wp_customize->add_setting(
			'clapat_munio_map_company_name',
			array(
				'default'           	=> esc_html__('Munio', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_map_company_name',
			array(
				'label'   		=> esc_html__('Pop-up marker title', 'munio'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Pop-up marker text
		$wp_customize->add_setting(
			'clapat_munio_map_company_info',
			array(
				'default'           	=> esc_html__('Here we are. Come to drink a coffee!', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_map_company_info',
			array(
				'label'   		=> esc_html__('Pop-up marker text', 'munio'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		
		// Map type
		$wp_customize->add_setting(
			'clapat_munio_map_type',
			array(
				'default'           	=> 'satellite',
				'sanitize_callback' 	=> 'munio_sanitize_map_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_map_type',
			array(
				'label'   		=> esc_html__('Map Type', 'munio'),
				'description'	=> esc_html__('Set the map type as road map or satellite.', 'munio'),
				'section' 		=> 'map_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'satellite' => esc_html__('Satellite', 'munio'),
										'roadmap' => esc_html__('Roadmap', 'munio') ),
			)
		);
		
		// Google maps API key
		$wp_customize->add_setting(
			'clapat_munio_map_api_key',
			array(
				'default'           	=> '',
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_map_api_key',
			array(
				'label'   		=> esc_html__('Google Maps API Key', 'munio'),
				'description'	=> esc_html__('Without it, the map may not be displayed. If you have an api key paste it here. More information on how to obtain a google maps api key: https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key', 'munio'),
				'section' 		=> 'map_settings',
				'type'    		=> 'text',
			)
		);
		/*** End Map Settings section ***/
		
		/*** Error Page section ***/
		$wp_customize->add_section(
			'error_page_settings',
			array(
				'title'    => esc_html__( 'Error Page Settings', 'munio' ),
				'priority' => ($munio_before_default_section - 1),
			)
		);
		
		// Error page title
		$wp_customize->add_setting(
			'clapat_munio_error_title',
			array(
				'default'           	=> esc_html__('404', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_error_title',
			array(
				'label'   		=> esc_html__('Error Page Title', 'munio'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error page info
		$wp_customize->add_setting(
			'clapat_munio_error_info',
			array(
				'default'           	=> esc_html__('The page you are looking for could not be found.', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_error_info',
			array(
				'label'   		=> esc_html__('Error Page Info Text', 'munio'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button
		$wp_customize->add_setting(
			'clapat_munio_error_back_button',
			array(
				'default'           	=> esc_html__('Home Page', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_error_back_button',
			array(
				'label'   		=> esc_html__('Back Button Caption', 'munio'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button - caption on hover
		$wp_customize->add_setting(
			'clapat_munio_error_back_button_hover_caption',
			array(
				'default'           	=> esc_html__('Go Back', 'munio'),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_error_back_button_hover_caption',
			array(
				'label'   		=> esc_html__('Back Button Caption On Hover', 'munio'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// Error back button url
		$wp_customize->add_setting(
			'clapat_munio_error_back_button_url',
			array(
				'default'           	=> esc_url( get_home_url() ),
				'sanitize_callback' 	=> 'munio_sanitize_text_field',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_error_back_button_url',
			array(
				'label'   		=> esc_html__('Back Button URL', 'munio'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'text',
			)
		);
		
		// 404 page background type
		$wp_customize->add_setting(
			'clapat_munio_error_page_bknd_type',
			array(
				'default'           	=> 'light-content',
				'sanitize_callback' 	=> 'munio_sanitize_error_page_bknd_type',
			)
		);
		
		$wp_customize->add_control(
			'clapat_munio_error_page_bknd_type',
			array(
				'label'   		=> esc_html__('Background Type', 'munio'),
				'description'	=> esc_html__('Background type for the 404 error page.', 'munio'),
				'section' 		=> 'error_page_settings',
				'type'    		=> 'select',
				'choices'   	=> array( 'dark-content' 	=> esc_html__('White', 'munio'),
										'light-content' => esc_html__('Black', 'munio') ),
			)
		);
		/*** End Error Page Settings section ***/
	}

	add_action( 'customize_register', 'munio_options_config' );
}

/**
 * Sanitize a text or textarea field
 *
 * @param string $input - the text
 */
function munio_sanitize_text_field( $input ) {
	
	return wp_kses_post( $input );
}

/**
 * Sanitize a custom slug field
 *
 * @param string $input - the input slug
 */
function munio_sanitize_slug_field( $input ) {
	
	return sanitize_title( $input );
}


/**
 * Sanitize the social network options.
 *
 * @param string $input social network id.
 */
function munio_sanitize_social_links( $input ) {
	
	global $munio_social_links;
	$valid = array_keys( $munio_social_links );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'Fb';
}


/**
 * Sanitize the portfolio navigation order.
 *
 * @param string $input - portfolio navigation order
 */
function munio_sanitize_portfolio_navigation_order( $input ) {
	
	$valid = array( 'forward', 'backward' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'forward';
}

/**
 * Sanitize the map type
 *
 * @param string $input - map type
 */
function munio_sanitize_map_type( $input ) {
	
	$valid = array( 'satellite', 'roadmap' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'satellite';
}

/**
 * Sanitize the global page background type
 *
 * @param string $input - background type
 */
function munio_sanitize_default_page_bknd_type( $input ) {
	
	$valid = array( 'dark-content', 'light-content' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'dark-content';
}

/**
 * Sanitize the error page background type
 *
 * @param string $input - background type
 */
function munio_sanitize_error_page_bknd_type( $input ) {
	
	$valid = array( 'dark-content', 'light-content' );
	
	if ( in_array( $input, $valid, true ) ) {
		return $input;
	}

	return 'dark-content';
}