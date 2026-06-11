<article id="post-<?php the_ID(); ?>" <?php post_class('origin-post-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a class="origin-post-card-image" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('large'); ?>
        </a>
    <?php endif; ?>

    <div class="origin-post-card-body">
        <div class="origin-post-card-meta">
            <?php origin_wp_categories(); ?>
            <?php origin_wp_reading_time(); ?>
        </div>

        <h2 class="origin-post-card-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <div class="origin-post-card-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <div class="origin-post-card-footer">
            <?php origin_wp_posted_by(); ?>
            <?php origin_wp_posted_on(); ?>
        </div>
    </div>
</article>