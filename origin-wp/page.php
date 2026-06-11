<?php
/**
 * Page template.
 *
 * @package Origin_WP
 */

get_header();
?>

<main id="primary" class="origin-site-main">
    <div class="origin-container">
        <?php
        while (have_posts()) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('origin-page-content'); ?>>
                <h1 class="origin-page-title"><?php the_title(); ?></h1>

                <div class="origin-entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php get_footer(); ?>