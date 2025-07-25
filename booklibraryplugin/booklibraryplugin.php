<?php
/**
 * Plugin Name: Book Library Plugin
 * Description: Adds a custom post type "Book" with Author Name and Published Year.
 * Version: 1.0
 * Author: Niranjan Dahal
 */

// Register Custom Post Type: Book
function blp_register_book_post_type() {
    $args = [
        'label' => 'Books',
        'public' => true,
        'menu_icon' => 'dashicons-book',
        'supports' => ['title', 'editor'],
        'show_in_rest' => true,
    ];
    register_post_type('book', $args);
}
add_action('init', 'blp_register_book_post_type');

// Add Meta Boxes
function blp_add_meta_boxes() {
    add_meta_box('blp_author_name', 'Author Name', 'blp_author_name_callback', 'book', 'side');
    add_meta_box('blp_published_year', 'Published Year', 'blp_published_year_callback', 'book', 'side');
}
add_action('add_meta_boxes', 'blp_add_meta_boxes');

// Author Name Field
function blp_author_name_callback($post) {
    wp_nonce_field('blp_save_book_meta', 'blp_book_meta_nonce');
    $value = get_post_meta($post->ID, '_blp_author_name', true);
    echo '<input type="text" name="blp_author_name" value="' . esc_attr($value) . '" style="width:100%;" />';
}

// Published Year Field
function blp_published_year_callback($post) {
    $value = get_post_meta($post->ID, '_blp_published_year', true);
    echo '<input type="number" name="blp_published_year" value="' . esc_attr($value) . '" style="width:100%;" />';
}

// Save Meta Fields
function blp_save_book_meta($post_id) {
    if (!isset($_POST['blp_book_meta_nonce']) || !wp_verify_nonce($_POST['blp_book_meta_nonce'], 'blp_save_book_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (isset($_POST['blp_author_name'])) {
        update_post_meta($post_id, '_blp_author_name', sanitize_text_field($_POST['blp_author_name']));
    }

    if (isset($_POST['blp_published_year'])) {
        update_post_meta($post_id, '_blp_published_year', intval($_POST['blp_published_year']));
    }
}
add_action('save_post', 'blp_save_book_meta');

// Show Custom Columns
function blp_add_custom_columns($columns) {
    $columns['author_name'] = 'Author Name';
    $columns['published_year'] = 'Published Year';
    return $columns;
}
add_filter('manage_book_posts_columns', 'blp_add_custom_columns');

function blp_custom_column_data($column, $post_id) {
    if ($column == 'author_name') {
        echo esc_html(get_post_meta($post_id, '_blp_author_name', true));
    } elseif ($column == 'published_year') {
        echo esc_html(get_post_meta($post_id, '_blp_published_year', true));
    }
}
add_action('manage_book_posts_custom_column', 'blp_custom_column_data', 10, 2);
