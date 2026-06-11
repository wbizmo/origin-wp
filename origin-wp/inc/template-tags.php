<?php
/**
 * Template tags for Origin WP.
 *
 * @package Origin_WP
 */

if (!defined('ABSPATH')) {
    exit;
}

function origin_wp_posted_on() {
    echo '<span class="origin-post-date">' . esc_html(get_the_date()) . '</span>';
}

function origin_wp_posted_by() {
    echo '<span class="origin-post-author">' . esc_html__('By', 'origin-wp') . ' <a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>';
}

function origin_wp_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(wp_strip_all_tags($content));
    $minutes = max(1, ceil($word_count / 220));

    echo '<span class="origin-reading-time">' . esc_html($minutes) . ' ' . esc_html__('min read', 'origin-wp') . '</span>';
}

function origin_wp_categories() {
    $categories = get_the_category();

    if (empty($categories)) {
        return;
    }

    echo '<span class="origin-post-category">';
    echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
    echo '</span>';
}