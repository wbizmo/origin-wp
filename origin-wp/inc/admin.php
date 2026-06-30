<?php
/**
 * Admin customization.
 *
 * @package Origin_WP
 */

if (!defined('ABSPATH')) {
    exit;
}

function origin_wp_admin_assets() {
    wp_enqueue_style(
        'origin-wp-admin',
        get_template_directory_uri() . '/assets/css/admin.css',
        [],
        ORIGIN_WP_VERSION
    );
}
add_action('admin_enqueue_scripts', 'origin_wp_admin_assets');

function origin_wp_login_assets() {
    wp_enqueue_style(
        'origin-wp-admin',
        get_template_directory_uri() . '/assets/css/admin.css',
        [],
        ORIGIN_WP_VERSION
    );
}
add_action('login_enqueue_scripts', 'origin_wp_login_assets');

function origin_wp_admin_footer() {
    printf(
        esc_html__('Powered by %s', 'origin-wp'),
        '<strong>' . esc_html__('Origin WP', 'origin-wp') . '</strong>'
    );
}
add_filter('admin_footer_text', 'origin_wp_admin_footer');

function origin_wp_dashboard_widget() {
    wp_add_dashboard_widget(
        'origin_wp_dashboard_widget',
        esc_html__('Origin WP', 'origin-wp'),
        'origin_wp_dashboard_widget_content'
    );
}
add_action('wp_dashboard_setup', 'origin_wp_dashboard_widget');

function origin_wp_dashboard_widget_content() {
    ?>
    <div class="origin-dashboard-widget">
        <h3><?php esc_html_e('Welcome to Origin WP', 'origin-wp'); ?></h3>

        <p>
            <?php esc_html_e('Origin WP is active and ready for Elementor, blogging, and custom site building.', 'origin-wp'); ?>
        </p>

        <ul>
            <li><?php esc_html_e('Lightweight foundation', 'origin-wp'); ?></li>
            <li><?php esc_html_e('Enhanced blog layouts', 'origin-wp'); ?></li>
            <li><?php esc_html_e('Elementor ready', 'origin-wp'); ?></li>
            <li><?php esc_html_e('Responsive by default', 'origin-wp'); ?></li>
        </ul>
    </div>
    <?php
}

function origin_wp_login_logo_url() {
    return home_url('/');
}
add_filter('login_headerurl', 'origin_wp_login_logo_url');

function origin_wp_login_logo_title() {
    return get_bloginfo('name');
}
add_filter('login_headertext', 'origin_wp_login_logo_title');
