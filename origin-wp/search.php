<?php
/**
 * Search template.
 *
 * @package Origin_WP
 */

get_header();
?>

<main id="primary" class="origin-site-main">
    <div class="origin-container">
        <?php if (have_posts()) : ?>
            <header class="origin-archive-header">
                <h1>
                    <?php
                    printf(
                        esc_html__('Search results for: %s', 'origin-wp'),
                        '<span>' . esc_html(get_search_query()) . '</span>'
                    );
                    ?>
                </h1>
            </header>

            <div class="origin-post-grid">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/post-card');
                endwhile;
                ?>
            </div>

            <?php the_posts_pagination(); ?>

        <?php else : ?>
            <?php get_template_part('template-parts/empty'); ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>