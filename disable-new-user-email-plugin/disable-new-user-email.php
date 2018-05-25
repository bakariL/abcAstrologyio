<?php /*
Plugin Name:  Disable New User Email Notifications
Description:  This will Disable the Default WordPress Admin and User Notifications.


if ( ! function_exists( 'wp_send_new_user_notifications' ) ) {
    function wp_send_new_user_notifications( $user_id, $plaintext_pass = '', $notify = '' ) {
                return;
            }
        }
if ( ! function_exists( 'wp_new_user_notification' ) ) {
    function wp_new_user_notification( $user_id, $plaintext_pass = '', $notify = '' ) {
                return;
            }
        }
         */

        function wp_new_user_notification( $user_id, $plaintext_pass = '', $notify = '' ) { return; }
        //function wp_send_new_user_notifications( $user_id, $plaintext_pass = '', $notify = '' ) { return; }
?>