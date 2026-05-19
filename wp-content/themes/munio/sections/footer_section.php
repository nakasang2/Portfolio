			<!-- Footer -->
			<?php if( is_page_template('showcase-page.php') || is_page_template('carousel-page.php') ){ ?>
			</div>
			
			<footer class="fixed">
			<?php } else { ?>
			<footer class="hidden">
			<?php } ?>
                <div id="footer-container">
                	
					<?php if( munio_get_theme_options( 'clapat_munio_enable_back_to_top' ) ){  ?>
						<?php if( !is_page_template('carousel-page.php') && !is_page_template('showcase-page.php') ){ ?>
                    <div id="backtotop" class="button-wrap left">
						<div class="icon-wrap parallax-wrap">
							<div class="button-icon parallax-element">
								<i class="fa fa-angle-up"></i>
							</div>
						</div>
						<div class="button-text"><span data-hover="<?php echo esc_attr( munio_get_theme_options( 'clapat_munio_back_to_top_caption' ) ); ?>"><?php echo wp_kses_post( munio_get_theme_options( 'clapat_munio_back_to_top_caption' ) ); ?></span></div> 
					</div>
						<?php } ?>
					<?php } ?>
					
					<?php if( is_page_template('carousel-page.php') || is_page_template('showcase-page.php') ){ ?>
					<div class="arrows-wrap">
                        <div class="prev-wrap parallax-wrap"><div class="swiper-button-prev swiper-button-white parallax-element"></div></div>
                        <div class="next-wrap parallax-wrap"><div class="swiper-button-next swiper-button-white parallax-element"></div></div>
                    </div>
					<?php } ?>
					
					<div class="footer-middle">
						<?php if( !is_page_template('carousel-page.php') && !is_page_template('showcase-page.php') ){ ?>
							<div class="copyright">&copy; <?php echo esc_html( date( 'Y' ) ); ?> Yusuke Nakamae</div>
						<?php } else { ?>
							<div class="showcase-subtitles-wrap"></div>
						<?php }  ?>
                    </div>
					
					<?php get_template_part('sections/footer_social_links_section'); ?>
                                        
                </div>
            </footer>
            <!--/Footer -->
			
			<?php if( !is_page_template('showcase-page.php') && !is_page_template('carousel-page.php') ){ ?>
			</div>
			<?php } ?>
			
			<?php if ( is_singular('munio_portfolio') ){
				
				$munio_next_project_image = munio_portfolio_next_project_image();
			?>
			<div class="next-project-image">
                <div class="next-project-image-bg" style="background-image:url(<?php echo esc_url( $munio_next_project_image ); ?>)"></div>
            </div>
			<?php } ?>
			
			<?php if( is_page_template('portfolio-page.php') || is_page_template('portfolio-mixed-page.php') || is_tax('portfolio_category') ){ ?>
			<div class="thumb-container">
				<?php
					$munio_page_container_list = munio_portfolio_images();
					foreach( $munio_page_container_list as $munio_page_container_item ){
						echo '<div class="thumb-page" data-src="' . esc_url( $munio_page_container_item ) . '"></div>';
					}
				?>
            </div>
			<?php } ?>