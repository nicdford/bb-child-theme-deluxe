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

  /**
  * Enable DFV editing on Frontend for Beaver Builder Only
  *
  * @return void
  */
  static public function enable_pods_on_front()
  {
    if ( version_compare( PodsInit::$version, '2.7.13', '>=' ) ) {
      if ( isset($_GET['fl_builder']) ) {
        return true;
      }
    } else {
      echo "Pods DFV on Frontend requires Pods 2.7.13 or greater";
    }
  }

  /**
  * Enable SVG Support in WordPress
  *
  * @return $mimes
  */
  static public function enable_svg_support($mimes)
  {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }

  /**
  * Enable Filter to only Display Child Pages of Posts Module
  *
  * @return $args
  */
  static public function enable_filter_only_display_child_pages($args)
  { 
    if ( FLBuilderModel::is_builder_enabled() && strpos($args['settings']->class, 'only-show-child-pages') !== false ) {
      $current_post_id = get_the_id();
      $args['post_parent'] = $current_post_id;
      return $args;
    } else {
      return $args;
    }
  }
}
