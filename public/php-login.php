<?php

require('../../hereafter_blog/wp-load.php' );

function wpdocs_custom_login() {
    $creds = array(
        'user_login'    => $_GET['user'],
        'user_password' => $_GET['pwd'],
        'remember'      => true
    );
 
    $user = wp_signon( $creds, false );
 
    if ( is_wp_error( $user ) ) {
        echo $user->get_error_message();
    }
}

wpdocs_custom_login();

header("location:/dashboard");

?>