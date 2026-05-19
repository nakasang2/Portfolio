/**
 * Munio Shortcodes Gutenberg Blocks
 *
 */
( function( blocks, blockEditor, i18n, element, components ) {
	var el = element.createElement;
	var __ = i18n.__;
	var RichText = blockEditor.RichText;
	var PlainText = blockEditor.PlainText;
	var MediaPlaceHolder = blockEditor.MediaPlaceHolder;
	var TextControl = components.TextControl;
	var TextareaControl = components.TextareaControl;
	var RangeControl = components.RangeControl;
	var ColorPaletteControl = components.ColorPalette;
	var SelectControl = components.SelectControl;
	var InspectorControls = blockEditor.InspectorControls;
	var MediaUpload = blockEditor.MediaUpload;
	var InnerBlocks = blockEditor.InnerBlocks;
	var AlignmentToolbar = blockEditor.AlignmentToolbar;
	var BlockControls = blockEditor.BlockControls;
 	
	/** Utils **/
	function normalizeUndef( x ){
		
		if (typeof x === 'undefined'){
			
			 return '';
		}
		else{
			
			return x;
		}
	}
	
	/** Container **/
	blocks.registerBlockType( 'munio-gutenberg/container', {
		title: __( 'Munio: Container', 'munio-gutenberg' ),
		icon: 'analytics',
		category: 'layout',
		attributes: {
			background_color: {
				type: 'string',
				default: '#f2f2f2'
			},
			padding_top: {
				type: 'number',
				default: 0
			},
			padding_bottom: {
				type: 'number',
				default: 0
			},
			padding_left: {
				type: 'number',
				default: 0
			},
			padding_right: {
				type: 'number',
				default: 0
			},
			alignment: {
				type: 'string',
				default: 'left'
			},
		}, 
		
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ), __( 'container', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			const colors = [ 
				{ name: 'Default', color: '#f2f2f2' }, 
				{ name: 'White', color: '#ffffff' }, 
				{ name: 'Light Grey', color: '#bbbbbb' }, 
				{ name: 'Dark Grey', color: '#555555' }, 
				{ name: 'Black', color: '#000' },
			];
			
			function onChangeAlignment( newAlignment ) {
				props.setAttributes( { alignment: newAlignment === undefined ? 'none' : newAlignment } );
			}
			
			return	[ el( BlockControls,
							{ key: 'controls' },
							el(
								AlignmentToolbar,
								{
									value: props.attributes.alignment,
									onChange: onChangeAlignment,
								}
							)
						),
						el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-container'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Munio Container', 'munio-gutenberg' )),
							el( InnerBlocks, {} ),
							/*
							 * InspectorControls lets you add controls to the Block sidebar.
							 */
							el( InspectorControls, {},
								el( 'div', { className: 'components-panel__body is-opened' }, 
									el( 'strong', {}, __('Select Background Color:',  'munio-gutenberg') ),
									el( 'div', { className : 'clapat-color-palette' },
										el( ColorPaletteControl, {
											colors: colors,
											value: props.attributes.background_color,
											onChange: ( value ) => { 
												props.setAttributes( { background_color: value === undefined ? 'transparent' : value } ); 
											},
										} )
									),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Top (in pixels)',  'munio-gutenberg'),
											value: props.attributes.padding_top,
											onChange: ( value ) => { 
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_top: value } ); 
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Bottom (in pixels)',  'munio-gutenberg'),
											value: props.attributes.padding_bottom,
											onChange: ( value ) => {
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_bottom: value } ); 
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Left (in pixels)',  'munio-gutenberg'),
											value: props.attributes.padding_left,
											onChange: ( value ) => {
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_left: value } );
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) ),
									el( 'div', { className : 'clapat-range-control' }, 
										el( RangeControl, {
											label: __('Padding Right (in pixels)',  'munio-gutenberg'),
											value: props.attributes.padding_right,
											onChange: ( value ) => {
												if (typeof value === "undefined") return;
												props.setAttributes( { padding_right: value } );
											},
											type: 'number',
											step: 10,
											min: 0,
											max: 100
										} ) )
									)
								)
							) ];
		},

		save: function( props ) {
			
			return el( 'div', 
							{ 
								className: props.className,
								style : {
									'background-color': props.attributes.background_color,
									'padding-top': (props.attributes.padding_top !== 0) ? props.attributes.padding_top + 'px' : null,
									'padding-bottom': (props.attributes.padding_bottom !== 0) ? props.attributes.padding_bottom + 'px' : null,
									'padding-left': (props.attributes.padding_left !== 0) ? props.attributes.padding_left + 'px' : null,
									'padding-right': (props.attributes.padding_right !== 0) ? props.attributes.padding_right + 'px' : null,
									'text-align': props.attributes.alignment
								}
							}, InnerBlocks.Content() );
	
		},
	} );
	
	/** Button **/
	blocks.registerBlockType( 'munio-gutenberg/button', {
		title: __( 'Munio: Button', 'munio-gutenberg' ),
		icon: 'editor-removeformatting',
		category: 'layout',
		attributes: {
			caption: {
				type: 'string',
				default: __( 'Caption', 'munio-gutenberg' )
			},
			hover_caption: {
				type: 'string',
				default: __( 'Hover Caption', 'munio-gutenberg' )
			},
			link: {
				type: 'string',
				default: 'http://'
			},
			target: {
				type: 'string',
				default: '_blank'
			},
			type: {
				type: 'string',
				default: 'normal'
			},
			rounded: {
				type: 'string',
				default: 'yes'
			},
		},
		
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ), __( 'button', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				 el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
						el( 'h4', { className: 'clapat-editor-block-title' }, __('Munio Button', 'munio-gutenberg' )),
						
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.caption,
							onChange: ( value ) => { props.setAttributes( { caption: value } ); },
						}),
						el( PlainText,
						{
							className: 'clapat-inline-caption',
							value: props.attributes.hover_caption,
							onChange: ( value ) => { props.setAttributes( { hover_caption: value } ); },
						}),
						el( PlainText,
						{
							className: 'clapat-inline-content',
							value: props.attributes.link,
							onChange: ( value ) => { props.setAttributes( { link: value } ); },
						}),
						
						/*
						 * InspectorControls lets you add controls to the Block sidebar.
						 */
						el( InspectorControls, {},
							el( 'div', { className: 'components-panel__body is-opened' }, 
								el( SelectControl, {
									label: __('Type', 'munio-gutenberg'),
									value: props.attributes.type,
									options : [
										{ label: __('Normal', 'munio-gutenberg'), value: 'normal' },
										{ label: __('Outline',  'munio-gutenberg'), value: 'outline' },
									],
									onChange: ( value ) => { props.setAttributes( { type: value } ); },
								} ),
								el( SelectControl, {
									label: __('Rounded', 'munio-gutenberg'),
									value: props.attributes.rounded,
									options : [
										{ label: __('Yes', 'munio-gutenberg'), value: 'yes' },
										{ label: __('No',  'munio-gutenberg'), value: 'no' },
									],
									onChange: ( value ) => { props.setAttributes( { rounded: value } ); },
								} ),
								el( SelectControl, {
									label: __('Link Target', 'munio-gutenberg'),
									value: props.attributes.target,
									options: [
										{ label: 'Blank', value: '_blank' },
										{ label: 'Self', value: '_self' },
									],
									onChange: ( value ) => { props.setAttributes( { target: value } ); },
								} ),
							),
						),
					)
			]
		},
		save: function( props ) {
		
			return '[button link="' + props.attributes.link + '" target="' + props.attributes.target + '" hover_caption="' + props.attributes.hover_caption + '" type="' + props.attributes.type + '" rounded="' + props.attributes.rounded + '" extra_class_name=""]' + props.attributes.caption + '[/button]'; 
		},
	} );
	
	/** Title **/
	blocks.registerBlockType( 'munio-gutenberg/title', {
		title: __( 'Munio: Title', 'munio-gutenberg' ),
		icon: 'editor-textcolor',
		category: 'layout',
		attributes: {
			caption: {
				type: 'string',
				default: 'Title'
			},
			size: {
				type: 'string',
				default: 'h1'
			},
			underline: {
				type: 'string',
				default: 'no'
			},
			big: {
				type: 'string',
				default: 'no'
			}
		},
		
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ), __( 'title', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			if( props.attributes.underline == 'yes'){
				
				props.className = 'title-has-line';
			}
			if( props.attributes.big == 'yes'){
				
				props.className += ' big-title';
			}
			
			return [
				
				 el(  props.attributes.size, { className: props.className }, props.attributes.caption ),
				 
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __('Caption', 'munio-gutenberg'),
							value: props.attributes.caption,
							onChange: ( value ) => { props.setAttributes( { caption: value } ); },
						} ),
						el( SelectControl, {
							label: __('Size', 'munio-gutenberg'),
							value: props.attributes.size,
							options: [
								{ label: 'H1', value: 'h1' },
								{ label: 'H2', value: 'h2' },
								{ label: 'H3', value: 'h3' },
								{ label: 'H4', value: 'h4' },
								{ label: 'H5', value: 'h5' },
								{ label: 'H6', value: 'h6' },
							],
							onChange: ( value ) => { props.setAttributes( { size: value } ); },
						} ),
						el( SelectControl, {
							label: __('Underline',  'munio-gutenberg'),
							value: props.attributes.underline,
							options : [
								{ label: __('Yes',  'munio-gutenberg'), value: 'yes' },
								{ label: __('No',  'munio-gutenberg'), value: 'no' },
							],
							onChange: ( value ) => { props.setAttributes( { underline: value } ); },
						} ),
						el( SelectControl, {
							label: __('Big', 'munio-gutenberg'),
							value: props.attributes.big,
							options: [
								{ label: __('Yes',  'munio-gutenberg'), value: 'yes' },
								{ label: __('No',  'munio-gutenberg'), value: 'no' },
							],
							onChange: ( value ) => { props.setAttributes( { big: value } ); },
						} ),
					),
				),
			]
		},
		save: function( props ) {
			
			if( props.attributes.underline == 'yes'){
				
				props.className = 'title-has-line';
			}
			if( props.attributes.big == 'yes'){
				
				props.className += ' big-title';
			}
			
			return el(  props.attributes.size, { className: props.className }, props.attributes.caption );
		},
	} );

	/** Accordion **/
	const template_clapat_accordion = [
	  [ 'munio-gutenberg/accordion-item', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'munio-gutenberg/accordion', {
		title: __( 'Munio: Accordion', 'munio-gutenberg' ),
		icon: 'editor-justify',
		category: 'layout',
		allowedBlocks: ['munio-gutenberg/accordion-item'],

		keywords: [ __( 'clapat', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ), __( 'accordion', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Munio Accordion', 'clapat-blog-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['munio-gutenberg/accordion-item'], template: template_clapat_accordion} )
						);

		},

		save: function( props ) {
			
			return el( 'dl', { className: 'accordion ' + props.className }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'munio-gutenberg/accordion-item', {
		title: __( 'Munio: Accordion Item', 'munio-gutenberg' ),
		icon: 'editor-justify',
		category: 'layout',
		parent: [ 'munio-gutenberg/accordion' ],

		attributes: {
			title: {
				type: 'string',
				default: __( 'Accordion Title. Click to edit it.', 'munio-gutenberg')
			},
			content: {
				type: 'string',
				default: __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non est nec orci ultricies fringilla. Nam ultrices sem in odio scelerisque, sed mollis magna tincidunt.', 'munio-gutenberg')
			}
		},

		edit: function( props ) {
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.title,
						onChange: ( value ) => { props.setAttributes( { title: value } ); },
					}),
					
					el( PlainText, {
						className: 'clapat-inline-content',
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					} ),
				),
				
			];
		},

		save: function( props ) {
			
			return '[accordion_item title="' + props.attributes.title + '"]' + props.attributes.content + '[/accordion_item]'; 

		},
	} );
	
	/** Icon Service **/
	blocks.registerBlockType( 'munio-gutenberg/icon-service', {
		title: __( 'Munio: Icon Service', 'munio-gutenberg' ),
		icon: 'editor-justify',
		category: 'layout',
		attributes: {
			icon: {
				type: 'string',
				default: __( 'fa fa-cogs', 'munio-gutenberg')
			},
			title: {
				type: 'string',
				default: __( 'Icon Service Title. Click to edit it.', 'munio-gutenberg')
			},
			content: {
				type: 'string',
				default: __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non est nec orci ultricies fringilla. Nam ultrices sem in odio scelerisque, sed mollis magna tincidunt.', 'munio-gutenberg')
			},
			
		},
		
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ),  __( 'icon', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Munio Icon Box', 'munio-gutenberg' ) ),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.icon,
						onChange: ( value ) => { props.setAttributes( { icon: value } ); },
					}),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.title,
						onChange: ( value ) => { props.setAttributes( { title: value } ); },
					}),
					
					el( PlainText, {
						className: 'clapat-inline-content',
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					} ),
					
				),
				 
			]
		},
		save: function( props ) {
			
			return '[service icon="' + props.attributes.icon + '" title="' + props.attributes.title + '" extra_class_name=""]' + props.attributes.content + '[/service]'; 
		},
	} );
	
	/** Contact Box **/
	blocks.registerBlockType( 'munio-gutenberg/contact-box', {
		title: __( 'Munio: Contact Box', 'munio-gutenberg' ),
		icon: 'phone',
		category: 'layout',
		attributes: {
			icon: {
				type: 'string',
				default: __( 'fa fa-envelope', 'munio-gutenberg')
			},
			title: {
				type: 'string',
				default: __( 'Contact Box Title. Click to edit it.', 'munio-gutenberg')
			},
			content: {
				type: 'string',
				default: __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non est nec orci ultricies fringilla. Nam ultrices sem in odio scelerisque, sed mollis magna tincidunt.', 'munio-gutenberg')
			},
			
		},
		
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ),  __( 'contact', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Munio Icon Box', 'munio-gutenberg' ) ),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.icon,
						onChange: ( value ) => { props.setAttributes( { icon: value } ); },
					}),
					
					el( PlainText,
					{
						className: 'clapat-inline-caption',
						value: props.attributes.title,
						onChange: ( value ) => { props.setAttributes( { title: value } ); },
					}),
					
					el( PlainText, {
						className: 'clapat-inline-content',
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					} ),
					
				),
				 
			]
		},
		save: function( props ) {
			
			return '[contact_box icon="' + props.attributes.icon + '" title="' + props.attributes.title + '" extra_class_name=""]' + props.attributes.content + '[/contact_box]'; 
		},
	} );
	
	/** Image Collage **/
	const template_clapat_collage = [
	  [ 'munio-gutenberg/collage-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'munio-gutenberg/collage', {
		title: __( 'Munio: Collage', 'munio-gutenberg' ),
		icon: 'layout',
		category: 'layout',
		allowedBlocks: ['munio-gutenberg/collage-image'],
		
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ), __( 'collage', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-collage'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Munio Collage', 'munio-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['munio-gutenberg/collage-image'], template: template_clapat_collage} )
						);

		},

		save: function( props ) {
			
			return el( 'div', {id: 'justified-grid', className: props.className }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'munio-gutenberg/collage-image', {
		title: __( 'Munio: Collage Image', 'munio-gutenberg' ),
		icon: 'format-image',
		category: 'layout',
		parent: [ 'munio-gutenberg/collage' ],

		attributes: {
			thumb_image: {
				type: 'string',
				default: ''
			},
			thumb_image_id: {
				type: 'number',
			},
			full_image: {
				type: 'string',
				default: ''
			},
			full_image_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
			info: {
				type: 'string',
				default: __( 'Caption Text', 'munio-gutenberg' )
			},
		},

		edit: function( props ) {
			
			var onSelectThumbnailImage = function( media ) {
				return props.setAttributes( {
					thumb_image: media.url,
					thumb_image_id: media.id,
				} );
			};
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					full_image: media.url,
					full_image_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectThumbnailImage,
							type: 'image',
							value: props.attributes.thumb_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.thumb_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.thumb_image_id ? i18n.__( 'Upload Collage Thumbnail Image', 'munio-gutenberg' ) : el( 'img', { src: props.attributes.thumb_image } ),
									el ('p', {}, __( 'Thumb Image', 'munio-gutenberg' ) )
								);
							}
						} )
					),
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.full_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.full_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.full_image_id ? i18n.__( 'Upload Collage Full Image', 'munio-gutenberg' ) : el( 'img', { src: props.attributes.full_image } ),
									el ('p', {}, __( 'Full Image', 'munio-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'munio-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
						
						el( TextControl, {
							label: __( 'Collage Image Info', 'munio-gutenberg' ),
							value: props.attributes.info,
							onChange: ( value ) => { props.setAttributes( { info: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[clapat_collage_image thumb_img_url="' + props.attributes.thumb_image + '" img_url="' + props.attributes.full_image + '" alt="' + props.attributes.alt + '" info="' + props.attributes.info + '"][/clapat_collage_image]'; 

		},
	} );
	
	/** Image Carousel **/
	const template_clapat_image_carousel = [
	  [ 'munio-gutenberg/carousel-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'munio-gutenberg/carousel', {
		title: __( 'Munio: Image Carousel', 'munio-gutenberg' ),
		icon: 'slides',
		category: 'layout',
		allowedBlocks: ['munio-gutenberg/carousel-image'],
		
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ), __( 'carousel', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-carousel'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Munio Carousel', 'munio-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['munio-gutenberg/carousel-image'], template: template_clapat_image_carousel} )
						);

		},

		save: function( props ) {
			
			return el( 'div', { className: 'carousel' }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'munio-gutenberg/carousel-image', {
		title: __( 'Munio: Carousel Image', 'munio-gutenberg' ),
		icon: 'format-image',
		category: 'layout',
		parent: [ 'munio-gutenberg/carousel' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Carousel Image', 'munio-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('p', {}, __( 'Carousel Image', 'munio-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'munio-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[carousel_slide img_url="' + props.attributes.img_url + '" alt="' + props.attributes.alt + '"][/carousel_slide]'; 

		},
	} );
	
	/** Image Slider **/
	const template_clapat_image_slider = [
	  [ 'munio-gutenberg/slider-image', {} ], // [ blockName, attributes ]
	];
	
	blocks.registerBlockType( 'munio-gutenberg/slider', {
		title: __( 'Munio: Image Slider', 'munio-gutenberg' ),
		icon: 'images-alt2',
		category: 'layout',
		allowedBlocks: ['munio-gutenberg/slider-image'],
		
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ), __( 'slider', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper clapat-editor-slider'},
							el( 'h4', { className: 'clapat-editor-block-title' }, __('Munio Slider', 'munio-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['munio-gutenberg/slider-image'], template: template_clapat_image_slider} )
						);

		},

		save: function( props ) {
			
			return el( 'div', { className: 'slider' }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'munio-gutenberg/slider-image', {
		title: __( 'Munio: Slider Image', 'munio-gutenberg' ),
		icon: 'format-image',
		category: 'layout',
		parent: [ 'munio-gutenberg/slider' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
			alt: {
				type: 'string',
				default: ''
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Slider Image', 'munio-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('p', {}, __( 'Slider Image', 'munio-gutenberg' ) )
								);
							}
						} )
					),

				),
				/*
				 * InspectorControls lets you add controls to the Block sidebar.
				 */
				el( InspectorControls, {},
					el( 'div', { className: 'components-panel__body is-opened' }, 
						el( TextControl, {
							label: __( 'ALT attribute', 'munio-gutenberg' ),
							value: props.attributes.alt,
							onChange: ( value ) => { props.setAttributes( { alt: value } ); },
						} ),
					),
				),
			];
		},

		save: function( props ) {
			
			return '[general_slide img_url="' + props.attributes.img_url + '" alt="' + props.attributes.alt + '"][/general_slide]'; 

		},
	} );
		
	/** Popup Image **/
	blocks.registerBlockType( 'munio-gutenberg/popup-image', {
		title: __( 'Munio: Popup Image', 'munio-gutenberg' ),
		icon: 'format-image',
		category: 'layout',
		
		attributes: {
			thumb_image: {
				type: 'string',
				default: ''
			},
			thumb_image_id: {
				type: 'number',
			},
			full_image: {
				type: 'string',
				default: ''
			},
			full_image_id: {
				type: 'number',
			},
			
		},

		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ), __( 'popup', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			var onSelectThumbnailImage = function( media ) {
				return props.setAttributes( {
					thumb_image: media.url,
					thumb_image_id: media.id,
				} );
			};
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					full_image: media.url,
					full_image_id: media.id,
				} );
			};
				
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Clapat Popup Image', 'munio-gutenberg' )),
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectThumbnailImage,
							type: 'image',
							value: props.attributes.thumb_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.thumb_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.thumb_image_id ? i18n.__( 'Upload Popup Thumbnail Image', 'munio-gutenberg' ) : el( 'img', { src: props.attributes.thumb_image } ),
									el ('p', {}, __( 'Thumb Image', 'munio-gutenberg' ) )
								);
							}
						} )
					),
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.full_image_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.full_image_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.full_image_id ? i18n.__( 'Upload Popup Full Image', 'munio-gutenberg' ) : el( 'img', { src: props.attributes.full_image } ),
									el ('p', {}, __( 'Full Image', 'munio-gutenberg' ) )
								);
							}
						} )
					),

				),
				
			];
		},

		save: function( props ) {
			
			return '[clapat_popup_image img_url="' + props.attributes.full_image + '" thumb_url="' + props.attributes.thumb_image + '" extra_class_name=""][/clapat_popup_image]'; 

		},
	} );
	
	/** Testimonials **/
	const template_clapat_testimonials = [
	  [ 'munio-gutenberg/testimonial', {} ], // [ blockName, attributes ]
	];

	blocks.registerBlockType( 'munio-gutenberg/testimonials', {
		title: __( 'Munio: Testimonials', 'munio-gutenberg' ),
		icon: 'editor-quote',
		category: 'layout',
		allowedBlocks: ['munio-gutenberg/testimonial'],
	
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ), __( 'testimonial', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper'},
							el( 'h3', { className: 'clapat-editor-block-title' }, __( 'Munio Testimonials', 'munio-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['munio-gutenberg/testimonial'], template: template_clapat_testimonials } )
						);

		},

		save: function( props ) {
			
			return el( 'div', { className: 'text-carousel' }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'munio-gutenberg/testimonial', {
		title: __( 'Munio: Testimonial', 'munio-gutenberg' ),
		icon: 'editor-quote',
		category: 'layout',
		parent: [ 'munio-gutenberg/testimonials' ],

		attributes: {
			name: {
				type: 'string',
				default: __( 'Reviewer Name. Click to edit it.', 'munio-gutenberg' )
			},
			content: {
				type: 'string',
				default: __( 'This is a review placeholder. Click to edit it.', 'munio-gutenberg' )
			},
		},

		edit: function( props ) {
			
			var content = props.attributes.content;
			function onChangeContent( newContent ) {
				props.setAttributes( { content: newContent } );
			}
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h3', { className: 'clapat-editor-block-title' }, __( 'Munio - Testimonial', 'munio-gutenberg' )),
					
					el( PlainText,
					{
						value: props.attributes.content,
						onChange: ( value ) => { props.setAttributes( { content: value } ); },
					}),
					
					el( PlainText, {
						value: props.attributes.name,
						onChange: ( value ) => { props.setAttributes( { name: value } ); },
					} ),
					
				),
				
			];
		},

		save: function( props ) {
			
			return '[testimonial name="' + props.attributes.name + '"]' + props.attributes.content + '[/testimonial]'; 

		},
	} );
	
	/** Clients **/
	const template_clapat_clients = [
	  [ 'munio-gutenberg/client', {} ], // [ blockName, attributes ]
	];

	blocks.registerBlockType( 'munio-gutenberg/clients', {
		title: __( 'Munio: Clients', 'munio-gutenberg' ),
		icon: 'businessman',
		category: 'layout',
		allowedBlocks: ['munio-gutenberg/client'],
	
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ), __( 'client', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			return	el( 'div', { className: 'clapat-editor-block-wrapper'},
							el( 'h3', { className: 'clapat-editor-block-title' }, __( 'Munio Clients', 'munio-gutenberg' )),
							el( InnerBlocks, {allowedBlocks: ['munio-gutenberg/client'], template: template_clapat_clients } )
						);

		},

		save: function( props ) {
			
			return el( 'ul', { className: 'clients-table' }, InnerBlocks.Content() );
	
		},
	} );
	
	blocks.registerBlockType( 'munio-gutenberg/client', {
		title: __( 'Munio: Client', 'munio-gutenberg' ),
		icon: 'editor-quote',
		category: 'layout',
		parent: [ 'munio-gutenberg/clients' ],

		attributes: {
			img_url: {
				type: 'string',
				default: ''
			},
			img_id: {
				type: 'number',
			},
		},

		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					img_url: media.url,
					img_id: media.id,
				} );
			};
			
			return [
			
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'div', { className: 'clapat-editor-image' },
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: props.attributes.img_id,
							render: function( obj ) {
								return el( components.Button, {
										className: props.attributes.img_id ? 'clapat-image-added' : 'button button-large',
										onClick: obj.open
									},
									! props.attributes.img_id ? i18n.__( 'Upload Client Image', 'munio-gutenberg' ) : el( 'img', { src: props.attributes.img_url } ),
									el ('p', {}, __( 'Client Image', 'munio-gutenberg' ) )
								);
							}
						} )
					),
					
				),
				
			];
		},

		save: function( props ) {
			
			return '[client_item img_url="' + props.attributes.img_url + '"][/client_item]'; 

		},
	} );
	
	/** Hosted Video **/
	blocks.registerBlockType( 'munio-gutenberg/video-hosted', {
		title: __( 'Munio: Hosted Video', 'munio-gutenberg' ),
		icon: 'video-alt',
		category: 'layout',
		attributes: {
			cover_image: {
				type: 'string',
				default: ''
			},
			cover_image_id: {
				type: 'number',
			},
			webm_url: {
				type: 'string',
				default: 'http://'
			},
			mp4_url: {
				type: 'string',
				default: 'http://'
			},
			
		},
		
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ), __( 'video', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					cover_image: media.url,
					cover_image_id: media.id,
				} );
			};
			
			return [
				
				 el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
						el( 'h4', { className: 'clapat-editor-block-title' }, __('Munio Hosted Video', 'munio-gutenberg' )),
						
						el( 'div', { className: 'clapat-editor-image' },
							el( MediaUpload, {
								onSelect: onSelectImage,
								type: 'image',
								value: props.attributes.cover_image_id,
								render: function( obj ) {
									return el( components.Button, {
											className: props.attributes.cover_image_id ? 'clapat-image-added' : 'button button-large',
											onClick: obj.open
										},
										! props.attributes.cover_image_id ? i18n.__( 'Upload Video Cover Image', 'munio-gutenberg' ) : el( 'img', { src: props.attributes.cover_image } ),
										el ('p', {}, __( 'Cover Image', 'munio-gutenberg' ) )
									);
								}
							} ),
						),
						
						el ('p', { className: 'clapat-editor-label' }, __( 'MP4 video url:', 'munio-gutenberg' ) ),
						
						el( PlainText,
						{
							value: props.attributes.mp4_url,
							className: 'clapat-inline-content',
							onChange: ( value ) => { props.setAttributes( { mp4_url: value } ); },
						}),
						
						el ('p', { className: 'clapat-editor-label' }, __( 'Webm video url:', 'munio-gutenberg' ) ),
						
						el( PlainText,
						{
							value: props.attributes.webm_url,
							className: 'clapat-inline-content',
							onChange: ( value ) => { props.setAttributes( { webm_url: value } ); },
						}),
					)
			]
		},
		save: function( props ) {
			
			return '[munio_video cover_img_url="' + props.attributes.cover_image + '" mp4_url="' + props.attributes.mp4_url + '" webm_url="' + props.attributes.webm_url + '" extra_class_name=""][/munio_video]'; 
		},
	} );
	

	/** Google Map **/
	blocks.registerBlockType( 'munio-gutenberg/google-map', {
		title: __( 'Munio: Google Map', 'munio-gutenberg' ),
		icon: 'admin-site',
		category: 'layout',
		attributes: {	},
		
		keywords: [ __( 'munio', 'munio-gutenberg'), __( 'shortcode', 'munio-gutenberg' ),  __( 'map', 'munio-gutenberg' ) ],
		
		edit: function( props ) {
			
			return [
				
				el( 'div', { className: 'clapat-editor-block-wrapper'},  
					
					el( 'h4', { className: 'clapat-editor-block-title' }, __( 'Munio Google Map', 'munio-gutenberg' ) ),
					
					el( 'span', { className: 'clapat-inline-caption' },  __( 'Set google map properties in theme options - map.', 'munio-gutenberg' ) ),
				),
			]
		},
		save: function( props ) {
			
			return '[munio_map][/munio_map]'; 
		},
	} );
	
}(
	window.wp.blocks,
	window.wp.blockEditor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components
) );
