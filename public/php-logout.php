<?php

require('../../hereafter_blog/wp-load.php' );

function wpdocs_custom_logout() {
   wp_logout();
}

wpdocs_custom_logout();

header("location:/");

?>