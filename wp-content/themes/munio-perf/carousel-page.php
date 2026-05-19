<?php
/*
Template name: Carousel Template
*/

get_header();

if ( have_posts() ){

the_post();

$munio_page_container_list = array();

$munio_showcase_tax_query = null;
$munio_showcase_category_filter	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-showcase-filter-category' );

if( !empty( $munio_showcase_category_filter ) ){
	
	$munio_array_terms = explode( ",", $munio_showcase_category_filter );
	$munio_showcase_tax_query = array(
										array(
											'taxonomy' 	=> 'portfolio_category',
											'field'    	=> 'slug',
											'terms'    	=> $munio_array_terms,
										),
									);
}
?>

		<!-- Main -->
		<div id="main">

			<!-- Main Content -->
			<div id="main-content">

				<!-- Showcase Holder -->
				<div id="showcase-holder" class="carousel-slider <?php if( munio_get_theme_options('clapat_munio_enable_ajax') ){ echo 'thumb-with-ajax'; } else { echo 'thumb-no-ajax'; } ?>"> 
					<div id="showcase-holder-wrap">
						<div id="showcase-tilt-wrap">
							<div id="showcase-tilt">
								<div id="showcase-carousel-slider" class="swiper-container">
									<div class="swiper-wrapper">
									<?php

									$munio_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$munio_args = array(
												'post_type' => 'munio_portfolio',
												'paged' => $munio_paged,
												'tax_query' => $munio_showcase_tax_query,
												'posts_per_page' => 1000,
												 );

									$munio_portfolio = new WP_Query( $munio_args );

									$munio_slides_count = 1;
									while( $munio_portfolio->have_posts() ){

										$munio_portfolio->the_post();
										
										$munio_showcase_include	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-showcase-include' );
										
										if( $munio_showcase_include == "yes" ){
										
											$munio_hero_properties = new MunioHeroProperties();
											$munio_hero_properties->getProperties( get_post_type( get_the_ID() ) );
											
											?>
											
											<!-- Section Slide -->
											<div class="swiper-slide" data-title="<?php echo esc_attr( $munio_hero_properties->caption_title ); ?>" data-subtitle="<?php echo esc_attr( $munio_hero_properties->caption_subtitle ); ?>" data-number="<?php echo esc_attr( sprintf("%02d", $munio_slides_count) ); ?>">
												<div class="img-mask">
													<div class="section-image" data-src="<?php echo esc_url( $munio_hero_properties->image['url'] ); ?>">
													<?php if( $munio_hero_properties->video ) { ?>
														<div class="hero-video-wrapper">
															<video loop muted class="bgvid">
																<?php if( !empty( $munio_hero_properties->video_mp4 ) ) { ?>
																<source src="<?php echo esc_url( $munio_hero_properties->video_mp4 ); ?>" type="video/mp4">
																<?php } ?>
																<?php if( !empty( $munio_hero_properties->video_webm ) ) { ?>
																<source src="<?php echo esc_url( $munio_hero_properties->video_webm ); ?>" type="video/webm">
																<?php } ?>
															</video>
														</div>
													<?php } ?>
													</div>
												</div>
												<div class="outer">
													<div class="inner">
														<div class="title-wrapper">
															<?php if( munio_get_theme_options('clapat_munio_enable_ajax') ){ ?>
															<a class="title hide-ball" data-type="page-transition" href="<?php the_permalink(); ?>">
															<?php } else { ?>
															<a  class="title hide-ball" href="<?php the_permalink(); ?>">
															<?php } ?>
															<?php echo wp_kses_post( $munio_hero_properties->caption_title ); ?><span><?php echo wp_kses_post( sprintf("%02d", $munio_slides_count) ); ?></span>
															</a>
														</div>
														<div class="subtitle-wrapper">
															<div class="subtitle"><?php echo wp_kses_post( $munio_hero_properties->caption_subtitle ); ?></div>
														</div>
													</div>
												</div>                                    
											</div>
											<!--/Section Slide -->
											
											<?php
											
											$munio_page_container_list[] = esc_url( $munio_hero_properties->image['url'] );
											
										}

										$munio_slides_count++;
									}

									wp_reset_postdata();
									
									munio_portfolio_images( $munio_page_container_list );
									?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="showcase-captions-wrap">                           
						<div class="showcase-captions"></div>
					</div>
				</div>
                <!-- Showcase Holder -->
				
			</div>
			<!-- /Main Content -->

		</div>
        <!--/Main -->

<?php

}

get_footer();

?>
