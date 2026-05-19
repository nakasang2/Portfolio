				<div class="blog-navigation has-animation">
					<?php
					$big = 999999999; // need an unlikely integer

					$munio_current_query = munio_get_current_query();
					if ( get_query_var( 'paged' ) ) { $munio_current_page = get_query_var( 'paged' ); }
					elseif ( get_query_var( 'page' ) ) { $munio_current_page = get_query_var( 'page' ); }
					else { $munio_current_page = 1; }
					
					$munio_paginate_links = paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
						'type' => 'list',
						'format' => '?paged=%#%',
						'current' => $munio_current_page,
						'total' => $munio_current_query->max_num_pages,
						'prev_next' => false
					) );
					echo str_replace( "a class='page-numbers'", "a class='page-numbers link ajax-link' data-type='page-transition'", $munio_paginate_links ); 
					?>
				</div>