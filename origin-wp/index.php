<?php
/**
 * Main template file.
 *
 * @package Origin_WP
 */

get_header();
?>

<main id="primary" class="origin-site-main">
    <div class="origin-container">
        <?php if (have_posts()) : ?>
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

<?php
get_footer();