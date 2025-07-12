<?php
/**
 * The template for displaying posts within the loop.
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

    <header class="entry-header">

        <h1 class="entry-title"><?php the_title(); ?></h1>

    </header>

    <div class="entry-content">

        <?php get_template_part('components/breadclumb'); ?>

        <?php
        the_content();

        wp_link_pages();
        ?>

    </div>

</article>
