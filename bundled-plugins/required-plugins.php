<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function my_theme_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		/*
		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'TGM Example Plugin', // The plugin name.
			'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
			'source'             => get_stylesheet_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),
		*/

				// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'               => 'WooCrack Updater',
			'slug'               => 'woocrack',
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/woocrack-updater-plugin-2.0.zip',
		),		

		array(
			'name'               => 'Elementor Website Builder – More than Just a Page Builder',
			'slug'               => 'elementor',
			'force_deactivation' => true,
			'required'           => true,
		),
		
		array(
			'name'               => 'All-in-One WP Migration',
			'slug'               => 'all-in-one-wp-migration',
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/all-in-one-wp-migration.zip',
			'required'           => true,
			'force_activation'   => true,
		),
		
		array(
			'name'               => 'All-in-One WP Migration Unlimited Extension',
			'slug'               => 'all-in-one-wp-migration-unlimited-extension', 
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/all-in-one-wp-migration-unlimited-extension.zip', 
			'required'           => true, 
			'force_activation'   => true, 
		),
		
		array(
			'name'               => 'User Role Editor',
			'slug'               => 'user-role-editor', 
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/user-role-editor.4.64.1.zip', 
			'required'           => true, 
			'force_activation'   => true,
			'force_deactivation' => true,
		),

		array(
			'name'               => 'Yoast Duplicate Post',
			'slug'               => 'duplicate-post', 
			'required'           => true, 
			'force_activation'   => true,
		),
	
		array(
			'name'               => 'Editor Switcher',
			'slug'               => 'editor-switcher', 
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/editor-switcher.zip', 
			'required'           => true, 
			'force_activation'   => true,
			'force_deactivation' => true,
		),
		
		array(
			'name'               => 'Classic Editor',
			'slug'               => 'classic-editor',
		),
				
		array(
			'name'               => 'Solid Security Pro',
			'slug'               => 'ithemes-security-pro',
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/ithemes-security-pro.zip',
		),

		array(
			'name'      => 'iThemes Security',
			'slug'      => 'better-wp-security',
		),

		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
		),
		
		array(
			'name'      => 'WooCommerce Square',
			'slug'      => 'woocommerce-square',
		),

		array(
			'name'      => 'WP Reset – Most Advanced WordPress Reset Tool',
			'slug'      => 'wp-reset',
		),

		array(
			'name'      => 'Simple Page Ordering',
			'slug'      => 'simple-page-ordering',
			'force_activation'   => true,
		),
		array(
			'name'      => 'Dashboard Welcome for Elementor',
			'slug'      => 'dashboard-welcome-for-elementor',
		),
		
		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
		),

		array(
			'name'      => 'File Manager',
			'slug'      => 'wp-file-manager',
		),
		
		array(
			'name'      => 'Offload Media – Cloud Storage',
			'slug'      => 'offload-media-cloud-storage',
		),

		array(
			'name'      => 'User Switching',
			'slug'      => 'user-switching',
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/user-switching.1.7.0.zip',
		),

		array(
			'name'      => 'Username Changer',
			'slug'      => 'username-changer',
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/username-changer.3.2.2.zip',
		),
		
			array(
			'name'      => 'Code Snippets',
			'slug'      => 'code-snippets',
		),

		array(
			'name'      => 'Really Simple SSL',
			'slug'      => 'really-simple-ssl',
		),
			
		array(
			'name'      => 'Advanced Database Cleaner',
			'slug'      => 'advanced-database-cleaner',
		),
	
		array(
			'name'      => 'Kadence WooCommerce Email Designer',
			'slug'      => 'kadence-woocommerce-email-designer',
		),

		array(
			'name'               => 'Shipment Tracking for WooCommerce',
			'slug'               => 'shipmentTracking',
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/woocommerce-shipment-tracking.zip',
		),		

		array(
			'name'               => 'AnyWhere Elementor Pro (Premium)',
			'slug'               => 'anywhere-elementor-pro',
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/anywhere-elementor-pro.zip',
		),	

		array(
			'name'               => 'Extras for Elementor',
			'slug'               => 'extras-elementor',
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/elementor-extras.zip',
		),
		
/* All OceanWP Plugins */
		array(
			'name'               => 'Ocean Extra',
			'slug'               => 'ocean-extra', 
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/ocean-extra.2.2.1.zip', 
			'required'           => true, 
			'force_activation'   => true,
			'force_deactivation' => true,
		),
		
		array(
			'name'               => 'Ocean Pro Demos',
			'slug'               => 'ocean-pro-demos', 
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/ocean-pro-demos.1.5.1.zip',
			'force_activation'   => true,
			'force_deactivation' => true,
		),
	
		array(
			'name'               => 'Ocean Elementor Widgets',
			'slug'               => 'ocean-elementor-widgets', 
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/ocean-elementor-widgets.2.4.4.zip',
		),
			
		array(
			'name'               => 'Ocean Sticky Header',
			'slug'               => 'ocean-sticky-header', 
			'source'             => get_stylesheet_directory() . '/bundled-plugins/plugins/ocean-sticky-header.2.1.2.zip',
			'force_deactivation' => true,
		),
		
		array(
			'name'      => 'Ocean Social Sharing',
			'slug'      => 'ocean-social-sharing',
		),
		
		array(
			'name'      => 'Ocean Modal Window',
			'slug'      => 'ocean-modal-window',
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'rmpit',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
			'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'theme-slug' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'theme-slug'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'theme-slug'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'theme-slug'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'theme-slug'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'theme-slug'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'theme-slug'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'theme-slug'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'theme-slug'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'theme-slug'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ),
			'dismiss'                         => __( 'Dismiss this notice', 'theme-slug' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'theme-slug' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'theme-slug' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}
