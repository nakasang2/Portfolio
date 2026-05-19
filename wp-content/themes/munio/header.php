<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>

	<main>
    <?php if( munio_get_theme_options('clapat_munio_enable_preloader') ){ ?>
		<!-- Preloader -->
        <div class="preloader-wrap">
            <div class="outer">
				<div class="inner">
                    <div class="percentage" id="precent"></div>
                    <div class="trackbar">
                        <div class="loadbar"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--/Preloader -->
  <?php } ?>
		
		<!--Cd-main-content -->
		<div class="cd-index cd-main-content">
			
		<?php
		$munio_bknd_color = munio_get_theme_options( 'clapat_munio_default_page_bknd_type' );
		if( is_singular( 'munio_portfolio' ) ){
	
			$munio_bknd_color = munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-bknd-color' );
			
		}
		else if( is_singular( 'post' ) ){
	
			$munio_bknd_color = munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-blog-bknd-color' );
			
		}
		else if( is_404() ){
			
			$munio_bknd_color = munio_get_theme_options( 'clapat_munio_error_page_bknd_type' );
			
		}
		else if( is_page() ){
	
			$munio_bknd_color = munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-bknd-color' );

		}
		?>
	
		<?php if( is_page_template( 'blog-page.php' ) || is_home() || is_archive() || is_search() ){ ?>
			<!-- Page Content -->
			<div id="page-content" class="blog-template <?php echo sanitize_html_class( $munio_bknd_color ); ?>">
		<?php } else { ?>
			<!-- Page Content -->
			<div id="page-content" class="<?php echo sanitize_html_class( $munio_bknd_color ); ?>">
		<?php } ?>
		
			<?php 
				// display header section
				get_template_part('sections/header_section'); 		
			?>