<?php

// Create customizer options in exsisting bb sections
function bbdeluxe_customize_register($wp_customize){
	// $wp_customize->add_section('bbdeluxe_customizer', array(
	// 	'title' => __('BB Child Theme Deluxe', 'bbdeluxe'),
	// 	'priority' => 1
	// ));

	$wp_customize->add_setting('bbdeluxe-accent-secondary', array(
		'default' => '#e29134',
		'transport' => 'refresh'
	));

	$wp_customize->add_setting('bbdeluxe-accent-secondary-hover', array(
		'default' => '#e29134',
		'transport' => 'refresh'
	));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bbdeluxe-accent-secondary-color', array(
		'label' => __('Secondary Accent Color', 'bbdeluxe'),
		'section' => 'fl-accent-color',
		'settings' => 'bbdeluxe-accent-secondary'
	)));

	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bbdeluxe-accent-secondary-color-hover', array(
		'label' => __('Secondary Accent Color Hover', 'bbdeluxe'),
		'section' => 'fl-accent-color',
		'settings' => 'bbdeluxe-accent-secondary-hover'
	)));
}
add_action( 'customize_register', 'bbdeluxe_customize_register' );

// Set variables to that of customizer
function wp_scss_set_variables(){

	// Get setting from customizer
	$theme_accent = get_theme_mod('fl-accent');
	$theme_accent_hover = get_theme_mod('fl-accent-hover');
	$bbdeluxe_accent_secondary = get_theme_mod('bbdeluxe-accent-secondary');
	$bbdeluxe_accent_secondary_hover = get_theme_mod('bbdeluxe-accent-secondary_hover');

	// Create scss variable from customizer setting
	$variables = array(
		'primary-color' => $theme_accent,
		'primary-color-hover' => $theme_accent_hover,
		'secondary-color' => $bbdeluxe_accent_secondary,
		'secondary-color-hover' => $bbdeluxe_accent_secondary_hover,
		'white' => '#fff',
		'black' => '#1a1a1a'
	);

	return $variables;
}
add_filter('wp_scss_variables','wp_scss_set_variables');

// Always recompile in the customizer.
if ( is_customize_preview() && ! defined( 'WP_SCSS_ALWAYS_RECOMPILE' ) ) {

	define( 'WP_SCSS_ALWAYS_RECOMPILE', true );

}

// Update the default paths to match theme.
$wpscss_options = get_option( 'wpscss_options' );

if ( $wpscss_options['scss_dir'] !== '/scss/src/' || $wpscss_options['css_dir'] !== '/scss/dist/' ) {

	// Alter the options array appropriately.
	$wpscss_options['scss_dir'] = '/scss/src/';
	$wpscss_options['css_dir']  = '/scss/dist/';

	// Update entire array
	update_option( 'wpscss_options', $wpscss_options );

}