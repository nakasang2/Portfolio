			<!-- Sidebar Overlay -->
			<div id="filters-overlay">                
                <div id="close-filters"></div>
                <div class="outer">
                    <div class="inner">    
                        <ul id="filters">
                            <li class="filters-timeline"><a id="all" href="#" data-filter="*" class="active hide-ball"><?php echo wp_kses_post( munio_get_theme_options( 'clapat_munio_portfolio_filter_all_caption' ) ); ?></a></li>
                            <?php
							
								// check if the category filter is specified in page options
								$munio_portfolio_category_filter	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-portfolio-filter-category' );

								$munio_portfolio_category = null;
								if( !empty( $munio_portfolio_category_filter ) ){
	
									$munio_portfolio_category = array();
									$munio_category_slugs = explode( ",", $munio_portfolio_category_filter );
									foreach( $munio_category_slugs as $munio_category_slug ){
										
										$munio_category_object = get_term_by( 'slug', $munio_category_slug, 'portfolio_category' );
										if( $munio_category_object ){
											
											array_push( $munio_portfolio_category, $munio_category_object );
										}
									}
								}
								else {

									$munio_portfolio_category = get_terms('portfolio_category', array( 'hide_empty' => 0 ));
								}

								if( $munio_portfolio_category ){

									foreach( $munio_portfolio_category as $portfolio_cat ){

							?>
							<li class="filters-timeline link"><a href="#" data-filter=".<?php echo sanitize_title( $portfolio_cat->slug ); ?>" class="hide-ball"><?php echo wp_kses_post( $portfolio_cat->name ); ?></a></li>
							<?php

									}
								}

							?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Sidebar Overlay -->