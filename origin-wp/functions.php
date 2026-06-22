<?php
/**
 * Origin WP functions and definitions.
 *
 * @package Origin_WP
 */

if (!defined('ABSPATH')) {
    exit;
}

define('ORIGIN_WP_VERSION', '1.0.5');
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
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/theme.css');
    add_editor_style('assets/css/blog.css');
    add_theme_support('custom-background', [
        'default-color' => 'ffffff',
    ]);
    add_theme_support('custom-header', [
        'default-image' => '',
        'width' => 1200,
        'height' => 400,
        'flex-width' => true,
        'flex-height' => true,
        'header-text' => false,
    ]);
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
function origin_wp_widgets_init() {
    register_sidebar([
        'name'          => __('Sidebar', 'origin-wp'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'origin-wp'),
        'before_widget' => '<section id="%1$s" class="widget origin-widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title origin-widget-title">',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', 'origin_wp_widgets_init');

function origin_wp_register_block_assets() {
    if (function_exists('register_block_style')) {
        register_block_style('core/button', [
            'name'  => 'origin-outline',
            'label' => __('Origin Outline', 'origin-wp'),
        ]);
    }

    if (function_exists('register_block_pattern')) {
        register_block_pattern('origin-wp/simple-intro', [
            'title'       => __('Origin Simple Intro', 'origin-wp'),
            'description' => __('A simple intro section for Origin WP pages.', 'origin-wp'),
            'content'     => '<!-- wp:heading {"level":1} --><h1>' . esc_html__('A Better Starting Point', 'origin-wp') . '</h1><!-- /wp:heading --><!-- wp:paragraph --><p>' . esc_html__('Build clean WordPress websites with Origin WP.', 'origin-wp') . '</p><!-- /wp:paragraph -->',
            'categories'  => ['text'],
        ]);
    }
}
add_action('init', 'origin_wp_register_block_assets');
