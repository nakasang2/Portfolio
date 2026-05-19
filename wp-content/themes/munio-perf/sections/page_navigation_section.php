<?php

	$munio_page_nav_enable	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-enable-navigation' );
	$munio_page_nav_title	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-navigation-caption-title' );
	$munio_next_url			= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-navigation-next-url' );
	$munio_next_title		= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-navigation-next-title' );
	$munio_next_subtitle	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-navigation-next-subtitle' );
	
	if( $munio_page_nav_enable ){
?>
				<!-- Project Navigation --> 
                <div id="page-nav">
					<div class="next-page-wrap">
						<div class="next-page-title">
							<div class="inner">
								<div class="subtitle-info has-animation"><?php echo wp_kses_post( $munio_page_nav_title ); ?></div>
								<div class="has-animation" data-delay="150">
									<div class="scale-wrapper"><a class="page-title hide-ball next-ajax-link-page" data-type="page-transition" href="<?php echo esc_url( $munio_next_url	); ?>"><?php echo wp_kses_post( $munio_next_title ); ?></a></div>
								</div>
								<div class="subtitle-name"><?php echo wp_kses_post( $munio_next_subtitle ); ?></div>
                            </div>                   
                        </div>
					</div>
                </div>      
                <!--/Project Navigation -->
<?php } ?>