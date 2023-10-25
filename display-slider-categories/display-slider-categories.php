<?php
/**
 * Plugin name: Display Slider For Categories
 * Author: Iryna Berezhna
 * Version: 1.0.0
 * Description: Display slider for Woocommerce product categories
 */

/**
 * Check if WooCommerce and ACF are active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && class_exists('ACF')) {
	include 'inc/slider.php';
}