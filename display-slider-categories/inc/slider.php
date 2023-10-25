<?php
/**
 * Slider start
 */
function category_slider_shop_thumbnail_wrap_start() {
	if ( is_product_category() ) {
		echo '<div class="swiper category-slider">';
		echo '<div class="swiper-wrapper">';
		echo '<div class="swiper-slide">';
	}
}

add_action( 'woocommerce_before_shop_loop_item', 'category_slider_shop_thumbnail_wrap_start', 7 );

/**
 * Slider end
 */
function category_slider_shop_thumbnail_wrap_end() {
	global $product;

	if ( is_product_category() ) {
		echo '</div>';//swiper-slide
		if ( $product ) {
			$additional_image_id = get_field( 'product_cropper_image', $product->get_id() );
			if ( ! empty( $additional_image_id ) ) {
				$additional_image_url  = wp_get_attachment_url( $additional_image_id );
				$additional_image_html = '<img src="' . $additional_image_url . '">';
				echo '<div class="swiper-slide">';
				echo $additional_image_html;
				echo '</div>';
			}
		}
		echo '</div>';//swiper-wrapper
		//pagination:
		echo '<div class="swiper-pagination"></div>';
		echo '</div>';//swiper
	}
}

add_action( 'woocommerce_after_shop_loop_item', 'category_slider_shop_thumbnail_wrap_end', 7 );


function add_theme_scripts() {
	if ( is_product_category() ) {
		wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css' );
		wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js' );

		wp_enqueue_style( 'category-slider', plugins_url( '../resources/css/styles.css', __FILE__ ) );
		wp_enqueue_script( 'category-slider', plugins_url( '../resources/js/category_slider.js', __FILE__ ), array( 'jquery' ), true );
	}
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );



