			<?php
				
				$munio_menu_breakpoint = "1025";
				if( munio_get_theme_options( 'clapat_munio_enable_fullscreen_menu' ) ){
					
					$munio_menu_breakpoint = "10025";
				}
				
				wp_nav_menu(array(
					'theme_location' 	=> 'primary-menu',
					'container' 		=> 'nav',
					'items_wrap' 		=> '<div class="nav-height"><div class="outer"><div class="inner"><ul id="%1$s" data-breakpoint="' . esc_attr( $munio_menu_breakpoint ) . '" class="flexnav %2$s">%3$s</ul></div></div></div>'
				));

			?>
