<?php
/**
 * Plugin Name: Carousels For Elementor
 * Description: Creates Carousel UIs extension for elementor
 * Version:     1.0.0
 * Author:      Tatenda Munenge
 * Author URI:  https://tatendamunenge.me
 * Text Domain: carousels-for-elementor
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 * 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register List Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_tabbed_carousel_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/tabbed-carousel-widget.php' );

	$widgets_manager->register( new \Elementor_Tabbed_Carousel_Widget() );

}
add_action( 'elementor/widgets/register', 'register_tabbed_carousel_widget' );