<?php

if ( ! class_exists( 'MunioHeroProperties' ) ) {

	class MunioHeroProperties
	{
		public $enabled;
		public $caption_title;
		public $caption_subtitle;
		public $position;
		public $opacity;
		public $image;
		public $foreground;
		public $video;
		public $video_webm;
		public $video_mp4;
		public $scroll_down_caption;
		public $project_info;

		public function __construct(){

			$this->enabled = false;
			$this->caption_title = "";
			$this->caption_subtitle = "";
			$this->position = esc_attr("fixed-onscrol");
			$this->image = true;
			$this->foreground= esc_attr('light-content');
			$this->text_alignment = "";
			$this->video = false;
			$this->video_webm = "";
			$this->video_mp4 = "";
			$this->scroll_down_caption = "";
			$this->project_info = "";
		}

		public function getProperties( $post_type ){

			if( $post_type == 'munio_portfolio' ){

				$this->enabled 			= true; // in portfolio projects hero is always enabled and the hero image will be displayed in showcase slider
				$this->caption_title	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-hero-caption-title' );
				$this->caption_subtitle = munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-hero-caption-subtitle' );
				$this->position 		= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-hero-position' );
				$this->foreground 		= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-bknd-color' );
				$this->image		 	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-hero-img' );
				$this->video 			= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-video' );
				$this->video_webm 		= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-video-webm' );
				$this->video_mp4 		= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-video-mp4' );
				$this->scroll_down_caption = munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-hero-scroll-caption' );
				$this->project_info 	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-portfolio-hero-project-info' );

			} else if( $post_type == 'post' ){

				$this->enabled = true; // the hero section is always enabled in case of blog posts, displaying post title and categories
				$this->caption_title 	= get_the_title();
				$this->caption_subtitle	= munio_blog_post_hero_caption();
				$this->position 		= esc_attr("parallax-onscroll");
				$this->foreground 		= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-blog-bknd-color' );
				$this->image		 	= null;

			} else if( !empty( $post_type ) ){

				$this->enabled 			= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-enable-hero' );
				$this->caption_title	= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-hero-caption-title' );
				$this->caption_subtitle = munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-hero-caption-subtitle' );
				$this->position 		= esc_attr("parallax-onscroll");
				$this->foreground 		= munio_get_post_meta( MUNIO_THEME_OPTIONS, get_the_ID(), 'munio-opt-page-bknd-color' );
				$this->image		 	= null;

			}
		}

	}
}

$munio_hero_properties = new MunioHeroProperties();

?>
