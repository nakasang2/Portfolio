<?php 

get_header(); 

?>
	
		<!-- Hero --> 
        <div id="hero" class="error">
			<div id="hero-styles">
				<!-- Hero Caption -->
                <div id="hero-caption">
					<div class="inner text-align-center">
						<div class="404caption">
							<div class="error-title"><?php echo wp_kses( munio_get_theme_options('clapat_munio_error_title'), wp_kses_allowed_html( 'post' ) ); ?></div>
							<div class="error-subtitle"><?php echo wp_kses_post ( munio_get_theme_options('clapat_munio_error_info') ); ?></div>
                                
                            <a class="button-box ajax-link" href="<?php echo esc_url( munio_get_theme_options('clapat_munio_error_back_button_url') ); ?>" data-type="page-transition">             
                                <div class="clapat-button-wrap parallax-wrap hide-ball">
                                    <div class="clapat-button parallax-element">
                                        <div class="button-border rounded outline parallax-element-second">
                                        	<span data-hover="<?php echo esc_attr( munio_get_theme_options('clapat_munio_error_back_button_hover_caption') ); ?>"><?php echo wp_kses_post( munio_get_theme_options('clapat_munio_error_back_button') ); ?></span>
                                        </div>
                                    </div>
                                </div> 
                            </a>
                            
						</div>
		            </div>
                </div>
                <!--/Hero Caption -->
			</div>
		</div>
		<!-- /Hero --> 

<?php 

get_footer(); 

?>