<?php
/**
 * The template for displaying posts within the loop.
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

        <header class="entry-header">

            <h1><?php the_title(); ?></h1>

        </header>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>

        <div class="entry-content">

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
