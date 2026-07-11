<?php
/**
 * Header template.
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

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="origin-reading-progress"></div>

<a class="origin-skip-link" href="#primary">
    <?php esc_html_e('Skip to content', 'origin-wp'); ?>
</a>

<header class="origin-site-header">
    <div class="origin-container origin-header-inner">
        <div class="origin-brand">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="origin-site-title">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
        </div>

        <button type="button" class="origin-menu-toggle" aria-controls="origin-primary-menu" aria-expanded="false">
            <span class="screen-reader-text"><?php esc_html_e('Toggle navigation', 'origin-wp'); ?></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </button>

        <nav class="origin-primary-nav" aria-label="<?php esc_attr_e('Primary menu', 'origin-wp'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_id'        => 'origin-primary-menu',
                'container'      => false,
                'fallback_cb'    => 'origin_wp_fallback_menu',
            ]);
            ?>
        </nav>
    </div>
</header>
