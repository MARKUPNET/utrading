<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package Wordpress
 * @subpackage u-trading
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<div class="no-results not-found">

    <div class="inside-article">

        <header>
            <h1 class="entry-title"><?php _e( 'Nothing Found', 'utrading' ); ?></h1>
        </header>

        <div class="entry-content">

        <?php ut_custom_breadcrumb(array('taxonomies_to_display' => array('category', 'news_cat', 'works_cat'))); ?>

        <?php get_template_part('content', 'none'); ?>

        </div>

    </div>

</div>
