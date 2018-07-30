<?php
/**
 * shortcodes class
 *
 * @since 1.7
 */
final class bbChildThemeDeluxeShortcodes {

	/**
	 * Add shortcodes available in theme.
	 */
	static public function init() {
		add_shortcode( 'nwm_decorative_separator', array( 'bbChildThemeDeluxeShortcodes', 'nwm_decorative_separator' ) );
	}

	/**
	 * Homepage Hero
	 */
	static function nwm_decorative_separator($atts) {
	
		$atts = shortcode_atts( array(
			'image-url' => 'url',
		), $atts );

		ob_start();
		?>

		<div class="decorative-separator">
			<img src="<?=$atts['image-url'];?>">
		</div>

		<?php

		return ob_get_clean();

	}

}
bbChildThemeDeluxeShortcodes::init();