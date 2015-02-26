<?php

/**
 * Initialization for WooCommerce shortcodes
 * @see http://docs.woothemes.com/document/woocommerce-shortcodes/
 */

add_action( 'init', 'sandwich_woocommerce_init_editor_styles', 11 );
function sandwich_woocommerce_init_editor_styles() {
	if ( ! class_exists( 'WC_Frontend_Scripts' ) ) {
		return;
	}

	if ( $enqueue_styles = WC_Frontend_Scripts::get_styles() ) {
		foreach ( $enqueue_styles as $handle => $args ) {
			
			// Don't include WC's small screen css because it bugs the display out
			if ( preg_match( '/woocommerce-smallscreen/', $args['src'] ) ) {
				continue;
			}
			
			add_editor_style( $args['src'] );
		}
	}
}