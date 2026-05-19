<?php

if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( !function_exists( 'ilb_fs' ) ) {
    function ilb_fs() {
        global $ilb_fs;
        if ( !isset( $ilb_fs ) ) {
            require_once ILB_DIR_PATH . 'vendor/freemius/start.php';
            $ilb_fs = fs_dynamic_init( array(
                'id'               => '17174',
                'slug'             => 'icon-list-block',
                'premium_slug'     => 'icon-list-block-pro',
                'type'             => 'plugin',
                'public_key'       => 'pk_51f816736288458da2dd37c719fd3',
                'is_premium'       => false,
                'premium_suffix'   => 'Pro',
                'has_addons'       => false,
                'has_paid_plans'   => true,
                'trial'            => array(
                    'days'               => 7,
                    'is_require_payment' => false,
                ),
                'menu'             => array(
                    'slug'       => 'edit.php?post_type=icon-list-block',
                    'first-path' => 'edit.php?post_type=icon-list-block&page=ilb_demo_page',
                    'support'    => false,
                ),
                'is_live'          => true,
                'is_org_compliant' => true,
            ) );
        }
        return $ilb_fs;
    }

    ilb_fs();
    do_action( 'ilb_fs_loaded' );
}