<?php
add_filter( 'wp_mail_from_name', 'custom_snf_mail_from_name' );
function custom_snf_mail_from_name( $original_email_from ) {
    return 'SNF Subsidiary Admin';
}
add_filter( 'wp_mail_from', 'custom_snf_mail_from' );
function custom_snf_mail_from( $original_email_address ) {
    return 'webmaster@country.snf.com';
}
add_filter('wp_mail_content_type', function( $content_type ) {
    return 'text/html';
});
function authorNotification( $new_status, $old_status, $post ) {
    if ( $new_status == 'publish' && $old_status != 'publish' ) {
        $websiteCountry = get_option( 'country_name' );
        $admins = get_users( array ( 'role' => 'administrator' ) );
        $emails      = array ();
        foreach ( $admins as $admin )
            $emails[] = $admin->user_email;
        $message = "<h1>Hi SNF Admin:</h1><br>
                    <p>The site : <b>".$websiteCountry." </b> has recently published a new page.</p></br>
                    <p>Page Title: <i><b>".$post->post_title." </b></i></p><br>
                    <p>To view this page you can find it here: ".get_permalink( $post_id )." </p><br><br>
                    <p> Thanks</p>";
        wp_mail($emails, "New Post Published", $message);
    }
}
add_action('transition_post_status', 'authorNotification', 10, 3 );
