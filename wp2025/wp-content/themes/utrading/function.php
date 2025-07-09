<?php
/**
 * U-Trade functions
 */

//Admin css
add_editor_style( array( 'css/admin.css' ) );

if ( ! function_exists( 'utrading_setup' ) ) :
function utrading_setup() {

    load_theme_textdomain( 'cv-workfolio', get_template_directory() . '/languages' );

	// Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'cv_workfolio_custom_background_args', array(
	    'default-color' => 'ffffff',
	    'default-image' => '',
    ) ) );

	/**
	 * Customizer
	 */
	require get_template_directory() . '/inc/customizer.php';
}
endif; 
add_action( 'after_setup_theme', 'utrading_setup' );

