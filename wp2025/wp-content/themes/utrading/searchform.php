<?php
/**
 * The template for displaying search forms in Generate
 *
 * @package GeneratePress
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text">検索</span>
        <input type="search" class="search-field" placeholder="検索" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="検索">
    </label>
    <input type="submit" class="search-submit" value="検索">
</form>