<?php
/**
 
 * Plugin Name:  Image Widget
 * Plugin URI: http://www.allabouthtml.com/plugins/wp-image-widget.zip
 * Description: A simpe and easy way to place an image in Your widget area.
 * Version: 2.0.0
 * Author: Alexander 
 * Author URI: http://www.allabouthtml.com
 
 */

global $wp_image_widget;

if ( ! defined( 'SIW_DIR' ) ) {
	/**
	 * Plugin directory path.
	 *
	 * @since 4.0.0
	 * @type string SIW_DIR
	 */
	define( 'SIW_DIR', plugin_dir_path( __FILE__ ) );
}

/**
 * Check if the installed version of WordPress supports the new media manager.
 *
 * @since 3.0.0
 */
function is_simple_image_widget_legacy() {
	/**
	 * Whether the installed version of WordPress supports the new media manager.
	 *
	 * @since 4.0.0
	 *
	 * @param bool $is_legacy
	 */
	return apply_filters( 'is_simple_image_widget_legacy', version_compare( get_bloginfo( 'version' ), '3.4.2', '<=' ) );
}

/**
 * Include functions and libraries.
 */
require_once( SIW_DIR . 'includes/class-wp-image-widget.php' );
require_once( SIW_DIR . 'includes/class-wp-image-widget-legacy.php' );
require_once( SIW_DIR . 'includes/class-wp-image-widget-plugin.php' );
require_once( SIW_DIR . 'includes/class-wp-image-widget-template-loader.php' );

/**
 * Deprecated main plugin class.
 *
 * @since      3.0.0
 * @deprecated 4.0.0
 */
class WP_Image_Widget_Loader extends WP_Image_Widget_Plugin {}

// Initialize and load the plugin.
$wp_image_widget = new WP_Image_Widget_Plugin();
add_action( 'plugins_loaded', array( $wp_image_widget, 'load' ) );
