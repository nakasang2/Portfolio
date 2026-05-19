<?php
/**
 * The template for displaying Tag Search Results pages
 */

get_header();

?>
		
	<!-- Main -->
	<div id="main">
		
		<!-- Hero Section -->
        <div id="hero">
           <div id="hero-styles">
                <div id="hero-caption" class="text-align-center">
                    <div class="inner">
						<div class="scale-wrapper">
							<div class="hero-title"><?php echo wp_kses_post( single_tag_title('', false) ); ?></div> 
						</div>
                    </div>
                </div>                    
            </div>
        </div>                      
        <!--/Hero Section -->
		
    	<!-- Main Content -->
    	<div id="main-content">
			<!-- Blog-->
			<div id="blog">
				<!-- Blog-Content-->
				<div data-fx="1">
				<?php 
						
					// the loop
					if( have_posts() ){
					
						while( have_posts() ){

							the_post();

							get_template_part( 'sections/blog_post_section' );
							
						}
					}
					else {
						
						echo '<h4 class="search_results">' . esc_html__('No posts found with this tag', 'munio') . '</h4>';
					}
				?>
			
				<!-- /Blog-Content-->
				</div>
				<?php
					
				munio_pagination();

				?>
			</div>
			<!-- /Blog-->
		</div>
		<!--/Main Content-->
	</div>
	<!-- /Main -->
<?php

get_footer();

?>