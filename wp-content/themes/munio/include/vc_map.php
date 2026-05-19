<?php

if ( function_exists( 'vc_map' ) ) {
	
vc_map( array(
	'name' => 'Title',
	'base' => 'title',
	'icon' => 'icon-vc-clapat-munio',
	'is_container' => 'true',
	'category' => esc_html__('Munio - Typo Elements', 'munio'),
	'description' => esc_html__('Title', 'munio'),
	'admin_enqueue_css' => array( get_template_directory_uri() . '/include/vc-extend.css' ),
	'params' => array(
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Title Size', 'munio'),
			'description' => '',
			'param_name' => 'size',
			'value' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Has Underline?', 'munio'),
			'description' => esc_html__('If the title is displayed underlined or without underline', 'munio'),
			'param_name' => 'underline',
			'value' => array( 'no', 'yes'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Big Title?', 'munio'),
			'description' => esc_html__('This parameter applies only for H1 headings. If the title is normal or bigger title font size.', 'munio'),
			'param_name' => 'big',
			'value' => array( 'no', 'yes'),
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Content', 'munio'),
			'param_name' => 'content',
			'value' => esc_html__('Content goes here', 'munio'),
		),
	)
) );

vc_map( array(
	'name' => 'Button',
	'base' => 'button',
	'icon' => 'icon-vc-clapat-munio',
	'is_container' => 'true',
	'category' => esc_html__('Munio - Typo Elements', 'munio'),
	'description' => esc_html__('Button', 'munio'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Button Link', 'munio'),
			'description' => esc_html__('URL for the button', 'munio'),
			'param_name' => 'link',
			'value' => 'http://',
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Target Window', 'munio'),
			'description' => esc_html__('Button link opens in a new or current window', 'munio'),
			'param_name' => 'target',
			'value' => array( '_blank', '_self'),
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Hover Caption', 'munio'),
			'description' => esc_html__('Caption when hovering the button', 'munio'),
			'param_name' => 'hover_caption',
			'value' => esc_html__('Hover Caption', 'munio'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Button type', 'munio'),
			'description' => '',
			'param_name' => 'type',
			'value' => array( 'normal', 'outline'),
		),
		array(
			'type' => 'dropdown',
			'holder' => 'div',
			'heading' => esc_html__('Rounded border', 'munio'),
			'description' => '',
			'param_name' => 'rounded',
			'value' => array( 'yes', 'no'),
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Caption', 'munio'),
			'param_name' => 'content',
			'value' => esc_html__('Caption goes here', 'munio'),
		),
		)
) );

vc_map( array(
	'name' => 'Space Between Buttons',
	'base' => 'space_between_buttons',
	'icon' => 'icon-vc-clapat-munio',
	'category' => esc_html__('Munio - Typo Elements', 'munio'),
	'description' => esc_html__('Adds a space between two button shortcodes', 'munio'),
	'show_settings_on_create' => false
) );

vc_map( array(
	'name' => 'Accordion',
	'base' => 'accordion',
	'icon' => 'icon-vc-clapat-munio',
	'as_parent' => array('only' => 'accordion_item'),
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Accordion', 'munio'),
	'content_element' => true,
	'show_settings_on_create' => false,
	"params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_accordion extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Accordion Item',
	'base' => 'accordion_item',
	'icon' => 'icon-vc-clapat-munio',
	'as_child' => array('only' => 'accordion' ),
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Accordion Item', 'munio'),
	'content_element' => true,
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Title', 'munio'),
			'description' => '',
			'param_name' => 'title',
			'value' => 'Accordion Item Title',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Content', 'munio'),
			'param_name' => 'content',
			'value' => esc_html__('Content goes here', 'munio'),
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_accordion_item extends WPBakeryShortCode {}}

vc_map( array(
	'name' => 'Icon Service',
	'base' => 'service',
	'icon' => 'icon-vc-clapat-munio',
	'is_container' => 'true',
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Service Box', 'munio'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Icon', 'munio'),
			'description' => esc_html__('Icon displayed within service box. Type in the class of the icon in this edit box. The complete and latest list: http://fortawesome.github.io/Font-Awesome/icons/', 'munio'),
			'param_name' => 'icon',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Service Title', 'munio'),
			'description' => esc_html__('Title of the service', 'munio'),
			'param_name' => 'title',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Content', 'munio'),
			'param_name' => 'content',
			'value' => esc_html__('Content goes here', 'munio'),
		),
	)
) );

vc_map( array(
	'name' => 'Contact Info Box',
	'base' => 'contact_box',
	'icon' => 'icon-vc-clapat-munio',
	'is_container' => 'true',
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Contact Info  Box', 'munio'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Icon', 'munio'),
			'description' => esc_html__('Icon displayed within contact info box. Type in the class of the icon in this edit box. The complete and latest list: http://fortawesome.github.io/Font-Awesome/icons/', 'munio'),
			'param_name' => 'icon',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Title', 'munio'),
			'description' => esc_html__('Title or header of the contact info box', 'munio'),
			'param_name' => 'title',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => esc_html__('Contact Info', 'munio'),
			'param_name' => 'content',
			'value' => esc_html__('Contact info goes here', 'munio'),
		),
	)
) );

vc_map( array(
	'name' => 'Map',
	'base' => 'munio_map',
	'icon' => 'icon-vc-clapat-munio',
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Adds a google map with settings from theme options.', 'munio'),
	'show_settings_on_create' => false
) );

vc_map( array(
	'name' => 'Normal Image Slider',
	'base' => 'general_slider',
	'icon' => 'icon-vc-clapat-munio',
	'as_parent' => array('only' => 'general_slide'),'category' => esc_html__('Munio - Sliders', 'munio'),
	'description' => esc_html__('Normal Image Slider', 'munio'),
	'content_element' => true,
	'show_settings_on_create' =>true,
	"params" => array(
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_general_slider extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Slide',
	'base' => 'general_slide',
	'icon' => 'icon-vc-clapat-munio',
	'as_child' => array('only' => 'general_slider' ),'category' => esc_html__('Munio - Sliders', 'munio'),
	'description' => esc_html__('Slide', 'munio'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Slider Image', 'munio'),
			'description' => esc_html__('Image representing this slide', 'munio'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Image ALT', 'munio'),
			'description' => esc_html__('The ALT attribute specifies an alternate text for an image, if the image cannot be displayed', 'munio'),
			'param_name' => 'alt',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_general_slide extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Carousel Image Slider',
	'base' => 'carousel_slider',
	'icon' => 'icon-vc-clapat-munio',
	'as_parent' => array('only' => 'carousel_slide'),'category' => esc_html__('Munio - Sliders', 'munio'),
	'description' => esc_html__('Carousel Image Slider', 'munio'),
	'content_element' => true,
	'show_settings_on_create' =>true,
	"params" => array(
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_carousel_slider extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Carousel Slide',
	'base' => 'carousel_slide',
	'icon' => 'icon-vc-clapat-munio',
	'as_child' => array('only' => 'carousel_slider' ),
	'category' => esc_html__('Munio - Sliders', 'munio'),
	'description' => esc_html__('Carousel Slide', 'munio'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Slider Image', 'munio'),
			'description' => esc_html__('Image representing this slide', 'munio'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Image ALT', 'munio'),
			'description' => esc_html__('The ALT attribute specifies an alternate text for an image, if the image cannot be displayed', 'munio'),
			'param_name' => 'alt',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_carousel_slide extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Image Collage',
	'base' => 'clapat_collage',
	'icon' => 'icon-vc-clapat-munio',
	'as_parent' => array('only' => 'clapat_collage_image'),
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Collage with image popup', 'munio'),
	'content_element' => true,
	'show_settings_on_create' => true,
	"params" => array(
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_clapat_collage extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Collage Image',
	'base' => 'clapat_collage_image',
	'icon' => 'icon-vc-clapat-munio',
	'as_child' => array('only' => 'clapat_collage' ),
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Collage Image', 'munio'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Collage Image Thumbnail', 'munio'),
			'description' => esc_html__('Thumbnail image representing this ollage item, included in carousel and linking a high res version.', 'munio'),
			'param_name' => 'thumb_img_id',
			'value' => '',
		),
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Collage Image', 'munio'),
			'description' => esc_html__('Image representing this collage item opening in a popup', 'munio'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Image ALT', 'munio'),
			'description' => esc_html__('The ALT attribute specifies an alternate text for an image, if the image cannot be displayed', 'munio'),
			'param_name' => 'alt',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Collage Image Caption', 'munio'),
			'description' => esc_html__('The caption of this collage item', 'munio'),
			'param_name' => 'info',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_clapat_collage_image extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Popup Image',
	'base' => 'clapat_popup_image',
	'icon' => 'icon-vc-clapat-munio',
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Image Popup', 'munio'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Zoomed Image', 'munio'),
			'description' => esc_html__('Zoomed image - usually a higher res image', 'munio'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Thumbnail Image', 'munio'),
			'description' => esc_html__('The thumbnail', 'munio'),
			'param_name' => 'thumb_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_clapat_popup_image extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Captioned Image',
	'base' => 'clapat_captioned_image',
	'icon' => 'icon-vc-clapat-munio',
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Captioned Image', 'munio'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Image', 'munio'),
			'description' => esc_html__('The image', 'munio'),
			'param_name' => 'img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('ALT', 'munio'),
			'description' => esc_html__('ALT attribute.', 'munio'),
			'param_name' => 'alt',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Caption', 'munio'),
			'description' => esc_html__('Image caption.', 'munio'),
			'param_name' => 'caption',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_clapat_captioned_image extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Testimonials',
	'base' => 'testimonials',
	'icon' => 'icon-vc-clapat-munio',
	'as_parent' => array('only' => 'testimonial'),
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Testimonials Carousel', 'munio'),
	'content_element' => true,
	'show_settings_on_create' => true,
	"params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_testimonials extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Testimonial',
	'base' => 'testimonial',
	'icon' => 'icon-vc-clapat-munio',
	'as_child' => array('only' => 'testimonials' ),
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Testimonial', 'munio'),
	'params' => array(
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Name', 'munio'),
			'description' => esc_html__('Name of the person or company this testimonial belongs to.', 'munio'),
			'param_name' => 'name',
			'value' => '',
		),
		array(
			'type' => 'textarea_html',
			'holder' => 'div',
			'heading' => __('Content', 'munio'),
			'param_name' => 'content',
			'value' => __('Content goes here', 'munio'),
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_testimonial extends WPBakeryShortCode {}}


vc_map( array(
	'name' => 'Clients',
	'base' => 'clients',
	'icon' => 'icon-vc-clapat-munio',
	'as_parent' => array('only' => 'client_item'),
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Clients List', 'munio'),
	'content_element' => true,
	'show_settings_on_create' => true,
	"params" => array(
        // add params same as with any other content element
        array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
    ),
	'js_view' => 'VcColumnView'
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {class WPBakeryShortCode_clients extends WPBakeryShortCodesContainer {}}

vc_map( array(
	'name' => 'Client',
	'base' => 'client_item',
	'icon' => 'icon-vc-clapat-munio',
	'as_child' => array('only' => 'clients' ),
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Client Logo or Image', 'munio'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Client Logo or Image', 'munio'),
			'description' => esc_html__('The client logo', 'munio'),
			'param_name' => 'img_id',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_client_item extends WPBakeryShortCode {}}

vc_map( array(
	'name' => 'Video Hosted',
	'base' => 'munio_video',
	'icon' => 'icon-vc-clapat-munio',
	'category' => esc_html__('Munio - Elements', 'munio'),
	'description' => esc_html__('Self hosted video', 'munio'),
	'params' => array(
		array(
			'type' => 'attach_image',
			'holder' => 'div',
			'heading' => esc_html__('Cover Image', 'munio'),
			'description' => esc_html__('Cover image for still video', 'munio'),
			'param_name' => 'cover_img_id',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Webm URL', 'munio'),
			'description' => esc_html__('URL of the self hosted video in webm format', 'munio'),
			'param_name' => 'webm_url',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Mp4 URL', 'munio'),
			'description' => esc_html__('URL of the self hosted video in mp4 format', 'munio'),
			'param_name' => 'mp4_url',
			'value' => '',
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Extra Class Name', 'munio'),
			'description' => esc_html__('Add here any extra CSS class name(s). Separate multiple classes with space.', 'munio'),
			'param_name' => 'extra_class_name',
			'value' => '',
		),
	)
) );

if ( class_exists( 'WPBakeryShortCode' ) ) {class WPBakeryShortCode_munio_video extends WPBakeryShortCode {}}

} // if vc_map function exists
?>