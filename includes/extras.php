<?php
/**
 * Hide wordpress logo and make current logo centered.
 */
function my_login_styles() {
	wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
}

add_action( 'login_enqueue_scripts', 'my_login_styles' );