<?php
/**
 * Template Name: Origin Canvas
 * Template Post Type: page
 *
 * @package Origin_WP
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class('origin-canvas-template'); ?>>
<?php wp_body_open(); ?>

<main id="primary" class="origin-canvas-main">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>

<?php wp_footer(); ?>
</body>
</html>