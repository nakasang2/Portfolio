<?php
/**
 * Created by Clapat
 * Date: 20/08/19
 * Time: 11:00 AM
 */

 // Extra classes to the body
if ( ! function_exists( 'munio_body_class' ) ){

	function munio_body_class( $classes ) {

		$classes[] = 'hidden';
		$classes[] = 'hidden-ball';

		if( munio_get_theme_options( 'clapat_munio_enable_smooth_scrolling' ) ){
			
			$classes[] = 'smooth-scroll';
		}
		
		if( munio_get_theme_options( 'clapat_munio_stretch_title' ) ){
			
			$classes[] = 'scale-title';
		}
		
		if( !munio_get_theme_options( 'clapat_munio_enable_ajax' ) ){
			
			$classes[] = 'load-no-ajax';
		}
		
		// return the $classes array
		return $classes;
	}
}
add_filter( 'body_class', 'munio_body_class' );

// site/blog title
if ( ! function_exists( '_wp_render_title_tag' ) ) {

	function munio_wp_title() {

		echo wp_title( '|', false, 'right' );

	}
	add_action( 'wp_head', 'munio_wp_title' );
}

if ( ! function_exists( 'munio_menu_classes' ) ){

    function munio_menu_classes(  $classes , $item, $args ){

		$classes[] = 'link';
		if( $item->menu_item_parent == "0" ){
			
			$classes[] = 'menu-timeline';
		}
		if( in_array( 'current-menu-item', $item->classes ) || in_array( 'current-menu-ancestor', $item->classes ) ){

			$classes[] = 'active';
		}
				
		return $classes;
    }

}
if ( ! function_exists( 'munio_menu_link_attributes' ) ){

    function munio_menu_link_attributes(  $atts, $item, $args ){

		$arr_classes = array();
		
		if( !empty($item->classes) ){

			if( !in_array( 'menu-item-type-custom', $item->classes ) && !in_array( 'menu-item-has-children', $item->classes ) ){
				
				// if the menu item is not a custom link
				$atts['data-type'] = 'page-transition';	
				$arr_classes[] = 'ajax-link';
			}
		}
		
		if( !empty($item->classes) ){
			if( in_array( 'current-menu-item', $item->classes ) || in_array( 'current-menu-ancestor', $item->classes ) ){

				$arr_classes[] = 'active';
			}
		}

		if( !empty($item->classes) ){

			if( in_array( 'menu-item-has-children', $item->classes ) ){
				// if the menu item is a parent item, just use an empty <a> tag
				if( isset( $atts['data-type'] ) ){
					$atts['data-type'] = null;
				}
			}
		}
		if( !empty( $arr_classes ) ){

			$atts['class'] = implode( ' ', $arr_classes );
		}

		return $atts;
    }

}
if ( ! function_exists( 'munio_menu_item_title' ) ){

    function munio_menu_item_title(  $title, $item, $args, $depth ){

		if( $depth === 0 ){
			
			$title = '<span data-hover="' . esc_attr( $title ) . '">' . $title . '</span>';
		}
		return $title;
    }

}
// change priority here if there are more important actions associated with the hook
add_action('nav_menu_css_class', 'munio_menu_classes', 10, 3);
add_filter('nav_menu_link_attributes', 'munio_menu_link_attributes', 10, 3 );
add_filter( 'nav_menu_item_title', 'munio_menu_item_title', 10, 4 );

// hooks to add extra classes for next & prev portfolio projects and single blog posts
if ( ! function_exists( 'munio_prev_post_link' ) ){

    function munio_prev_post_link( $output, $format, $link, $post ){

			if( $format == 'munio_portfolio' ){

				$output = '';
				$next_post = $post;

				if( $post ){

					$next_post = $post;
				}
				else{ // could not find the next post so rewind to the oldest one

					$args = array(
							'posts_per_page'	=> 2,
							'order'           => 'DESC',
							'post_type'       => 'munio_portfolio',
						);

					$find_query = new WP_Query( $args );
					if ( $find_query->have_posts() && ($find_query->found_posts > 1) )  {

						$find_query->the_post();

						$next_post = $find_query->post;

					} else {
						// no posts found
					}

					wp_reset_postdata();
				}

				if( $next_post ){

					$munio_hero_image = munio_get_post_meta( MUNIO_THEME_OPTIONS, $next_post->ID, 'munio-opt-portfolio-hero-img' );
					$munio_hero_title = munio_get_post_meta( MUNIO_THEME_OPTIONS, $next_post->ID, 'munio-opt-portfolio-hero-caption-title' );
					$munio_hero_subtitle = munio_get_post_meta( MUNIO_THEME_OPTIONS, $next_post->ID, 'munio-opt-portfolio-hero-caption-subtitle' );
					munio_portfolio_next_project_image( $munio_hero_image['url'] );
					
					$output = '<!-- Project Navigation --> ';
					$output .= '<div id="project-nav">';
                    $output .= '<div class="next-project-wrap">';
                    $output .= '<div class="next-project-title">';
					$output .= '<div class="inner">';
                    $output .= '<div class="scale-wrapper"><div class="next-title hide-ball">' . wp_kses_post( munio_get_theme_options( 'clapat_munio_portfolio_next_caption' ) ) . '</div></div>';
                    $output .= '<a class="main-title next-ajax-link-project hide-ball" data-type="page-transition" href="'. esc_url( get_permalink( $next_post ) ) .'">' . wp_kses_post( $munio_hero_title ) . '</a>';
                    $output .= '<div class="next-subtitle-name">' . wp_kses_post( $munio_hero_subtitle ) . '</div>';
                    $output .= '</div>';                   
                    $output .= '</div>';
					$output .= '</div>';
                    $output .= '</div>';
                    $output .= '<!--/Project Navigation -->';

				}

			}
			else if(  $format == 'blog-post' ){

				$output = '';
				if( $post ){

					$output = '<div class="post-navigation">';
                    $output .= '<div class="container">';
                    $output .= '<div class="post-next">';
                    $output .= '<a href="' . get_permalink( $post ) . '" class="ajax-link hide-ball" data-type="page-transition">' . wp_kses_post( munio_get_theme_options( 'clapat_munio_blog_next_post_caption' ) ) . '</a>';
                    $output .= '<div class="post-next-title">' . get_the_title( $post ) . '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';

				}

				return $output;
			}
			else {

				if( $post ){

					$output = get_permalink( $post );
				}
			}

			return $output;
    }

}
if ( ! function_exists( 'munio_next_post_link' ) ){

    function munio_next_post_link( $output, $format, $link, $post ){

			if( $format == 'munio_portfolio' ){

				$output = '';
				$next_post = $post;

				if( $post ){

					$next_post = $post;
				}
				else{ // could not find the next post so rewind to the oldest one

					$args = array(
								'posts_per_page'   => 2,
								'order'            => 'ASC',
								'post_type'        => 'munio_portfolio',
							);

					$find_query = new WP_Query( $args );
					if ( $find_query->have_posts() && ($find_query->found_posts > 1) )  {

						$find_query->the_post();

						$next_post = $find_query->post;

					} else {
						// no posts found
					}

					wp_reset_postdata();
				}

				if( $next_post ){

					$munio_hero_image = munio_get_post_meta( MUNIO_THEME_OPTIONS, $next_post->ID, 'munio-opt-portfolio-hero-img' );
					$munio_hero_title = munio_get_post_meta( MUNIO_THEME_OPTIONS, $next_post->ID, 'munio-opt-portfolio-hero-caption-title' );
					$munio_hero_subtitle = munio_get_post_meta( MUNIO_THEME_OPTIONS, $next_post->ID, 'munio-opt-portfolio-hero-caption-subtitle' );
					munio_portfolio_next_project_image( $munio_hero_image['url'] );
					
					$output = '<!-- Project Navigation --> ';
					$output .= '<div id="project-nav">';
                    $output .= '<div class="next-project-wrap">';
                    $output .= '<div class="next-project-title">';
					$output .= '<div class="inner">';
                    $output .= '<div class="scale-wrapper"><div class="next-title hide-ball">' . wp_kses_post( munio_get_theme_options( 'clapat_munio_portfolio_next_caption' ) ) . '</div></div>';
                    $output .= '<a class="main-title next-ajax-link-project hide-ball" data-type="page-transition" href="'. esc_url( get_permalink( $next_post ) ) .'">' . wp_kses_post( $munio_hero_title ) . '</a>';
                    $output .= '<div class="next-subtitle-name">' . wp_kses_post( $munio_hero_subtitle ) . '</div>';
                    $output .= '</div>';                   
                    $output .= '</div>';
					$output .= '</div>';
                    $output .= '</div>';
                    $output .= '<!--/Project Navigation -->';

				}

			}
			else if( $format == 'blog-post' ){

				// nothing here for the moment
			}
			else {

				if( $post ){

					$output = get_permalink( $post );
				}
			}

		return $output;
	}

}
// change priority here if there are more important actions associated with the hook
add_filter('next_post_link', 'munio_next_post_link', 10, 4);
add_filter('previous_post_link', 'munio_prev_post_link', 10, 4);

// hooks to add extra classes for next & prev blog posts
if ( ! function_exists( 'munio_next_posts_link_attributes' ) ){

	function munio_next_posts_link_attributes(){

		return 'class="ajax-link" data-type="page-transition"';
	}
}
if ( ! function_exists( 'munio_prev_posts_link_attributes' ) ){

	function munio_prev_posts_link_attributes(){

		return 'class="ajax-link" data-type="page-transition"';
	}
}
// change priority here if there are more important actions associated with the hook
add_filter('next_posts_link_attributes', 'munio_next_posts_link_attributes', 10, 4);
add_filter('previous_posts_link_attributes', 'munio_prev_posts_link_attributes', 10, 4);

if ( ! function_exists( 'munio_comment_reply_link' ) ){

	function munio_comment_reply_link($link, $args, $comment, $post){

		return str_replace("class='comment-reply-link", "class='comment-reply-link reply hide-ball", $link);
	}
}
// change priority here if there are more important actions associated with the hook
add_filter('comment_reply_link', 'munio_comment_reply_link', 99, 4);

// category filter
if ( ! function_exists( 'munio_category' ) ){
	
	function munio_category( $thelist, $separator, $parents ){
		
		return str_replace('<a href="', '<a class="ajax-link link" data-type="page-transition" href="', $thelist);
	}
}
add_filter('the_category', 'munio_category', 10, 3);

// tags filter
if ( ! function_exists( 'munio_tags' ) ){
	
	function munio_tags( $tag_list, $before, $sep, $after, $id ){
		
		return str_replace('<a href="', '<a class="ajax-link link" data-type="page-transition" href="', $tag_list);
	}
}
add_filter('the_tags', 'munio_tags', 10, 5);

// search filter
if( !function_exists('munio_searchfilter') ){

    function munio_searchfilter( $query ) {

    	if ( !is_admin() && $query->is_main_query() ) {

    		if ($query->is_search ) {

    			$post_types = get_query_var('post_type');

    			if( empty( $post_types ) ){

            		$query->set('post_type', array('post'));
    			}
        	}

        }

        return $query;

    }
    add_filter('pre_get_posts','munio_searchfilter');

}
