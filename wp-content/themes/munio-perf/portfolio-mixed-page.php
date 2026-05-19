<?php
/*
Template name: Portfolio Mixed Template
*/
get_header();

if ( have_posts() ){

the_post();

$munio_content_after	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-portfolio-mixed-content-position' );
$munio_portfolio_layout	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-portfolio-layout' );
$munio_max_items		= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-portfolio-mixed-items' );
if( empty($munio_max_items) ){
	$munio_max_items = 1000;
}

$munio_page_container_list = array();

$munio_portfolio_tax_query = null;
$munio_portfolio_category_filter	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-portfolio-filter-category' );

if( !empty( $munio_portfolio_category_filter ) ){
	
	$munio_array_terms = explode( ",", $munio_portfolio_category_filter );
	$munio_portfolio_tax_query = array(
										array(
											'taxonomy' 	=> 'portfolio_category',
											'field'		=> 'slug',
											'terms'		=> $munio_array_terms,
											),
									);
}
?>
				
		<!-- Main -->
		<div id="main">
		
		<?php
		
			// display hero section
			get_template_part('sections/hero_section'); 
		
		?>
			<!-- Main Content -->
			<div id="main-content">
				<div id="main-page-content">
				
					<?php 
						if( $munio_content_after == "before" ){
							the_content();
						} 
					?>
					
					<div id="show-filters" class="button-box has-animation" data-delay="100">             
                        <div class="clapat-button-wrap parallax-wrap hide-ball">
                            <div class="clapat-button parallax-element">
								<div class="button-border rounded outline parallax-element-second">
									<span data-hover="<?php echo esc_attr( munio_get_theme_options( 'clapat_munio_portfolio_show_filters_hover_caption' ) ); ?>">
										<?php echo wp_kses_post( munio_get_theme_options( 'clapat_munio_portfolio_show_filters_caption' ) ); ?>
									</span>
								</div>
                            </div>
                        </div> 
                    </div>
					
					<?php if( $munio_portfolio_layout == "classic" ){ ?>
					<!-- Portfolio Wrap -->
                    <div class="portfolio-wrap grid-portfolio">                
                        <!-- Portfolio Columns -->
                        <div class="portfolio centered-caption <?php if( munio_get_theme_options('clapat_munio_enable_ajax') ){ echo 'thumb-with-ajax'; } else { echo 'thumb-no-ajax'; } ?>">
					<?php } else { ?>
					<!-- Portfolio Wrap -->
					<div class="portfolio-wrap">                
                        <!-- Portfolio Columns -->
						<div class="portfolio below-caption parallax-portfolio <?php if( munio_get_theme_options('clapat_munio_enable_ajax') ){ echo 'thumb-with-ajax'; } else { echo 'thumb-no-ajax'; } ?>">
					<?php } ?>
						<?php

							$munio_paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$munio_args = array(
										'post_type' => 'munio_portfolio',
										'paged' => $munio_paged,
										'tax_query' => $munio_portfolio_tax_query,
										'posts_per_page' => $munio_max_items,
										 );

							$munio_portfolio = new WP_Query( $munio_args );

							while( $munio_portfolio->have_posts() ){

								$munio_portfolio->the_post();

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
					
					<?php 
						if( $munio_content_after == "after" ){
							the_content();
						} 
					?>
					
				</div>
                <!--/Main Page Content -->
				
				<?php
		
					// display hero section
					get_template_part('sections/page_navigation_section'); 
		
				?>
			</div>
			<!-- /Main Content -->
		</div>
        <!--/Main -->
<?php
			
}
	
get_footer();

?>