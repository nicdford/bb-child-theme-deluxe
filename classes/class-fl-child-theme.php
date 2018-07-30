<?php

/**
 * Helper class for child theme functions.
 *
 * @class FLChildTheme
 */
final class FLChildTheme {
    
    /**
	 * Enqueues scripts and styles.
	 *
     * @return void
     */
    static public function enqueue_scripts()
    {
        
        wp_enqueue_style( 'fl-child-theme', FL_CHILD_THEME_URL . '/style.css' );
        wp_enqueue_style( 'bb-child-theme-dexlue-styles', FL_CHILD_THEME_URL . '/scss/dist/deluxe-styles.css', array(), time() );

        wp_enqueue_script( 'bb-child-theme-dexlue-scripts', FL_CHILD_THEME_URL . '/js/scripts.js', array(), time() );

    }
}