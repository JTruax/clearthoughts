<?php
/**
 * Clear Thoughts Theme Customizer
 *
 * @package clearthoughts
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'clearthoughts_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function clearthoughts_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'clearthoughts_customize_register' );

if ( ! function_exists( 'clearthoughts_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function clearthoughts_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section( 'clearthoughts_theme_layout_options', array(
			'title'       => __( 'Theme Layout Settings', 'clearthoughts' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Container width and sidebar defaults', 'clearthoughts' ),
			'priority'    => 160,
		) );

		$wp_customize->add_setting( 'clearthoughts_container_type', array(
			'default'           => 'container',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_textarea',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'container_type', array(
					'label'       => __( 'Container Width', 'clearthoughts' ),
					'description' => __( "Choose between Bootstrap's container and container-fluid", 'clearthoughts' ),
					'section'     => 'clearthoughts_theme_layout_options',
					'settings'    => 'clearthoughts_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'clearthoughts' ),
						'container-fluid' => __( 'Full width container', 'clearthoughts' ),
					),
					'priority'    => '10',
				)
			) );
        
        
        
        //-- NAV BACKGROUND
        $wp_customize->add_setting( 'nav_bg_color', array(
			'default'           => '#fff',
			'type'              => 'theme_mod',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
		) );
        
        $wp_customize->add_section( 'clearthoughts_nav_bg_color', array(
			'title'       => __( 'Navigation Background', 'clearthoughts' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Background Color for top Navigation', 'clearthoughts' ),
			'priority'    => 70,
		) );
        
        $wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'clearthoughts_nav_control', array(
					'label'       => __( 'Background Color', 'clearthoughts' ),
					'description' => __( "Choose a background color",
					'clearthoughts' ),
					'section'     => 'clearthoughts_nav_bg_color',
					'settings'    => 'nav_bg_color',
				)
			) );
        
        
        
        //-- HEADER & FOOTER BG COLORS
        $wp_customize->add_setting( 'hf_bg_color', array(
			'default'           => '#e9ecef',
			'type'              => 'theme_mod',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
		) );
        
        $wp_customize->add_section( 'clearthoughts_hf_bg_color', array(
			'title'       => __( 'Header & Footer Widgets Background', 'clearthoughts' ),
			'capability'  => 'edit_theme_options',
			'description' => __( 'Background Color for Header & Footer', 'clearthoughts' ),
			'priority'    => 70,
		) );
        
        $wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'clearthoughts_hf_color_control', array(
					'label'       => __( 'Background Color', 'clearthoughts' ),
					'description' => __( "Choose a background color",
					'clearthoughts' ),
					'section'     => 'clearthoughts_hf_bg_color',
					'settings'    => 'hf_bg_color',
				)
			) );
        
        //-- HEADING & META COLORS
        $wp_customize->add_setting( 'meta_color', array(
			'default'           => '#181818',
			'type'              => 'theme_mod',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
		) );
        
        
        $wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'clearthoughts_link_color_control', array(
					'label'       => __( 'Secondary Color', 'clearthoughts' ),
					'description' => __( "Secondary font color for titles, meta info and links.",
					'clearthoughts' ),
					'section'     => 'colors',
					'settings'    => 'meta_color',
				)
			) );
    
        
        //-- BODY FONT COLORS
        $wp_customize->add_setting( 'body_color', array(
			'default'           => '#404040',
			'type'              => 'theme_mod',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
		) );
        
        $wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'clearthoughts_body_color_control', array(
					'label'       => __( 'Body Font Color', 'clearthoughts' ),
					'description' => __( "Choose a color for main body content",
					'clearthoughts' ),
					'section'     => 'colors',
					'settings'    => 'body_color',
				)
			) );
        
        
        //-- LINK COLOR, SINGLE
        $wp_customize->add_setting( 'single_link_color', array(
			'default'           => '#007bff',//Default Bootstrap link color
			'type'              => 'theme_mod',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
		) );
        
        $wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'clearthoughts_single_link_color_control', array(
					'label'       => __( 'Single Link Color', 'clearthoughts' ),
					'description' => __( "Choose a color for content links",
					'clearthoughts' ),
					'section'     => 'colors',
					'settings'    => 'single_link_color',
				)
			) );
    

	}
} // endif function_exists( 'clearthoughts_theme_customize_register' ).
add_action( 'customize_register', 'clearthoughts_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'clearthoughts_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function clearthoughts_customize_preview_js() {
		wp_enqueue_script( 'clearthoughts_customizer', get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ), '20130508', true );
	}
}


//CUSTOM COLOR OUTPUT, CSS
function clearthoughts_customize_css() { ?>
<style type="text/css">
    .entry-meta li a,
    .entry-meta li a:link,
    .entry-meta li a:visited,
    .entry-title a,
    .entry-title,
    .footer-widget p,
    .footer-widget ul li,
    .footer-widget ol li,
    .static-hero-widget p,
    .static-hero-widget ul li,
    .static-hero-widget ol li,
    .widget-title,
    .author-name,
    .comment-reply-title,
    .footer-widget a,
    .static-hero-widget a,
    .nav-previous a,
    .nav-next a,
    .widget ul li:before,
    .footer-widget ul li:before,
    .static-hero-widget ul li:before {
        color: <?php echo get_theme_mod('meta_color', '#181818');
        ?>;
    }

    .single .entry-content a,
    .required,
    .widget a,
    #comments a,
    ul.pagination a,
    .fa-step-forward,
    body.search-results .page-title span,
    .entry-content a {
        color: <?php echo get_theme_mod('single_link_color', '#007bff');
        ?>;
    }

    #searchform input#searchsubmit {
        background-color: <?php echo get_theme_mod('single_link_color', '#007bff');
        ?>;
    }

    .clearthoughts-read-more-link,
    .btn-secondary {
        color: <?php echo get_theme_mod('meta_color', '#181818');
        ?>!important;
        border-color: <?php echo get_theme_mod('meta_color', '#181818');
        ?>;
    }

    .clearthoughts-read-more-link:hover,
    .clearthoughts-read-more-link:focus,
    .clearthoughts-read-more-link:active,
    .nav-previous a:hover,
    .nav-next a:hover,
    .nav-previous a:focus,
    .nav-next a:focus,
    .nav-previous a:active,
    .nav-next a:active,
    .form-submit input.btn:hover,
    .form-submit input.btn:focus,
    .form-submit input.btn:active,
    .tagcloud a:hover,
    .tagcloud a:focus,
    .tagcloud a:active,
    input#searchsubmit:hover,
    input#searchsubmit:active,
    input#searchsubmit:focus,
    .page-item.active .page-link,
    .page-item .page-link:hover,
    .page-item .page-link:active,
    .page-item .page-link:focus {
        background-color: <?php echo get_theme_mod('meta_color', '#181818');
        ?>!important;
        border-color: <?php echo get_theme_mod('meta_color', '#181818');
        ?>;
    }

    article.post p,
    article.post ul,
    article.post ol,
    article.post li,
    article.post table,
    .site-footer p,
    .site-footer a {
        color: <?php echo get_theme_mod('body_color', '#404040');
        ?>;
    }

    .navbar {
        background-color: <?php echo get_theme_mod('nav_bg_color', '#ffffff');
        ?>
    }



    #wrapper-static-hero,
    #wrapper-footer-full {
        background-color: <?php echo get_theme_mod('hf_bg_color', '#e9ecef');
        ?>;
    }
</style>

    <?php }

add_action('wp_head', 'clearthoughts_customize_css');//Where the styles will appear
        

