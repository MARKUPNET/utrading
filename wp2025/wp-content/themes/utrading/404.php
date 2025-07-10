<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package u-trading
 * @since u-trading 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div id="content" class="site-content">
    <main id="main" class="site-main" role="main">

    <?php

    // Include the page content template.
    get_template_part( 'content', '404' );

    ?>

    </main>
</div>

<?php get_footer(); ?>