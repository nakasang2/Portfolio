<?php
/**
 * Created by Clapat
 * Date: 17/08/16
 * Time: 10:16 AM
 */

// pagination
if( !function_exists('munio_pagination') ){

    function munio_pagination( $current_query = null ){

        // pages represent the total number of pages
        global $wp_query;
        if( $current_query == null )
            $current_query = $wp_query;
			
		$pages = ($current_query->max_num_pages) ? $current_query->max_num_pages : 1;

		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
		elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
		else { $paged = 1; }
		
        if( $pages > 1 )
        {
            // classic navigation
			get_template_part( "sections/blog_navigation_classic_section" );
			
		}
    }

} // pagination function


// comments
if( !function_exists('munio_comment') ){

    function munio_comment($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment;
        $add_below = 'comment-wrapper';
		echo '<div ';
		if( $depth > 1 ){ //reply comment
			comment_class("user_comment_reply");
		}
		else{ //top comment
			comment_class("user_comment");
		}
        echo ' id="div-comment-';
        comment_ID();
        echo '">';
		
		echo '<div id="comment-wrapper-';
		comment_ID();
		echo '">';
		echo '<div class="user-image">'. get_avatar($comment, 54) . '</div>';
		echo '<div class="comment-box">';
        echo '<p class="comment-head">'. get_comment_author_link() . ' ';
        echo '<span>';
		echo esc_html__('at', 'munio') . ' ' . get_comment_time() . ', ' . get_comment_date() . ' - ';
		comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Reply', 'munio'), 'before' => '', 'after' => '', 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'])));
		echo '</span>';
		echo '</p>';
		
        echo '<div class="comment-text">';
        if ($comment->comment_approved == '0'){
            echo '<em>' . esc_html__("Your comment is awaiting moderation", 'munio') . '</em><br />';
        }
        comment_text();
		
		echo '</div>'; // div comment-box
		echo '</div>'; // div comment-wrapper
        echo '</div>'; // div user_comment

    }
}

// defaults of the comment form
if( !function_exists('munio_commentform_title') ){
	function munio_commentform_title( $args ) {
			
		$args['title_reply_before'] = '<div id="reply-title" class="comment-reply-title">';
		$args['title_reply_after']  = '</div>';

		return  $args;
	}
}
add_filter( 'comment_form_defaults', 'munio_commentform_title' );

// the caption displayed within single blog post hero pages
if( !function_exists('munio_blog_post_hero_caption') ){

    function munio_blog_post_hero_caption() {

    	// should be called in the loop
		$hero_caption = '';
		$hero_caption .= '<ul class="entry-meta entry-categories">';
		
		$post_categories = get_the_category();
		foreach( $post_categories as $post_category ){
			
			if( $post_category ){
				
				$hero_caption .= "<li>";
				$hero_caption .= '<a href="' . get_category_link( $post_category->term_id ) .'" rel="category tag">' . $post_category->name . '</a>';
				$hero_caption .= "</li>";
			}
		}
		
		$hero_caption .= '</ul>';						
           
        return $hero_caption;
    }
}


?>