<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;





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

/* Start Adding Functions Below this Line */





/* Create Admin/Webmaster User Role */
add_role(
    'webmaster', //  System name of the role.
    __( 'Admin'  ), // Display name of the role.
    array( 
        'assign_product_terms'  => true,
        'assign_shop_coupon_terms'  => true,
        'assign_shop_order_terms'  => true,
		'copy_posts'  => true,
		'create_posts'  => true,
		'create_users'  => true,
		'delete_aggregator-records'  => true,
		'delete_others_aggregator-records'  => true,
		'delete_others_pages'  => true,
		'delete_others_posts'  => true,
		'delete_others_products'  => true,
		'delete_others_shop_coupons'  => true,
		'delete_others_shop_orders'  => true,
		'delete_others_tribe_events'  => true,
		'delete_others_tribe_organizers'  => true,
		'delete_others_tribe_venues'  => true,
		'delete_pages'  => true,
		'delete_posts'  => true,
		'delete_private_aggregator-records'  => true,
		'delete_private_pages'  => true,
		'delete_private_posts'  => true,
		'delete_private_products'  => true,
		'delete_private_shop_coupons'  => true,
		'delete_private_shop_orders'  => true,
		'delete_private_tribe_events'  => true,
		'delete_private_tribe_organizers'  => true,
		'delete_private_tribe_venues'  => true,
		'delete_product'  => true,
		'delete_product_terms'  => true,
		'delete_products'  => true,
		'delete_published_aggregator-records'  => true,
		'delete_published_pages'  => true,
		'delete_published_posts'  => true,
		'delete_published_products'  => true,
		'delete_published_shop_coupons'  => true,
		'delete_published_shop_orders'  => true,
		'delete_published_tribe_events'  => true,
		'delete_published_tribe_organizers'  => true,
		'delete_published_tribe_venues'  => true,
		'delete_shop_coupon'  => true,
		'delete_shop_coupon_terms'  => true,
		'delete_shop_coupons'  => true,
		'delete_shop_order'  => true,
		'delete_shop_order_terms'  => true,
  		'delete_shop_orders'  => true,
		'delete_tribe_events'  => true,
		'delete_tribe_organizers'  => true,
		'delete_tribe_venues'  => true,
		'delete_users'  => true,
		'delete_wpforms_forms'  => true,
		'edit_aggregator-records'  => true,
		'edit_dashboard'  => true,
		'edit_others_aggregator-records'  => true,
		'edit_others_pages'  => true,
		'edit_others_posts'  => true,
		'edit_others_products'  => true,
		'edit_others_shop_coupons'  => true,
		'edit_others_shop_orders'  => true,
		'edit_others_tribe_events'  => true,
		'edit_others_tribe_organizers'  => true,
		'edit_others_tribe_venues'  => true,
 		'edit_others_wpforms_forms'  => true,
		'edit_pages'  => true,
		'edit_posts'  => true,
		'edit_private_aggregator-records'  => true,
		'edit_private_pages'  => true,
		'edit_private_posts'  => true,
		'edit_private_products'  => true,
		'edit_private_shop_coupons'  => true,
		'edit_private_shop_orders'  => true,
		'edit_private_tribe_events'  => true,
		'edit_private_tribe_organizers'  => true,
		'edit_private_tribe_venues'  => true,
		'edit_product'  => true,
		'edit_product_terms'  => true,
 		'edit_products'  => true,
		'edit_published_aggregator-records'  => true,
		'edit_published_pages'  => true,
		'edit_published_posts'  => true,
		'edit_published_products'  => true,
		'edit_published_shop_coupons'  => true,
		'edit_published_shop_orders'  => true,
		'edit_published_tribe_events'  => true,
		'edit_published_tribe_organizers'  => true,
		'edit_published_tribe_venues'  => true,
		'edit_shop_coupon'  => true,
		'edit_shop_coupon_terms'  => true,
		'edit_shop_coupons'  => true,
		'edit_shop_order'  => true,
		'edit_shop_order_terms'  => true,
		'edit_shop_orders'  => true,
		'edit_theme_options'  => false,
		'edit_tribe_events'  => true,
		'edit_tribe_organizers'  => true,
		'edit_tribe_venues'  => true,
		'edit_users'  => true,
		'edit_wpforms_forms'  => true,
		'editor'  => true,
		'export'  => false,
		'import'  => false,
		'list_users'  => true,
		'manage_categories'  => true,
		'manage_links'  => true,
		'manage_options'  => false,
		'manage_product_terms'  => true,
		'manage_shop_coupon_terms'  => true,
		'manage_shop_order_terms'  => true,
		'manage_woocommerce'  => true,
		'moderate_comments'  => true,
		'promote_users'  => true,
  		'publish_aggregator-records'  => true,
		'publish_pages'  => true,		
		'publish_posts'  => true,
		'publish_products'  => true,
		'publish_shop_coupons'  => true,
		'publish_shop_orders'  => true,
		'publish_tribe_events'  => true,
		'publish_tribe_organizers'  => true,
		'publish_tribe_venues'  => true,
		'publish_wpforms_forms'  => true,
		'read'  => true,
		'read_private_aggregator-records'  => true,
		'read_private_pages'  => true,
		'read_private_posts'  => true,
		'read_private_products'  => true,
		'read_private_shop_coupons'  => true,
		'read_private_shop_orders'  => true,
		'read_private_tribe_events'  => true,
		'read_private_tribe_organizers'  => true,
		'read_private_tribe_venues'  => true,
		'read_private_wpforms_forms'  => true,
		'read_product'  => true,
		'read_shop_coupon'  => true,
		'read_shop_order'  => true,
		'remove_users'  => true,
		'resume_plugins'  => false,
		'resume_themes'  => false,
		'tablepress_access_about_screen'  => true,
		'tablepress_add_tables'  => true,
		'tablepress_edit_tables'  => true,
		'tablepress_export_tables'  => true,
		'tablepress_import_tables'  => true,
		'tablepress_list_tables'  => true,
		'unfiltered_html'  => true,
		'unfiltered_upload'  => true,
		'upload_files'  => true,
		'ure_admin_menu_access'  => true,
		'ure_edit_posts_access'  => true,
		'ure_export_roles'  => true,
		'ure_front_end_menu_access'  => true,
		'ure_import_roles'  => true,
		'ure_meta_boxes_access'  => true,
		'ure_nav_menus_access'  => true,
		'ure_other_roles_access'  => true,
		'ure_plugins_activation_access'  => true,
		'ure_view_posts_access'  => true,
		'ure_widgets_access'  => true,
		'ure_widgets_show_access'  => true,
		'view_site_health_checks'  => false,          
    )
);





/* Remove Staff Member User Role */
//remove_role("webmaster");
//remove_role("admin");
//remove_role("test");





/* Display Page IDs */
add_filter( 'manage_pages_columns', 'revealid_add_pages_id_column', 5 );
add_action( 'manage_pages_custom_column', 'revealid_pages_id_column_content', 5, 2 );


function revealid_add_pages_id_column( $columns ) {
   $columns['revealid_id'] = 'ID';
   return $columns;
}

function revealid_pages_id_column_content( $column, $id ) {
  if( 'revealid_id' == $column ) {
    echo $id;
  }
}





/* Require Lib Folder & Files */
require( get_stylesheet_directory() . '/lib/A.php' );





/* Required plugins */
require_once get_stylesheet_directory() . '/lib/bundled-plugins/required-plugins.php';





/* Display Post IDs */
add_filter( 'manage_posts_columns', 'revealid_add_post_id_column', 5 );
add_action( 'manage_posts_custom_column', 'revealid_post_id_column_content', 5, 2 );


function revealid_add_post_id_column( $columns ) {
   $columns['revealid_id'] = 'ID';
   return $columns;
}

function revealid_post_id_column_content( $column, $id ) {
  if( 'revealid_id' == $column ) {
    echo $id;
  }
}





/* Add URL Column To WordPress Media Library */
function muc_column( $cols ) {
        $cols["media_url"] = "URL";
        return $cols;
}
function muc_value( $column_name, $id ) {
        if ( $column_name == "media_url" ) echo '<input type="text" width="100%" onclick="jQuery(this).select();" value="'. wp_get_attachment_url( $id ). '" readonly="true" />';
}
add_filter( 'manage_media_columns', 'muc_column' );
add_action( 'manage_media_custom_column', 'muc_value', 10, 2 );










/* Ocean WP Liceens Key */
function ocean_pro_admin_notice() {
    // Check if user is an admin
    if (current_user_can('administrator')) {
        // Get the dismissed status from the database
        $dismissed = get_option('ocean_pro_dismissed_notice', false);

        // If the notice is not dismissed, display it
        if (!$dismissed) {
            echo '<div class="notice notice-info is-dismissible" id="ocean-pro-notice">';
            echo '<p>OceanWP Pro Bundle License Key:	 0611aff7897281394aaf379b83a145ca</p>'; // Replace XXXXX with your key
            echo '</div>';
        }
    }
}
add_action('admin_notices', 'ocean_pro_admin_notice');

function ocean_pro_dismiss_notice() {
    // Check if the user dismissed the notice
    if (isset($_GET['ocean_pro_dismiss']) && $_GET['ocean_pro_dismiss'] == 'true') {
        update_option('ocean_pro_dismissed_notice', true);
        // Redirect to avoid resubmitting the form
        wp_redirect(remove_query_arg('ocean_pro_dismiss'));
        exit;
    }
}
add_action('admin_init', 'ocean_pro_dismiss_notice');

// Add a JavaScript handler for the dismiss action
function ocean_pro_dismiss_notice_js() {
    ?>
    <script type="text/javascript">
        jQuery(document).on('click', '#ocean-pro-notice .notice-dismiss', function() {
            // Append the query string to the URL
            var url = '<?php echo esc_url(admin_url('admin.php')); ?>?ocean_pro_dismiss=true';
            window.location.href = url;
        });
    </script>
    <?php
}
add_action('admin_footer', 'ocean_pro_dismiss_notice_js');









/* Github updater */
require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/rickpro2/rmpit-child-theme/',
	__FILE__,
	'rmpit-child-theme'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('your-token-here');



/* Stop Adding Functions Below this Line */
