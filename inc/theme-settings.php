<?php
/**
 * Check and setup theme's default settings
 *
 * @package clearthoughts
 *
 */

if ( ! function_exists( 'setup_theme_default_settings' ) ) :
	function setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$clearthoughts_posts_index_style = get_theme_mod( 'clearthoughts_posts_index_style' );
		if ( '' == $clearthoughts_posts_index_style ) {
			set_theme_mod( 'clearthoughts_posts_index_style', 'default' );
		}

		// Sidebar position.
		$clearthoughts_sidebar_position = get_theme_mod( 'clearthoughts_sidebar_position' );
		if ( '' == $clearthoughts_sidebar_position ) {
			set_theme_mod( 'clearthoughts_sidebar_position', 'right' );
		}

		// Container width.
		$clearthoughts_container_type = get_theme_mod( 'clearthoughts_container_type' );
		if ( '' == $clearthoughts_container_type ) {
			set_theme_mod( 'clearthoughts_container_type', 'container' );
		}
	}
endif;
