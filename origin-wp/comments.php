<?php
/**
 * Comments template.
 *
 * @package Origin_WP
 */

if (post_password_required()) {
    return;
}
?>

<section id="comments" class="origin-comments">

    <?php if (have_comments()) : ?>

        <h2 class="comments-title">
            <?php
            printf(
                esc_html(_n('%s Comment', '%s Comments', get_comments_number(), 'origin-wp')),
                number_format_i18n(get_comments_number())
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments([
                'style'      => 'ol',
                'short_ping' => true,
            ]);
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php comment_form(); ?>

</section>