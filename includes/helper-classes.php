<?php
/**
 * Populates CSS classes dropdown selector with custom classes selection.
 *
 * Hooks onto `fl_builder_field_js_config` filter hook. See Beaver Builder code directly
 * for filter hook attributes (in `classes/class-fl-builder-ui-settings-forms.php` file).
 *
 * @param  array  $field      An array of setup data for the field.
 * @param  string $field_key  The field name/key.
 */
function beaver_builder_css_class_dropdown( $field, $field_key ) {
	// Processing
		if ( 'class' == $field_key ) {
			$field['options'] = array(
				/*
				 * First value must be empty, it's mandatory!
				 * To prevent any possible "automatic" CSS class setup (taken from the first
				 * value of dropdown selector).
				 */
				'' => esc_html__( '- Choose from predefined classes -', 'textdomain' ),
				// Optgroup 1
					'optgroup-id-1' => array(
						'label'   => esc_html__( 'Alignments:', 'textdomain' ),
						'options' => array(
							'align-right--destkop' => esc_html__( 'Align Right on Desktop', 'textdomain' ),
				// 			'my-class-2' => esc_html__( 'My custom class 1', 'textdomain' ),
						),
					),
				// Optgroup 2
					'optgroup-id-2' => array(
						'label'   => esc_html__( 'Effects:', 'textdomain' ),
						'options' => array(
							'drop-shadow--box' => esc_html__( 'Drop Shadow (box)', 'textdomain' ),
							'drop-shadow--text' => esc_html__( 'Drop Shadow (text)', 'textdomain' ),
							'image-border' => esc_html__( 'Image Border', 'textdomain' ),
						),
					),
				// Optgroup 3
					'optgroup-id-3' => array(
						'label'   => esc_html__( 'Typography:', 'textdomain' ),
						'options' => array(
							'proxima-nova' => esc_html__( 'Proxima Nova', 'textdomain' ),
							'proxima-nova--bold' => esc_html__( 'Proxima Nova - Bold', 'textdomain' ),
						),
					),
			);
		}
	// Output
		return $field;
} // /beaver_builder_css_class_dropdown
		
add_filter( 'fl_builder_field_js_config', 'beaver_builder_css_class_dropdown', 10, 2 );