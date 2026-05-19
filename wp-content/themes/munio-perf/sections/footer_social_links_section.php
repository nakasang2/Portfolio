<?php

if( !function_exists('munio_render_footer_social_links' ) )
{
	function munio_render_footer_social_links(){

		global $munio_social_links_icons;
		$munio_social_links = "";
		for( $idx = 1; $idx <= MUNIO_MAX_SOCIAL_LINKS; $idx++ ){

			$social_name = munio_get_theme_options( 'clapat_munio_footer_social_' . $idx );
			$social_url  = munio_get_theme_options( 'clapat_munio_footer_social_url_' . $idx );

			if( $social_url ){

				if( munio_get_theme_options( 'clapat_munio_social_links_icons' ) ){
					
					$munio_social_links .= '<li><span class="parallax-wrap"><a class="parallax-element" href="' . esc_url( $social_url ) . '" target="_blank"><i class="fa fa-'. esc_attr( $munio_social_links_icons[ $social_name ] ) . '"></i></a></span></li>';
				}
				else {
					
					$munio_social_links .= '<li><span class="parallax-wrap"><a class="parallax-element" href="' . esc_url( $social_url ) . '" target="_blank">' . wp_kses_post( $social_name ) . '</a></span></li>';
				}

			}

		}
		
		if( !empty( $munio_social_links ) ){
?>
						<div class="socials-wrap">            	
							<div class="socials-icon"><i class="fa fa-share-alt" aria-hidden="true"></i></div>
							<div class="socials-text"><?php echo wp_kses_post( munio_get_theme_options('clapat_munio_footer_social_links_prefix') ); ?></div>
							<ul class="socials">
								<?php echo wp_kses_post( $munio_social_links ); ?>
							</ul>
						</div>
<?php			
		
		}

	}
}

munio_render_footer_social_links();

?>
