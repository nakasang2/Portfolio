<?php
/**
 * Plugin Name: Cards Layout
 * Description: This plugin offers multiple customizable layouts like grid, list, and carousel, making content display easy and flexible.
 * Version: 1.1.4
 * Author: bPlugins
 * Author URI: http://bplugins.com
 * Requires at least: 6.5
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: cards-layout
 */

// ABS PATH
if ( !defined( 'ABSPATH' ) ) { exit; }

// Constant
define( 'PHCLB_PLUGIN_VERSION', isset( $_SERVER['HTTP_HOST'] ) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.1.4' );
define( 'PHCLB_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'PHCLB_DIR_PATH', plugin_dir_path( __FILE__ ) );

if( !class_exists( 'PHCLBCardsLayout' ) ){
	class PHCLBCardsLayout{
		
		function __construct(){
			add_action( 'init', [ $this, 'onInit' ] );
		}

		function onInit(){
			register_block_type( __DIR__ . '/build' );
		}
	}
	new PHCLBCardsLayout();
}