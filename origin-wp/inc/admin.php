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
    echo 'Powered by <strong>Origin WP</strong>';
}
add_filter('admin_footer_text', 'origin_wp_admin_footer');

function origin_wp_dashboard_widget() {
    wp_add_dashboard_widget(
        'origin_wp_dashboard_widget',
        'Origin WP',
        'origin_wp_dashboard_widget_content'
    );
}
add_action('wp_dashboard_setup', 'origin_wp_dashboard_widget');

function origin_wp_dashboard_widget_content() {
    ?>
    <div class="origin-dashboard-widget">
        <h3>Welcome to Origin WP</h3>

        <p>
            Origin WP is active and ready for Elementor,
            blogging, and custom site building.
        </p>

        <ul>
            <li>✓ Lightweight foundation</li>
            <li>✓ Enhanced blog layouts</li>
            <li>✓ Elementor ready</li>
            <li>✓ Responsive by default</li>
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

function origin_wp_admin_bar_branding($wp_admin_bar) {
    $wp_admin_bar->add_node([
        'id'    => 'origin-wp-brand',
        'title' => 'Origin WP',
        'href'  => admin_url(),
    ]);
}
add_action('admin_bar_menu', 'origin_wp_admin_bar_branding', 1);