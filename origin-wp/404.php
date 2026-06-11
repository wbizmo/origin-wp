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
                Error 404
            </span>

            <h1 class="origin-404-title">
                Page not found
            </h1>

            <p class="origin-404-description">
                The page you're looking for may have been moved, deleted,
                or never existed in the first place.
            </p>

            <div class="origin-404-actions">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="origin-btn">
                    Back Home
                </a>
            </div>

            <div class="origin-404-search">
                <?php get_search_form(); ?>
            </div>

        </section>

    </div>
</main>

<?php get_footer(); ?>