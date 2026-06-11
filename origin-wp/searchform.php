<?php
/**
 * Custom search form.
 *
 * @package Origin_WP
 */
?>

<form role="search"
      method="get"
      class="origin-search-form"
      action="<?php echo esc_url(home_url('/')); ?>">

    <label class="screen-reader-text" for="origin-search-field">
        <?php esc_html_e('Search', 'origin-wp'); ?>
    </label>

    <input
        type="search"
        id="origin-search-field"
        class="origin-search-input"
        value="<?php echo get_search_query(); ?>"
        name="s"
        placeholder="<?php esc_attr_e('Search articles...', 'origin-wp'); ?>"
        autocomplete="off"
    >

    <button type="submit" class="origin-search-button">
        <?php esc_html_e('Search', 'origin-wp'); ?>
    </button>

</form>