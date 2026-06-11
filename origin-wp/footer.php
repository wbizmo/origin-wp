<?php
/**
 * Footer template.
 *
 * @package Origin_WP
 */
?>

<footer class="origin-site-footer">
    <div class="origin-container origin-footer-inner">
        <p>
            &copy; <?php echo esc_html(date_i18n('Y')); ?>
            <?php bloginfo('name'); ?>.
            <?php esc_html_e('Built with Origin WP.', 'origin-wp'); ?>
        </p>

        <nav class="origin-footer-nav" aria-label="<?php esc_attr_e('Footer menu', 'origin-wp'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container'      => false,
                'fallback_cb'    => false,
                'depth'          => 1,
            ]);
            ?>
        </nav>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>