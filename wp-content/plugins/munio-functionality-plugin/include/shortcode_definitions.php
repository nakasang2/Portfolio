<?php

$content_type = array( 'dark', 'light' );					
$text_align = array('text-align-left', 'text-align-center', 'text-align-right' );


$clapat_shortcodes = array(

	//columns
    'one_half' => array(
        'name' => __('Column', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'clapat_munio_plugin_text_domain')
    ),

    'one_third' => array(
        'name' => __('Column', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'clapat_munio_plugin_text_domain')
    ),

    'one_fourth' => array(
        'name' => __('Column', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'clapat_munio_plugin_text_domain')
    ),

    'one_fifth' => array(
        'name' => __('Column', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'clapat_munio_plugin_text_domain')
    ),

    'one_sixth' => array(
        'name' => __('Column', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'clapat_munio_plugin_text_domain')
    ),

    'two_third' => array(
        'name' => __('Column', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'clapat_munio_plugin_text_domain')
    ),

    'two_fifth' => array(
        'name' => __('Column', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'clapat_munio_plugin_text_domain')
    ),

    'three_fourth' => array(
        'name' => __('Column', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'clapat_munio_plugin_text_domain')
    ),

    'three_fifth' => array(
        'name' => __('Column', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'clapat_munio_plugin_text_domain')
    ),

    'four_fifth' => array(
        'name' => __('Column', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'clapat_munio_plugin_text_domain')
    ),

    'five_sixth' => array(
        'name' => __('Column', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'last' => array( 'title' => __('Last Column?', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
            'text_align' => array( 'title' => __('Text Alignment', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => $text_align
            )
        ),
        'has_content' => true,
        'default_content' => __('Content goes here', 'clapat_munio_plugin_text_domain')
    ),
    // end columns
     
	// typo elements
	'title' => array(
        'name' => __('Title', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            'size' => array( 'title' => __('Title Size', 'clapat_munio_plugin_text_domain'),
                'desc' => '',
                'type' => 'select',
                'values' => array('h1', 'h2', 'h3', 'h4', 'h5', 'h6')
            ),
            'underline' => array( 'title' => __('Has Underline?', 'clapat_munio_plugin_text_domain'),
                'desc' => __('If the title is underlined or not', 'clapat_munio_plugin_text_domain'),
                'type' => 'select',
                'values' => array('no', 'yes')
            ),
			'big' => array( 'title' => __('Big Title?', 'clapat_munio_plugin_text_domain'),
                'desc' => __('This parameter applies only for H1 headings. If the title is normal or bigger title font size', 'clapat_munio_plugin_text_domain'),
                'type' => 'select',
                'values' => array('no', 'yes')
            )
        ),
        'has_content' => true,
        'default_content' => __('Title', 'clapat_munio_plugin_text_domain')
    ),
    
    'button' => array(
        'name' => __('Button', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            "link" => array(    "title" => __("Button Link", 'clapat_munio_plugin_text_domain'),
                "desc"  => __("URL for the button", 'clapat_munio_plugin_text_domain'),
                "type"  => "text",
                "default" => "http://"
            ),
			"hover_caption" => array(    "title" => __("Hover Caption", 'clapat_munio_plugin_text_domain'),
                "desc"  => __("Caption displayed when hovering over", 'clapat_munio_plugin_text_domain'),
                "type"  => "text",
                "default" =>__("Hover Title", 'clapat_munio_plugin_text_domain')
            ),
            "target" => array(  "title" => __("Target Window", 'clapat_munio_plugin_text_domain'),
                "desc" => __("Button link opens in a new or current window", 'clapat_munio_plugin_text_domain'),
                "type" => "select",
                "values" => array("_blank", "_self")
            ),
            "type" => array( "title" => __("Button type", 'clapat_munio_plugin_text_domain'),
                "desc" => "",
                "type" => "select",
                "values" => array("normal", "outline")
            ),
			 "rounded" => array( "title" => __("Rounded border", 'clapat_munio_plugin_text_domain'),
                "desc" => "",
                "type" => "select",
                "values" => array("yes", "no")
            )
        ),
        'has_content' => true,
		'default_content' => __('Button Caption', 'clapat_munio_plugin_text_domain')
    ),
	// end typo elements
    
	'accordion' => array(
        'name' => __('Accordion', 'clapat_munio_plugin_text_domain'),
        'sub_items' => array(
            'accordion_item' => array(  'name' => __('Accordion Item', 'clapat_munio_plugin_text_domain'),
                'attributes' => array(
                    'title' => array( 'title' => __('Title', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => __('Accordion Title', 'clapat_munio_plugin_text_domain')
                    )
                ),
                'has_content' => true,
                'default_content' => __('Accordion Content Here', 'clapat_munio_plugin_text_domain')
            )
        ),
        'has_content' => false
    ),
	
    'service' => array(
        'name' => __('Service Box', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            "icon" => array(  "title" => __("Icon", 'clapat_munio_plugin_text_domain'),
                "desc" => __("Icon displayed within service box", 'clapat_munio_plugin_text_domain'),
                "type" => "icon",
                "default" => ""
            ),
            "title" => array(  "title" => __("Service Title", 'clapat_munio_plugin_text_domain'),
                "desc" => __("Title of the service", 'clapat_munio_plugin_text_domain'),
                "type" => "text",
                "default" => ""
            )
        ),
        'require_icon' => true,
        'has_content' => true,
        'default_content' => __('Service Description', 'clapat_munio_plugin_text_domain')
    ),
	
	 'contact_box' => array(
        'name' => __('Contact Box', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            "icon" => array(  "title" => __("Icon", 'clapat_munio_plugin_text_domain'),
                "desc" => __("Icon displayed within contact box", 'clapat_munio_plugin_text_domain'),
                "type" => "icon",
                "default" => ""
            ),
            "title" => array(  "title" => __("Title", 'clapat_munio_plugin_text_domain'),
                "desc" => __("Title of the contact box", 'clapat_munio_plugin_text_domain'),
                "type" => "text",
                "default" => ""
            )
        ),
        'require_icon' => true,
        'has_content' => true,
        'default_content' => __('Contact Info', 'clapat_munio_plugin_text_domain')
    ),
	
	'clapat_collage' => array(
        'name' => __('Image Collage', 'clapat_munio_plugin_text_domain'),
        'sub_items' => array(
            'clapat_collage_image' => array(  'name' => __('Collage Image', 'clapat_munio_plugin_text_domain'),
                'attributes' => array(
					'thumb_img_url' => array( 'title' => __('Thumbnail Image URL', 'clapat_munio_plugin_text_domain'),
                        'desc' => __('Image thumbnail included in carousel', 'clapat_munio_plugin_text_domain'),
                        'type' => 'text',
                        'default' => ''
                    ),
                    'img_url' => array( 'title' => __('Collage Image URL', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                    'alt' => array( 'title' => __('Image ALT', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
					'info' => array( 'title' => __('Collage Image Caption', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                ),
                'has_content' => false
            )
        ),
        'has_content' => false
    ),
	
	'munio_video' => array(
        'name' => __('Video hosted', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
            "cover_img_url" => array(  "title" => __("Cover Image", 'clapat_munio_plugin_text_domain'),
                "desc" => __("Cover image of the still video", 'clapat_munio_plugin_text_domain'),
                "type" => "text",
                "default" => ""
            ),
            "webm_url" => array(  "title" => __("Webm URL", 'clapat_munio_plugin_text_domain'),
                "desc" => __("Url of the video in webm format", 'clapat_munio_plugin_text_domain'),
                "type" => "text",
                "default" => ""
            ),
			"mp4_url" => array(  "title" => __("Mp4 URL", 'clapat_munio_plugin_text_domain'),
                "desc" => __("Url of the video in mp4 format", 'clapat_munio_plugin_text_domain'),
                "type" => "text",
                "default" => ""
            )
        ),
        'require_icon' => false,
        'has_content' => false
    ),
	 // end elements
    	
    //sliders
    'general_slider' => array(
        'name' => __('Normal Image Slider', 'clapat_munio_plugin_text_domain'),
        'sub_items' => array(
            'general_slide' => array(  'name' => __('Slide', 'clapat_munio_plugin_text_domain'),
                'attributes' => array(
                    'img_url' => array( 'title' => __('Slider Image URL', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                    'alt' => array( 'title' => __('Image ALT', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                ),
                'has_content' => false
            )
        ),
        'has_content' => false
    ),
	
	'carousel_slider' => array(
        'name' => __('Carousel Image Slider', 'clapat_munio_plugin_text_domain'),
        'sub_items' => array(
            'carousel_slide' => array(  'name' => __('Slide', 'clapat_munio_plugin_text_domain'),
                'attributes' => array(
					'img_url' => array( 'title' => __('Slider Image URL', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                    'alt' => array( 'title' => __('Image ALT', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                ),
                'has_content' => false
            )
        ),
        'has_content' => false
    ),
	//end sliders

	'clapat_popup_image' => array(
        'name' => __('Popup Image', 'clapat_munio_plugin_text_domain'),
        'attributes' => array(
			'thumb_url' => array( 'title' => __('Thumbnail Image URL', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
            ),
            'img_url' => array( 'title' => __('Zoom Image URL', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
            ),
        ),
        'has_content' => false
    ),
	
	'clapat_captioned_image' => array(
        'name' => __('Captioned Image', 'clapat_munio_plugin_text_domain'),
		'attributes' => array(
			'img_url' => array( 'title' => __('Image URL', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
            ),
			'alt' => array( 'title' => __('ALT attribute', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
            ),
			'caption' => array( 'title' => __('Image Caption', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
            ),
        ),
        'has_content' => false
    ),
	
	// testimonials
	'testimonials' => array(
        'name' => __('Testimonials Carousel', 'clapat_munio_plugin_text_domain'),
        'sub_items' => array(
            'testimonial' => array(  'name' => __('Testimonial', 'clapat_munio_plugin_text_domain'),
                'attributes' => array(
                    'name' => array( 'title' => __('Client Name', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                ),
                'has_content' => true,
                'require_icon' => false
            )
        ),
        'has_content' => false,
    ),
	// end testimonials
	
	// Clients
	'clients' => array(
        'name' => __('Clients List', 'clapat_munio_plugin_text_domain'),
        'sub_items' => array(
            'client_item' => array(  'name' => __('Client', 'clapat_munio_plugin_text_domain'),
                'attributes' => array(
                    'img_url' => array( 'title' => __('Client Logo Image URL', 'clapat_munio_plugin_text_domain'),
                        'desc' => '',
                        'type' => 'text',
                        'default' => ''
                    ),
                ),
                'has_content' => true,
                'require_icon' => false
            )
        ),
        'has_content' => false,
    ),
	// end clients
	
);

?>