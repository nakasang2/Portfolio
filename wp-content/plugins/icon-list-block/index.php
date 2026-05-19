<?php

/**
 * Plugin Name: Icon List Block
 * Description: Show your icon list in web.
 * Version: 1.2.6
 * Author: bPlugins
 * Author URI: https://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: icon-list
  * @fs_free_only, /bplugins_sdk
 */

// ABS PATH
if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('ilb_fs')) {
    ilb_fs()->set_basename(true, __FILE__);
} else {
    // Constant
    define( 'ILB_VERSION', isset( $_SERVER['HTTP_HOST'] ) && 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.2.6' );
    define( 'ILB_DIR_URL', plugin_dir_url( __FILE__ ) );
    define( 'ILB_DIR_PATH', plugin_dir_path( __FILE__ ) );
    define( 'ILB_HAS_PRO', file_exists( ILB_DIR_PATH . 'vendor/freemius/start.php' ) );

    if ( ILB_HAS_PRO ) {
        require_once ILB_DIR_PATH . 'inc/fs.php';
    } else {
        require_once ILB_DIR_PATH . 'includes/fs-lite.php';
    }

    // ... Your plugin's main file logic ...

    function ilbIsPremium()
    {
        return ILB_HAS_PRO ? ilb_fs()->can_use_premium_code() : false;
    }


    if (!class_exists('ILBPlugin')) {
        class ILBPlugin
        {
            public function __construct()
            {
                add_action('enqueue_block_assets', [$this, 'enqueueBlockAssets']);
                add_action('init', [$this, 'onInit']);

                add_action('admin_menu', [$this, 'addSubmenu']);
                add_action('admin_enqueue_scripts', [$this, 'adminEnqueueScripts']);
                // sub menu function hooks

                // Post Type function hooks 
                add_action('init', array($this, 'ilb_icon_list_block_post_type'));

                // shortcode type function hooks 
                add_shortcode('icon-list', [$this, 'ilb_shortcode_handler']);

                //manage column 
                add_filter('manage_icon-list-block_posts_columns', [$this, 'iconListManageColumns'], 10);

                // Custom manage column 
                add_action('manage_icon-list-block_posts_custom_column', [$this, 'iconListManageCustomColumns'], 10, 2);

                // Premium checker
                add_action('wp_ajax_ilbPipeChecker', [$this, 'ilbPipeChecker']);
                add_action('wp_ajax_nopriv_ilbPipeChecker', [$this, 'ilbPipeChecker']);
                add_action('admin_init', [$this, 'registerSettings']);
                add_action('rest_api_init', [$this, 'registerSettings']);
            }

            //manage column
            function iconListManageColumns($defaults)
            {
                unset($defaults['date']);
                $defaults['shortcode'] = 'ShortCode';
                $defaults['date'] = 'Date';
                return $defaults;
            }

            // custom manage column
            function iconListManageCustomColumns($column_name, $post_ID)
            {
                if ($column_name == 'shortcode') {
                    echo '<div class="bPlAdminShortcode" id="bPlAdminShortcode-' . esc_attr($post_ID) . '">
					<input value="[icon-list id=' . esc_attr($post_ID) . ']" onclick="copyBPlAdminShortcode(\'' . esc_attr($post_ID) . '\')" readonly>
					<span class="tooltip">Copy To Clipboard</span>
				</div>';
                }
            }

            function ilb_shortcode_handler($atts)
            {
                $post_id = $atts['id'];
                $post = get_post($post_id);
                if (!$post) {
                    return '';
                }
                if (post_password_required($post)) {
                    return get_the_password_form($post);
                }
                switch ($post->post_status) {
                    case 'publish':
                        return $this->displayContent($post);
                    case 'private':
                        if (current_user_can('read_private_posts')) {
                            return $this->displayContent($post);
                        }
                        return '';
                    case 'draft':
                    case 'pending':
                    case 'future':
                        if (current_user_can('edit_post', $post_id)) {
                            return $this->displayContent($post);
                        }
                        return '';
                    default:
                        return '';
                }
            }


            function displayContent($post)
            {
                $blocks = parse_blocks($post->post_content);
                return render_block($blocks[0]);
            }


            // Custom Post Type function calls
            function ilb_icon_list_block_post_type()
            {
                register_post_type(
                    'icon-list-block',
                    array(
                        'label' => 'Icon List',
                        'labels' => [
                            'name' => 'Icon List',
							'singular_name' => 'Icon List',
							'menu_name' => 'Icon List',
							'all_items' => 'ShortCode Generator',
                            'add_new' => 'Add New ShortCode',
                            'add_new_item' => 'Add New ShortCode',
                            'edit_item' => 'Edit Tabbed',
                            'not_found' => 'There is no please add one',
                            'item_published' => 'Icon List Published',
                            'item_updated' => 'Icon List Updated'
                        ],
                        'public' => false,
                        'show_ui' => true,
                        'show_in_rest' => true,
                        'menu_icon' =>  'dashicons-editor-ul',
                        'template' => [['ilb/icon-list']],
                        'template_lock' => 'all',
                    )
                );
            }

            function ilbPipeChecker()
            {
                $nonce = $_POST['_wpnonce'] ?? null;

                if (!wp_verify_nonce($nonce, 'wp_ajax')) {
                    wp_send_json_error('Invalid Request');
                }

                wp_send_json_success([
                    'isPipe' => ilbIsPremium()
                ]);
            }

            function registerSettings()
            {
                register_setting('ilbUtils', 'ilbUtils', [
                    'show_in_rest' => [
                        'name' => 'ilbUtils',
                        'schema' => ['type' => 'string']
                    ],
                    'type' => 'string',
                    'default' => wp_json_encode(['nonce' => wp_create_nonce('wp_ajax')]),
                    'sanitize_callback' => 'sanitize_text_field'
                ]);
            }

            function enqueueBlockAssets()
            {
                wp_register_style('fontAwesome', ILB_DIR_URL . 'assets/css/font-awesome.min.css', [], '6.4.2'); // Icon
            }

            function onInit()
            {
                register_block_type(__DIR__ . '/build');
            }

            function addSubmenu()
            {
                add_submenu_page(
                    'edit.php?post_type=icon-list-block',
                    'Demo Page',
                    'Help & Demos',
                    'manage_options',
                    'ilb_demo_page',
                    [$this, 'ilb_render_demo_page']
                );
            }

            function renderTemplate($content)
            {
                $parseBlocks = parse_blocks($content);
                return render_block($parseBlocks[0]);
            }


            function ilb_render_demo_page() {
                ?>
                <div id="ilbDashboard"
                        data-info="<?php echo esc_attr(wp_json_encode([
                            'version'=>ILB_VERSION,
                            'isPremium' =>ilbIsPremium(),
                            'hasPro' => ILB_HAS_PRO,
                            'licenseActiveNonce' => wp_create_nonce( 'bPlLicenseActivation' )
                        ]))?>"
                        >

                </div>
                <?php
            }

            function adminEnqueueScripts() {

                $screen = get_current_screen();

                if (isset($screen->post_type) && $screen->post_type === 'icon-list-block'){
                    wp_enqueue_style('shortcode-style', ILB_DIR_URL . 'build/shortcode-style.css', [], ILB_VERSION);
                    wp_enqueue_script('shortcode-js', ILB_DIR_URL . 'build/shortcode-js.js', [], ILB_VERSION, true);
                }                

                wp_register_script('ilb-view', ILB_DIR_URL . 'build/view.js', ['react', 'react-dom'], ILB_VERSION);
                wp_register_style('fontAwesome', ILB_DIR_URL . 'assets/css/font-awesome.min.css', [], ILB_VERSION);
                wp_register_style('ilb-view', ILB_DIR_URL . 'build/view.css', ['fontAwesome'], ILB_VERSION);

                if (isset($screen->base) && $screen->base === 'icon-list-block_page_ilb_demo_page'){
                    wp_enqueue_script('fs', ILB_DIR_URL . 'assets/js/fs.js', [], '1');
                    wp_enqueue_style('ilb-dashboard-help', ILB_DIR_URL . 'build/dashboard.css', ['ilb-view'], ILB_VERSION);
                    wp_enqueue_script('ilb-dashboard-help', ILB_DIR_URL . 'build/dashboard.js', ['react', 'wp-api', 'react-dom', 'wp-components', 'fs', 'wp-util'], ILB_VERSION);
                    wp_set_script_translations('ilb-dashboard-help', 'icon-list', ILB_DIR_PATH . 'languages');
                }
            }
        }

        new ILBPlugin();
    }

    if (ILB_HAS_PRO) {
		require_once ILB_DIR_PATH . 'inc/LicenseActivation.php';
	}
}
