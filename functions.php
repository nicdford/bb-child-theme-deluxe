<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';
require_once 'classes/class-shortcodes.php';
require_once '/classes/class-tgm-plugin-activation.php';

// Includes
require_once 'includes/extras.php';
require_once 'includes/scss-variables.php';
require_once 'includes/helper-classes.php';

// Actions
add_action( 'wp_enqueue_scripts', 'FLChildTheme::enqueue_scripts', 1000 );

// SVG Support
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Setup the TGM_Plugin_Activation class.
function bb_theme_deluxe_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'WP SCSS',
			'slug'               => 'wp-scss', 
			'required'           => true, 
			'force_activation'   => true, 
			'force_deactivation' => true
    ),
    array(
			'name'               => 'Better Search Replace',
			'slug'               => 'better-search-replace'
		),
    array(
			'name'        => 'Gravity Forms',
      'slug'        => 'better-search-replace',
      'source'      => 'http://s3.amazonaws.com/gravityforms/releases/gravityforms_2.4.2.5.zip?AWSAccessKeyId=1603BBK66770VCSCJSG2&Expires=1544655955&Signature=ENAtUDwwq8pUwK%2F%2Bi8WlBcaeqwk%3D'
		),
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
    ),
    array(
      'name'        => 'View Admin As',
      'slug'        => 'view-admin-as'
    ),
    array(
      'name'        => 'Disable Comments',
      'slug'        => 'disable-comments'
    ),
    array(
      'name'        => 'Duplicate Post',
      'slug'        => 'duplicate-post'
    ),
    array(
      'name'        => 'Enable Media Replace',
      'slug'        => 'enable-media-replace'
    ),
    array(
      'name'        => 'Google Analytics Dashboard Plugin for WordPress by MonsterInsights',
      'slug'        => 'google-analytics-for-wordpress'
    ),
    array(
      'name'        => 'ManageWP Worker',
      'slug'        => 'worker'
    ),
    array(
      'name'        => 'Pods – Custom Content Types and Fields',
      'slug'        => 'pods'
    ),
    array(
      'name'        => 'ShortPixel Image Optimizer',
      'slug'        => 'shortpixel-image-optimiser'
    ),
    array(
      'name'        => 'Wordfence Security – Firewall & Malware Scan',
      'slug'        => 'wordfence'
    ),
    array(
      'name'        => 'WP Fastest Cache',
      'slug'        => 'wp-fastest-cache'
    )
    

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 */
	$config = array(
		'id'           => 'bb-theme',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'bb_theme_deluxe_register_required_plugins' );
