<article id="post-<?php the_ID(); ?>" <?php post_class('origin-single-post'); ?>>
    <header class="origin-single-header">
        <div class="origin-single-meta">
            <?php origin_wp_categories(); ?>
            <?php origin_wp_reading_time(); ?>
            <?php origin_wp_posted_on(); ?>
        </div>

        <h1 class="origin-single-title"><?php the_title(); ?></h1>

        <div class="origin-single-author">
            <?php origin_wp_posted_by(); ?>
        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
        <figure class="origin-single-featured">
            <?php the_post_thumbnail('full'); ?>
        </figure>
    <?php endif; ?>

    <div class="origin-single-content">
        <?php
        the_content();

        wp_link_pages([
            'before' => '<div class="origin-page-links">' . esc_html__('Pages:', 'origin-wp'),
            'after'  => '</div>',
        ]);
        ?>
    </div>

    <footer class="origin-single-footer">
        <?php the_tags('<div class="origin-tags">', '', '</div>'); ?>
    </footer>
</article>