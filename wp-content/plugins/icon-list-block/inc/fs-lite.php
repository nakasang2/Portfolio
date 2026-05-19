<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! function_exists( 'ilb_fs' ) ) {

	function ilb_fs() {

		global $ilb_fs;

		if ( ! isset( $ilb_fs ) ) {

			// Load Freemius Lite SDK
			require_once ILB_DIR_PATH . 'vendor/freemius-lite/start.php';

			$ilb_fs = fs_lite_dynamic_init( array(
				'id'                  => '17174',
				'slug'                => 'icon-list-block',
                '__FILE__' => ILB_DIR_PATH . 'index.php',
				'premium_slug'        => 'icon-list-block-pro',
				'type'                => 'plugin',
				'public_key'          => 'pk_51f816736288458da2dd37c719fd3',

				// VERY IMPORTANT
				'is_premium'          => false,
				'has_premium_version' => true,
				'has_addons'          => false,
				'has_paid_plans'      => true,
				'menu'                => array(
					'slug'       => 'edit.php?post_type=icon-list-block',
					'first-path' => 'edit.php?post_type=icon-list-block&page=ilb_demo_page',
					'support'    => false,
				),
			) );
		}

		return $ilb_fs;
	}

	// Init Freemius
	ilb_fs();

	// Signal SDK loaded
	do_action( 'ilb_fs_loaded' );
}