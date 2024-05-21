<?php
/**
 * OceanWP Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {

	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );

	// Load the stylesheet.
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	
}

add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );





// Include the library.
require get_template_directory() . '/plugin-update-checker/plugin-update-checker.php';

// Set up the update checker.
add_action('init', function () {
    $theme_update_checker = Puc_v4_Factory::buildUpdateChecker(
        'https://github.com/rickpro2/wordpress-child-theme',
        __FILE__,
        'wordpress-child-theme'
    );

    // Optional: Set the branch that contains the stable release.
    $theme_update_checker->setBranch('main');

    // Optional: If you have a private repository, provide access token.
    // $theme_update_checker->setAuthentication('your-token-here');
});





