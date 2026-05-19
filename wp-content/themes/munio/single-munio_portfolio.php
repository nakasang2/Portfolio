<?php

get_header();

if ( have_posts() ){

the_post();

?>
	
		<!-- Main -->
		<div id="main">

		<?php

			// display hero section, if any
			$munio_hero_properties = munio_get_hero_properties( get_post_type() );
			if( $munio_hero_properties->enabled ){

				get_template_part('sections/hero_section');
			}

		?>
			<!-- Main Content --> 
			<div id="main-content">
				<div id="main-page-content">

					<?php the_content(); ?>

				</div>
				
				<?php get_template_part('sections/project_navigation_section'); ?>
				
			</div>
			<!--/Main Content-->
			
		</div>
		<!-- /Main -->
<?php

}

get_footer();

?>
