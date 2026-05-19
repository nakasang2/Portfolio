<?php

// You may replace $redux_opt_name with a string if you wish. If you do so, change loader.php
// as well as all the instances below.
$redux_opt_name = 'clapat_' . MUNIO_THEME_ID . '_theme_options';


if ( !function_exists( "munio_add_metaboxes" ) ){

    function munio_add_metaboxes( $metaboxes ) {

    $metaboxes = array();


    ////////////// Page Options //////////////
    $page_options = array();
    $page_options[] = array(
        'title'         => esc_html__('General', 'munio'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-wrench',
        'desc'          => esc_html__('Options concerning all page templates.', 'munio'),
        'fields'        => array(
			
			array(
                'id'        => 'munio-opt-page-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background color', 'munio'),
				'desc'      => esc_html__('Background color for this page.', 'munio'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('White', 'munio'),
                    'light-content' => esc_html__('Black', 'munio')

                ),
				'default'   => 'light-content',
            ),
			
			/**************************HERO SECTION OPTIONS**************************/
			array(
                'id'        => 'munio-opt-page-enable-hero',
                'type'      => 'switch',
                'title'     => esc_html__('Display Hero Section', 'munio'),
                'desc'      => esc_html__('Enable "hero" section displayed immediately below page header. Showcase and Carousel pages do not have a hero section.', 'munio'),
				'on'       => esc_html__('Yes', 'munio'),
				'off'      => esc_html__('No', 'munio'),
                'default'   => false
            ),

			array(
                'id'        => 'munio-opt-page-hero-caption-title',
                'type'      => 'text',
				'required'  => array( 'munio-opt-page-enable-hero', '=', true ),
                'title'     => esc_html__('Hero Caption Title', 'munio'),
                'subtitle'  => esc_html__('Caption title displayed over hero section.', 'munio'),
	        ),

			array(
                'id'        => 'munio-opt-page-hero-caption-subtitle',
                'type'      => 'textarea',
				'required'  => array( 'munio-opt-page-enable-hero', '=', true ),
                'title'     => esc_html__('Hero Caption Subtitle', 'munio'),
                'subtitle'  => esc_html__('Caption subtitle displayed over hero section. Enter plain text.', 'munio'),
                'validate'  => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
	        ),

			/**************************END - HERO SECTION OPTIONS**************************/
			
			/**************************PAGE NAVIGATION SECTION OPTIONS**************************/
			array(
                'id'        => 'munio-opt-page-enable-navigation',
                'type'      => 'switch',
                'title'     => esc_html__('Enable Page Navigation Section', 'munio'),
                'desc'      => esc_html__('Enable page navigation section displayed above the footer. Available only in Default, Portfolio and Portfolio Mixed templates.', 'munio'),
				'on'       => esc_html__('Yes', 'munio'),
				'off'      => esc_html__('No', 'munio'),
                'default'   => false
            ),
			
			array(
                'id'        => 'munio-opt-page-navigation-caption-title',
                'type'      => 'text',
				'required'  => array( 'munio-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Navigation Caption', 'munio'),
                'desc'  => esc_html__('Caption displayed above the next page title.', 'munio'),
	        ),

			array(
                'id'        => 'munio-opt-page-navigation-next-url',
                'type'      => 'url',
				'required'  => array( 'munio-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Next Page Url', 'munio'),
                'desc'  => esc_html__('The url of the next page in navigation.', 'munio'),
	        ),
			
			array(
                'id'        => 'munio-opt-page-navigation-next-title',
                'type'      => 'text',
				'required'  => array( 'munio-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Next Page Title', 'munio'),
                'desc'  => esc_html__('The title of the next page in navigation. For an optimal transition between pages this field is the next page hero title or next page title (if hero is disabled).', 'munio'),
	        ),

			array(
                'id'        => 'munio-opt-page-navigation-next-subtitle',
                'type'      => 'text',
				'required'  => array( 'munio-opt-page-enable-navigation', '=', true ),
                'title'     => esc_html__('Next Page Subtitle', 'munio'),
                'desc'  => esc_html__('The subtitle of the next page in navigation. For an optimal transition between pages this field is the next page hero subtitle (if hero is enabled).', 'munio'),
	        ),
			/**************************END - PAGE NAVIGATION SECTION OPTIONS**************************/
        ),
    );

	$page_options[] = array(
        'title'         => esc_html__('Portfolio and Portfolio Mixed Templates', 'munio'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-folder-open',
        'desc'          => esc_html__('Options concerning only Portfolio templates.', 'munio'),
        'fields'        => array(

			array(
                'id'        	=> 'munio-opt-page-portfolio-filter-category',
                'type'      	=> 'text',
				'title'     	=> esc_html__('Category Filter', 'munio'),
                'desc'  		=> esc_html__('Paste here the portfolio category slugs you want to include in the Portfolio and Portfolio Mixed page templates separated by comma. Do not include spaces. For example photography,branding. It will exclude the rest of the categories. The portfolio category slugs can be found in Portfolio -> Categories.', 'munio'),
				'default'  	=> '',
	        ),
			
			array(
                'id'        => 'munio-opt-page-portfolio-layout',
                'type'      => 'select',
                'title'     => esc_html__('Page Layout', 'munio'),
				'desc'      => esc_html__('The portfolio page layout.', 'munio'),
                'options'   => array(
                    'classic' 	=> esc_html__('Classic Grid', 'munio'),
					'parallax'	=> esc_html__('Vertical Parallax', 'munio'),
                ),
				'default'   => 'classic'
            ),
			
			array(
                 'id'       => 'munio-opt-page-portfolio-mixed-items',
                 'type'     => 'text',
                 'title'    => esc_html__( 'Maximum Number Of Items In Portfolio Mixed', 'munio' ),
                 'desc' => esc_html__( 'Available only for Portfolio Mixed Template: the maximum number of portfolio items displayed. Leave empty for ALL.', 'munio' )
             ),
			 
			 array(
                 'id'       => 'munio-opt-page-portfolio-mixed-content-position',
                 'type'     => 'select',
                 'title'    => esc_html__( 'Page Content Position', 'munio'),
                 'desc' => esc_html__( 'Available only for Portfolio Mixed Template: page content position in relation with portfolio grid.', 'munio'),
                 'options'   => array(
                    'after' 	=> esc_html__('After Portfolio Grid', 'munio'),
					'before'	=> esc_html__('Before Portfolio Grid', 'munio'),
                 ),
				 'default'	=> true,
            ),
			
		),
	);
		
	$page_options[] = array(
        'title'         => esc_html__('Showcase and Carousel Templates', 'munio'),
        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-folder-open',
        'desc'          => esc_html__('Options concerning only Showcase and Carousel templates.', 'munio'),
        'fields'        => array(

			array(
                'id'        	=> 'munio-opt-page-showcase-filter-category',
                'type'      	=> 'text',
				'title'     	=> esc_html__('Category Filter', 'munio'),
                'desc'  		=> esc_html__('Paste here the portfolio category slugs you want to include in the Showcase slider separated by comma. Do not include spaces. For example photography,branding. It will exclude the rest of the categories. The portfolio category slugs can be found in Portfolio -> Categories.', 'munio'),
				'default'  	=> '',
	        ),
						
        ),

    );
	
	$metaboxes[] = array(
        'id'            => 'clapat_' . MUNIO_THEME_ID . '_page_options',
        'title'         => esc_html__( 'Page Options', 'munio'),
        'post_types'    => array( 'page' ),
        'position'      => 'normal', // normal, advanced, side
        'priority'      => 'high', // high, core, default, low
        'sidebar'       => false, // enable/disable the sidsebar in the normal/advanced positions
        'sections'      => $page_options,
    );

    $blog_post_options = array();
    $blog_post_options[] = array(

         'icon_class'    => 'icon-large',
         'icon'          => 'el-icon-wrench',
         'fields'        => array(

			array(
                'id'        => 'munio-opt-blog-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background color', 'munio'),
				'desc'      => esc_html__('Background color for this blog post.', 'munio'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('White', 'munio'),
                    'light-content' => esc_html__('Black', 'munio')

                ),
				'default'   => 'light-content',
            ),
				  
          )
        );
			/**************************END - HERO SECTION OPTIONS**************************/

    $metaboxes[] = array(
       'id'            => 'clapat_' . MUNIO_THEME_ID . '_post_options',
       'title'         => esc_html__( 'Post Options', 'munio'),
       'post_types'    => array( 'post' ),
       'position'      => 'normal', // normal, advanced, side
       'priority'      => 'high', // high, core, default, low
       'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
       'sections'      => $blog_post_options,
    );


    $portfolio_options = array();
    $portfolio_options[] = array(

        'icon_class'    => 'icon-large',
        'icon'          => 'el-icon-wrench',
        'fields'        => array(

			array(
                'id'        => 'munio-opt-portfolio-bknd-color',
                'type'      => 'select',
                'title'     => esc_html__('Background color', 'munio'),
				'desc'      => esc_html__('Background color for this page.', 'munio'),
                'options'   => array(
                    'dark-content' 	=> esc_html__('White', 'munio'),
                    'light-content' => esc_html__('Black', 'munio')

                ),
				'default'   => 'light-content',
            ),
			
			array(
                'id'        => 'munio-opt-portfolio-thumbnail-size',
                'type'      => 'select',
                'title'     => esc_html__('Thumbnail Size', 'munio'),
                'desc'      => esc_html__('Size of the thumbnail for this item as it appears in portfolio pages. The thumbnail image is the hero image assigned for this item.', 'munio'),
				'options'   => array(
                    'normal' => esc_html__('Normal', 'munio'),
                    'wide' => esc_html__('Wide', 'munio')
                ),
                'default'   => 'normal'
            ),
			
			array(
                'id'        => 'munio-opt-portfolio-showcase-include',
                'type'      => 'select',
                'title'     => esc_html__('Include In Showcase Slider', 'munio'),
                'desc'      => esc_html__('Include this portfolio item in the Showcase slider. The slider is displayed in Showcase page template.', 'munio'),
				'options'   => array(
                    'yes'		=> esc_html__('Include in Showcase', 'munio'),
                    'no'  	=> esc_html__('Exclude from Showcase', 'munio')

                ),
                'default'   => 'yes'
            ),
			
			/**************************HERO SECTION OPTIONS**************************/
			array(
				'id'        => 'munio-opt-portfolio-hero-img',
                'type'      => 'media',
                'url'       => true,
                'title'     => esc_html__('Hero Image', 'munio'),
                'desc'      => esc_html__('Upload hero background image.  The hero image is being displayed in portfolio showcase. Hero section is the header section displayed at the top of the project page.', 'munio'),
                'default'   => array(),
            ),
			
			array(
                'id'        => 'munio-opt-portfolio-video',
                'type'      => 'switch',
				'title'     => esc_html__('Video Hero', 'munio'),
				'desc'   	=> esc_html__('Video displayed as hero section and showcase slide. If you check this option set the Hero Image as the first frame image of the video to avoid flickering!', 'munio'),
                'on'       => esc_html__('Yes', 'munio'),
				'off'      => esc_html__('No', 'munio'),
                'default'   => false
            ),
			
			array(
                'id'        => 'munio-opt-portfolio-video-webm',
                'type'      => 'text',
                'title'     => esc_html__('Webm Video URL', 'munio'),
                'desc'   	=> esc_html__('URL of the showcase slide background webm video. Webm format is previewed in Chrome and Firefox.', 'munio'),
				'required'	=> array('munio-opt-portfolio-video', '=', true),
            ),
			
			array(
                'id'        => 'munio-opt-portfolio-video-mp4',
                'type'      => 'text',
                'title'     => esc_html__('MP4 Video URL', 'munio'),
                'desc'   	=> esc_html__('URL of the showcase slide background MP4 video. MP4 format is previewed in IE, Safari and other browsers.', 'munio'),
                'required'	=> array('munio-opt-portfolio-video', '=', true),
            ),
						
			array(
                'id'        => 'munio-opt-portfolio-hero-caption-title',
                'type'      => 'text',
				'title'     => esc_html__('Hero Caption Title', 'munio'),
                'subtitle'  => esc_html__('Caption title displayed over hero section. The hero background image is set in the hero image set in preceding option.', 'munio'),
	        ),

			array(
                'id'        => 'munio-opt-portfolio-hero-caption-subtitle',
                'type'      => 'textarea',
				'title'     => esc_html__('Hero Caption Subtitle', 'munio'),
                'subtitle'  => esc_html__('Caption subtitle displayed over hero section. Enter plain text.', 'munio'),
                'validate'  => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
	        ),
			
			array(
                'id'        => 'munio-opt-portfolio-hero-scroll-caption',
                'type'      => 'text',
				'title'     => esc_html__('Scroll Down Caption', 'munio'),
                'desc'  => esc_html__('Scroll down caption displayed to the left of the hero image indicating scrolling down to reveal the content. Leave empty for no scroll down button.', 'munio'),
				'default'   => esc_html__('Scroll Down', 'munio'),
	        ),

			array(
                'id'        => 'munio-opt-portfolio-hero-project-info',
                'type'      => 'text',
				'title'     => esc_html__('Hero Project Info', 'munio'),
                'desc'  => esc_html__('Short text describing the project to the bottom right of the hero image. Usually the year when the project has been accomplished.', 'munio')
	        ),
			
			array(
                'id'        => 'munio-opt-portfolio-hero-position',
                'type'      => 'select',
                'title'     => esc_html__('Hero Position', 'munio'),
                'desc'      => esc_html__('Position of the "hero" section displayed as page header.', 'munio'),
				'options'   => array(
                    'fixed-onscroll' 	=> esc_html__('Relative', 'munio'),
                    'parallax-onscroll' => esc_html__('Parallax', 'munio')
                ),
                'default'   => 'fixed-onscroll'
            ),
			/**************************END - HERO SECTION OPTIONS**************************/

        ),
    );

    $metaboxes[] = array(
        'id'            => 'clapat_' . MUNIO_THEME_ID . '_portfolio_options',
        'title'         => esc_html__( 'Portfolio Item Options', 'munio'),
        'post_types'    => array( 'munio_portfolio' ),
        'position'      => 'normal', // normal, advanced, side
        'priority'      => 'high', // high, core, default, low
        'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
        'sections'      => $portfolio_options,
    );

	return $metaboxes;
  }
  
}

if( class_exists('Clapat\Munio\Metaboxes\Meta_Boxes') ){

	$metabox_definitions = array();
	$metabox_definitions = munio_add_metaboxes( $metabox_definitions );
	do_action( 'clapat/munio/add_metaboxes', $metabox_definitions );
}