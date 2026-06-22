<?php
/**
 * Origin WP functions and definitions.
 *
 * @package Origin_WP
 */

if (!defined('ABSPATH')) {
    exit;
}

define('ORIGIN_WP_VERSION', '1.0.2');
define('ORIGIN_WP_DIR', get_template_directory());
define('ORIGIN_WP_URI', get_template_directory_uri());

require ORIGIN_WP_DIR . '/inc/template-tags.php';
require ORIGIN_WP_DIR . '/inc/admin.php';

function origin_wp_setup() {
    load_theme_textdomain('origin-wp', ORIGIN_WP_DIR . '/languages');

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 240,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    register_nav_menus([
        'primary' => __('Primary Menu', 'origin-wp'),
        'footer'  => __('Footer Menu', 'origin-wp'),
    ]);
}
add_action('after_setup_theme', 'origin_wp_setup');

function origin_wp_content_width() {
    $GLOBALS['content_width'] = apply_filters('origin_wp_content_width', 1200);
}
add_action('after_setup_theme', 'origin_wp_content_width', 0);

function origin_wp_scripts() {
    wp_enqueue_style('origin-wp-theme', ORIGIN_WP_URI . '/assets/css/theme.css', [], ORIGIN_WP_VERSION);
    wp_enqueue_style('origin-wp-blog', ORIGIN_WP_URI . '/assets/css/blog.css', ['origin-wp-theme'], ORIGIN_WP_VERSION);

    wp_enqueue_script('origin-wp-theme', ORIGIN_WP_URI . '/assets/js/theme.js', [], ORIGIN_WP_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'origin_wp_scripts');