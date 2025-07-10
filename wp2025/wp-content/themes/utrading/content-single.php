<?php
/**
 * The template for displaying single posts.
 *
 * @package u-trading
 * @since u-trading 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="inside-article">

        <header class="page-header">
            <h1 class="page_title"><?php the_title(); ?></h1>
        </header>

        <div class="page-content">

            <ol class="ut_breadcrumb">
                <li><a href="<?php echo home_url(); ?>">HOME</a></li>
            </ol>

            <?php
            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'utrading' ),
                    'after'  => '</div>',
                )
            );
            ?>

        </div>

    </div>

</article>
