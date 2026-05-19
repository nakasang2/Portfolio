<?php

// more widgets in the (near) future...

// Register widgetized locations
if(  !function_exists('munio_widgets_init') ){

    function munio_widgets_init(){

		$args = array( 'name'          	=> esc_html__( 'Blog Sidebar', 'munio' ),
								'id'           	=> 'munio-blog-sidebar',
								'description'  	=> '',
								'class'        	=> '',
								'before_widget'	=> '<div id="%1$s" class="widget munio-sidebar-widget %2$s">',
								'after_widget'  => '</div>',
								'before_title'  => '<h5 class="widgettitle munio-widgettitle">',
								'after_title'   => '</h5>' );
		
		register_sidebar( $args );
        
    }
}

add_action( 'widgets_init', 'munio_widgets_init' );

?>