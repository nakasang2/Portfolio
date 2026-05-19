<?php

$full_image = munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-hero-img' );
$munio_thumbnail_size = munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-thumbnail-size' );

if( $full_image && isset( $full_image['url'] ) ){

    $munio_item_classes 	= '';
    $munio_item_categories 	= '';
	$munio_item_cats = get_the_terms($post->ID, 'portfolio_category');
	if($munio_item_cats){

		foreach($munio_item_cats as $item_cat) {
            $munio_item_classes 	.= $item_cat->slug . ' ';
            $munio_item_categories 	.= $item_cat->name . ', ';
        }

		$munio_item_categories = rtrim($munio_item_categories, ', ');

	}

	$item_url = get_the_permalink();

?>
						<div class="item <?php echo esc_attr( $munio_thumbnail_size ); ?> <?php echo esc_attr( $munio_item_classes ); ?>">
                            <div class="item-appear">                                    		
                                <div class="item-content">                            	                                    
									<a class="item-wrap ajax-link-project" data-type="page-transition" href="<?php echo esc_url( $item_url ); ?>"><?php if( munio_get_theme_options('clapat_munio_enable_ajax') ){ ?></a><?php } ?>
									<div class="item-wrap-image">
										<div class="item-image" data-src="<?php echo esc_url( $full_image['url'] ); ?>">
											<?php if( munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-video' ) ){ 
												$munio_video_webm_url = munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-video-webm' );
												$munio_video_mp4_url = munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-video-mp4' );
											?>
											<div class="hero-video-wrapper">
												<video loop muted class="bgvid">
													<?php if( !empty( $munio_video_mp4_url ) ){ ?>
													<source src="<?php echo esc_url( $munio_video_mp4_url ); ?>" type="video/mp4">
													<?php } ?>
													<?php if( !empty( $munio_video_webm_url ) ){ ?>
													<source src="<?php echo esc_url( $munio_video_webm_url ); ?>" type="video/webm">
													<?php } ?>
												</video>
											</div>
											<?php } ?>
										</div>
									</div>
									<?php if( !munio_get_theme_options('clapat_munio_enable_ajax') ){ ?></a><?php } ?>
									<div class="item-caption">
										<h2 class="item-title"><div class="scale-wrapper"><?php the_title(); ?></div></h2>
										<h4 class="item-cat"><?php echo wp_kses_post( $munio_item_categories ); ?></h4>
                                    </div>
								</div>
                            </div>
                        </div>

<?php

}
?>
