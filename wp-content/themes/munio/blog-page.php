<?php
/*
Template name: Blog Template
*/
get_header();

while ( have_posts() ){

the_post();

?>
			
	
	<?php 
		
		// display hero section, if any
		get_template_part('sections/hero_section'); 
		
	?>
		<!-- Main Content -->
    	<div id="main-content">
			<!-- Blog-->
			<div id="blog">
				<!-- Blog-Content-->
				<div data-fx="1">
				<?php 
						
					$munio_paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					
					$munio_args = array(
						'post_type' => 'post',
						'paged' => $munio_paged
					);
					$munio_posts_query = new WP_Query( $munio_args );

					// the loop
					while( $munio_posts_query->have_posts() ){

						$munio_posts_query->the_post();

						get_template_part( 'sections/blog_post_section' );
						
					}
							
				?>
				</div>
				<!-- /Blog-Content -->
					
				<?php
						
					munio_pagination( $munio_posts_query );

					wp_reset_postdata();
				?>
			</div>
			<!-- /Blog-->
		</div>
		<!--/Main Content-->
	
<?php

}
	
get_footer();

?>
