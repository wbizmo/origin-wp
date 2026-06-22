<?php
/**
 * Sidebar template.
 *
 * @package Origin_WP
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="origin-sidebar widget-area">
    <?php dynamic_sidebar('sidebar-1'); ?>
</aside>
