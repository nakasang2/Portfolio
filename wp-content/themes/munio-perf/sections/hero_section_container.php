<?php
/**
 * Created by Clapat.
 * Date: 20/08/19
 * Time: 1:34 PM
 */
$munio_hero_properties = munio_get_hero_properties( get_post_type() );

$hero_styles = $munio_hero_properties->position;

if( $munio_hero_properties->enabled ){

?>

		<!-- Hero Section -->
		<div id="hero" class="<?php if( $munio_hero_properties->image && !empty( $munio_hero_properties->image['url'] ) ){ echo 'has-image'; } ?>">
				<div id="hero-styles" class="<?php echo esc_attr( $hero_styles ); ?>">
					<div id="hero-caption">
						<div class="inner">
							<?php if( $munio_hero_properties->image && !empty( $munio_hero_properties->image['url'] ) ){ ?>
							<div class="scale-wrapper"><div class="hero-title"><?php echo wp_kses_post( munio_span_wordwrap( $munio_hero_properties->caption_title ) ); ?></div></div>
							<?php } else { ?>
							<div class="scale-wrapper"><div class="hero-title"><?php echo wp_kses_post( $munio_hero_properties->caption_title ); ?></div></div>
							<?php } ?>
							<div class="hero-subtitle"><?php echo wp_kses_post( $munio_hero_properties->caption_subtitle ); ?></div>
						</div>
					</div>
					<?php if( $munio_hero_properties->image && !empty( $munio_hero_properties->image['url'] ) ){ ?>
					<div class="hero-bottom">
						<?php if( !empty( $munio_hero_properties->scroll_down_caption ) ){ ?>
                       	<div class="hb-left">
                           	<div id="scrolldown" class="text-rotate link">
								<span>
									<?php echo wp_kses_post( $munio_hero_properties->scroll_down_caption ); ?><br />
									<?php echo wp_kses_post( $munio_hero_properties->scroll_down_caption ); ?><br />
									<?php echo wp_kses_post( $munio_hero_properties->scroll_down_caption ); ?><br />
									<?php echo wp_kses_post( $munio_hero_properties->scroll_down_caption ); ?>
								</span>
							</div>
						</div>
						<?php } ?>
						<?php if( !empty( $munio_hero_properties->project_info ) ){ ?>
                        <div class="hb-right"><?php echo wp_kses_post( $munio_hero_properties->project_info ); ?></div>
						<?php } ?>
                    </div>
					<?php } ?>
				</div>
		</div>
		<!--/Hero Section -->

<?php
}
?>
