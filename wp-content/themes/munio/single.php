<?php

get_header();

while ( have_posts() ){

    the_post();

	$munio_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>
	
	<!-- Main -->
	<div id="main">
			
			<!-- Hero Section -->
            <div id="hero" class="post-hero">                    
				<div id="hero-caption">
					<div class="inner">
						<div class="post-article-wrap">                            
							<div class="article-head">
								<ul class="entry-meta entry-date">
									<li class="link"><a href="<?php the_permalink(); ?>"><?php the_time('F j, Y'); ?></a></li>
								</ul>
							</div>
                                                    
                            <div class="article-content">                                
								<div class="post-title"><?php the_title(); ?></div>                                
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
                            </div>                                                                                        
						</div>
                    </div>
                </div>
            </div>                     
            <!--/Hero Section -->   
				
		<!-- Main Content -->
		<div id="main-content" >
			<!-- Post -->
			<div id="post" <?php post_class('post-content'); ?>>
				
				<?php if( $munio_post_image ){ ?>
				<div class="post-image">
					<img src="<?php echo esc_url( $munio_post_image[0] ); ?>" alt="<?php esc_attr_e("Post Image", "munio"); ?>">
				</div>
				<?php } ?>
				<!-- Post Content -->
				<div id="post-content">
					
					<?php the_content(); ?>
								
					<div class="page-links">
					<?php
						wp_link_pages();
					?>
					</div>
					
				</div>
				<!--/Post Content -->
				
				<!-- Post Meta Data -->
                <div class="post-meta-data">
					<div class="container">
						<?php if ( has_tag() ) {
							
							echo '<ul class="entry-meta entry-tags"><li>' . esc_html__('Tags:', 'munio') .'</li>';
							$munio_tags = get_the_tags();
							if ( ! empty( $munio_tags ) ) {
											
								foreach( $munio_tags as $munio_tag ) {
												
									echo '<li class="link">';
									echo wp_kses_post( '<a class="ajax-link" data-type="page-transition" href="' . esc_url( get_tag_link( $munio_tag->term_id ) ) . '" rel="category tag"><span data-hover="' . esc_attr( $munio_tag->name ) . '">' . esc_html( $munio_tag->name ) . '</span></a>' );
									echo '</li>';
								}
							}
							echo '</ul>';
							
						} ?>
                    </div>
                </div>
                <!--/Post Meta Data -->
				
				<!-- Post Navigation -->
				<?php previous_post_link( 'blog-post', munio_get_theme_options( 'clapat_munio_blog_next_post_caption' ) ); ?>
				<!--/Post Navigation -->
				
				<?php comments_template(); ?>
				
			</div>
			<!-- /Post -->
		</div>
		<!-- /Main Content -->
	</div>
	<!-- /Main -->
<?php

}

get_footer();

?>
