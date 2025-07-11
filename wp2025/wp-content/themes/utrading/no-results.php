<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package u-trading
 * @since u-trading 1.0
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

        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p>
                <?php
                printf(
                    __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'utrading' ),
                    esc_url( admin_url( 'post-new.php' ) )
                );
                ?>
            </p>

        <?php elseif ( is_search() ) : ?>

            <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'utrading' ); ?></p>
            <?php get_search_form(); ?>

        <?php else : ?>

            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'utrading' ); ?></p>
            <?php get_search_form(); ?>

        <?php endif; ?>

        </div>

    </div>

</div>
