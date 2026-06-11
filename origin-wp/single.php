<?php
/**
 * Single post template.
 *
 * @package Origin_WP
 */

get_header();
?>

<main id="primary" class="origin-site-main">
    <div class="origin-container origin-single-container">
        <?php
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content-single');

            the_post_navigation([
                'prev_text' => '<span>' . esc_html__('Previous', 'origin-wp') . '</span> %title',
                'next_text' => '<span>' . esc_html__('Next', 'origin-wp') . '</span> %title',
            ]);

            if (comments_open() || get_comments_number()) {
                comments_template();
            }
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>