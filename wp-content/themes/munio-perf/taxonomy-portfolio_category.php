<?php
// archive template for portfolio categories

get_header();

$munio_page_container_list = array();
?>
				
		<!-- Main -->
		<div id="main">
		
			<!-- Hero Section -->
			<div id="hero">
				<div id="hero-styles" class="parallax-onscroll">
					<div id="hero-caption">
						<div class="inner">
							<div class="scale-wrapper"><div class="hero-title"><?php single_cat_title(); ?></div></div>
						</div>
					</div>
				</div>
			</div>
			<!--/Hero Section -->

			<!-- Main Content -->
			<div id="main-content">
				<div id="main-page-content">
				
					<!-- Portfolio Wrap - Classic -->
                    <div class="portfolio-wrap grid-portfolio">                
                        <!-- Portfolio Columns -->
                        <div class="portfolio centered-caption <?php if( munio_get_theme_options('clapat_munio_enable_ajax') ){ echo 'thumb-with-ajax'; } else { echo 'thumb-no-ajax'; } ?>">
						<?php

							while( have_posts() ){

								the_post();
								
								get_template_part('sections/portfolio_section_item');
								
								$munio_item_full_image = munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-hero-img' );

								if( $munio_item_full_image && isset( $munio_item_full_image['url'] ) ){
								
									$munio_page_container_list[] = $munio_item_full_image['url'];
								}
								
							}
							
							wp_reset_postdata();
							
							munio_portfolio_images( $munio_page_container_list );
						?>
						</div>
					</div>
					<!--/Portfolio -->
					
				</div>
                <!--/Main Page Content -->
			</div>
			<!-- /Main Content -->
		</div>
        <!--/Main -->
<?php
	
get_footer();

?>