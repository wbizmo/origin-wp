<?php
/**
 * Template Name: Origin Full Width
 * Template Post Type: page
 *
 * @package Origin_WP
 */

get_header();
?>

<main id="primary" class="origin-site-main origin-full-width-main">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php get_footer(); ?>