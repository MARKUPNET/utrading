<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package u-trading
 * @since u-trading 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="page-header">
        <h1 class="page_title"><?php the_title(); ?></h1>
    </header>

    <div class="page-content">

        <ol class="ut_breadcrumb">
            <li class="ut_breadcrumb-item"><a href="<?php echo home_url(); ?>">HOME</a></li>
            <li class="ut_breadcrumb-item"><?php the_title(); ?></li>
        </ol>

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
