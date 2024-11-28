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











/* Remove Staff Member User Role */
//remove_role("webmaster");
//remove_role("admin");
//remove_role("test");














// Display custom footer HTML with a copy button in an admin notice
function custom_footer_admin_notice() {
    // Check if the user is an admin
    if (current_user_can('administrator')) {
        // Check if the notice is already dismissed
        $dismissed = get_option('custom_footer_dismissed_notice', false);

        // If the notice is not dismissed, display it
        if (!$dismissed) {
            echo '<div class="notice notice-info is-dismissible" id="custom-footer-notice">';
            echo '<p><strong>Custom Footer HTML Code:</strong></p>';
            echo '<pre id="custom-footer-text" style="background: #f1f1f1; padding: 10px; border: 1px solid #ddd; border-radius: 4px;">';
            echo '© Copyright [oceanwp_date year="2023"] [oceanwp_site_url] All Rights Reserved | ';
            echo 'Website design by <a href="http://www.rmpit.com" target="_blank">RMPIT LLC</a> | ';
            echo 'Site Owners [oceanwp_login] Here | ';
            echo '<a href="https://webmail.supremecluster.com/" target="_blank" rel="noopener">Email</a>';
            echo '</pre>';
            echo '<button id="copy-footer-text" class="button-primary">Copy to Clipboard</button>';
            echo '</div>';
        }
    }
}
add_action('admin_notices', 'custom_footer_admin_notice');

// Dismiss the custom footer notice
function custom_footer_dismiss_notice() {
    // Check if the dismiss action is requested
    if (isset($_GET['custom_footer_dismiss']) && $_GET['custom_footer_dismiss'] == 'true') {
        update_option('custom_footer_dismissed_notice', true);
        // Redirect to avoid resubmitting the form
        wp_redirect(remove_query_arg('custom_footer_dismiss'));
        exit;
    }
}
add_action('admin_init', 'custom_footer_dismiss_notice');

// JavaScript for dismissing the notice and copying only the footer text
function custom_footer_notice_js() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Dismiss notice when the dismiss button is clicked
            $(document).on('click', '#custom-footer-notice .notice-dismiss', function() {
                var url = '<?php echo esc_url(add_query_arg('custom_footer_dismiss', 'true')); ?>';
                window.location.href = url;
            });

            // Copy only the footer HTML to clipboard when the copy button is clicked
            $('#copy-footer-text').on('click', function() {
                // Select the text content inside the pre element
                var footerText = document.getElementById('custom-footer-text').innerText;

                // Use navigator.clipboard if available
                if (navigator.clipboard) {
                    navigator.clipboard.writeText(footerText).then(function() {
                        alert('Footer HTML copied to clipboard!');
                    }).catch(function(err) {
                        console.error('Failed to copy text: ', err);
                    });
                } else {
                    // Fallback for older browsers
                    var tempTextarea = document.createElement("textarea");
                    tempTextarea.value = footerText;
                    document.body.appendChild(tempTextarea);
                    tempTextarea.select();
                    document.execCommand("copy");
                    document.body.removeChild(tempTextarea);
                    alert('Footer HTML copied to clipboard!');
                }
            });
        });
    </script>
    <?php
}
add_action('admin_footer', 'custom_footer_notice_js');









/* Github updater */
require 'plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://github.com/rickpro2/rmpit-child-theme/',
	__FILE__,
	'rmpit-child-theme'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('1.6');

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('your-token-here');



/* Stop Adding Functions Below this Line */
