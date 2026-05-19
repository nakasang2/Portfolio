<?php
/**
 * Created by Clapat.
 * Date: 20/08/19
 * Time: 11:33 AM
 */

// hero section container properties
$munio_hero_properties = munio_get_hero_properties( get_post_type() );

if( $munio_hero_properties->image && !empty( $munio_hero_properties->image['url'] ) ){
?>
			<div id="hero-bg-wrapper">
                <div id="hero-image-parallax">
                    <div id="hero-bg-image" style="background-image:url(<?php echo esc_url( $munio_hero_properties->image['url'] ); ?>)">
					<?php if( $munio_hero_properties->video ){ ?>
						<div class="hero-video-wrapper">
							<video loop muted class="bgvid">
								<?php if( !empty( $munio_hero_properties->video_mp4 ) ){ ?>
								<source src="<?php echo esc_url( $munio_hero_properties->video_mp4 ); ?>" type="video/mp4">
								<?php } ?>
								<?php if( !empty( $munio_hero_properties->video_webm ) ){ ?>
								<source src="<?php echo esc_url( $munio_hero_properties->video_webm ); ?>" type="video/webm">
								<?php } ?>
							</video>
						</div>
					<?php } ?>
					</div>
                </div>
            </div>
<?php	
}

?>
