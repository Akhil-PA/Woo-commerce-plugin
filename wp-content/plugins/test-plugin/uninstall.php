<?php
/**
 * Trigger this file on Plugin uninstall
 * 
 * @package basicPlugin
 */
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}

$books = get_posts(array('post_type' => 'book', 'numberposts' => -1));

foreach ($books as $book) {
    wp_delete_post($book->ID, false);
}

global $wpdb;
$wpdb->query("DELETE from test_posts where post_type = 'book'");
$wpdb->query("DELETE from test_postmeta where post_id NOT IN (SELECT id FROM test_posts)");
$wpdb->query("DELETE from test_term_relationships where object_id NOT IN (SELECT id FROM test_posts)");