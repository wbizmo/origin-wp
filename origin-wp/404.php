<?php
/**
 * 404 template.
 *
 * @package Origin_WP
 */

get_header();
?>

<main id="primary" class="origin-site-main">
    <div class="origin-container">

        <section class="origin-404">

            <span class="origin-404-label">
                <?php esc_html_e('Error 404', 'origin-wp'); ?>
            </span>

            <h1 class="origin-404-title">
                <?php esc_html_e('Page not found', 'origin-wp'); ?>
            </h1>

            <p class="origin-404-description">
                <?php esc_html_e('The page you are looking for may have been moved, deleted, or never existed in the first place.', 'origin-wp'); ?>
            </p>

            <div class="origin-404-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="origin-btn">
                    <?php esc_html_e('Back Home', 'origin-wp'); ?>
                </a>
            </div>

            <div class="origin-404-search">
                <?php get_search_form(); ?>
            </div>

        </section>

    </div>
</main>

<?php get_footer(); ?>
