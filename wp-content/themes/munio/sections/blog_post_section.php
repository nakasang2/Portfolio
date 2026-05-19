<?php
$munio_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>
				<!-- Article -->
                <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
					<div class="article-wrap">
						<?php if( $munio_post_image  ){ ?>
						<a class="article-link-img ajax-link-post" data-type="page-transition" href="<?php the_permalink(); ?>">
							<div class="article-img-wrap">
								<div class="article-img">
									<img src="<?php echo esc_url( $munio_post_image[0] ); ?>" alt="<?php esc_attr_e("Post Image", "munio"); ?>">
								</div>
							</div>
						</a>
						<?php } ?>
						<div class="article-head">
                            <ul class="entry-meta entry-date">
								<li class="link"><a class="ajax-link" href="<?php the_permalink(); ?>"><?php the_time('F j, Y'); ?></a></li>
                            </ul>
                        </div>
                        <div class="article-content">                                
							<a class="post-title hide-ball ajax-link" href="<?php echo esc_url( the_permalink() ); ?>" data-type="page-transition"><?php the_title(); ?></a>
							<div class="entry-meta entry-categories">
								<ul class="post-categories">
								<?php 
									$munio_categories = get_the_category();
									if ( ! empty( $munio_categories ) ) {
										
										foreach( $munio_categories as $munio_category ) {
											
											echo '<li class="link">';
											echo wp_kses_post( '<a class="ajax-link" data-type="page-transition" href="' . esc_url( get_category_link( $munio_category->term_id ) ) . '" rel="category tag"><span data-hover="' . esc_attr( $munio_category->name ) . '">' . esc_html( $munio_category->name ) . '</span></a>' );
											echo '</li>';
										}
									}
								?>
								</ul>
                            </div>
							<div class="page-links">
							<?php
								wp_link_pages();
							?>
							</div>
                        </div>                                                                                        
                     </div>                
                </article>
                <!--/Article -->