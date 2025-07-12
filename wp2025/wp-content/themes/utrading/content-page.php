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

    <header class="page-header <?php echo esc_attr( $post->post_name ); ?>">
        <div class="header-content">
            <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
    </header>

    <div class="page-content">

        <?php ut_custom_breadcrumb(array('taxonomies_to_display' => array('category', 'news_cat', 'works_cat'))); ?>

        <?php
        the_content();

        wp_link_pages();
        ?>

    </div>

    <div class="page-footer">
        <div class="row justify-content-center gap-3">
            <div class="col-12 col-md-5">
                <a href="#" target="_blank" class="ut_banner">カーセンサー</a>
            </div>
            <div class="col-12 col-md-5">
                <a href="#" target="_blank" class="ut_banner">グーネット</a>
            </div>
        </div>
    </div>

</article>
