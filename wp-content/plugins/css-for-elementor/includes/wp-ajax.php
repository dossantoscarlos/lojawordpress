<?php

add_action('wp_ajax_review_already_did', 'csssfe_review_already_did');
add_action('wp_ajax_nopriv_review_already_did', 'csssfe_review_already_did');

function csssfe_review_already_did(){

    global $wpdb;
    $tablename = $wpdb->prefix . "options";

    $value = ' ';

    $sql = "UPDATE `$tablename` SET `option_value` = '$value' WHERE option_name = 'cssfe_install_time'";

    $wpdb->query($sql);
    //echo $estimateId;

    wp_die(); // this is required to terminate immediately and return a proper response
}

add_action('wp_ajax_maybe_later_will_review', 'csssfe_maybe_later_will_review');
add_action('wp_ajax_nopriv_maybe_later_will_review', 'csssfe_maybe_later_will_review');

function csssfe_maybe_later_will_review() {

    global $wpdb;
    $tablename = $wpdb->prefix . "options";

    $value = strtotime("now");

    $sql = "UPDATE `$tablename` SET `option_value` = '$value' WHERE option_name = 'cssfe_install_time'";

    $wpdb->query($sql);
    //echo $estimateId;

    wp_die(); // this is required to terminate immediately and return a proper response
}
