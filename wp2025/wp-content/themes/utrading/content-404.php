<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Wordpress
 * @subpackage u-trading
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="page-header error404">
        <div class="header-content">
            <h1 class="entry-title" itemprop="headline"><?php echo apply_filters( 'utrading_404_title', __( 'Oops! That page can&rsquo;t be found.', 'utrading' ) ); ?></h1>
        </div>
    </header>

    <div class="page-content">

        <?php ut_custom_breadcrumb(array('taxonomies_to_display' => array('category', 'news_cat', 'works_cat'))); ?>

        <?php
        printf(
            '<p>%s</p>',
            apply_filters( 'utrading_404_text', __( 'It looks like nothing was found at this location. Maybe try searching?', 'utrading' ) ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- HTML is allowed in filter here.
        );

        get_search_form();
        ?>

    </div>

</article>
