<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';
require_once 'classes/class-shortcodes.php';

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