<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
    if (have_posts()) :

        while ( have_posts() ) : the_post(); 

        // Include the page content template.
        get_template_part( 'content', 'page' );

        // End the loop.
        endwhile;

    else :

        get_template_part('content', 'none');

    endif;
    ?>

    </main>
</div>

<?php get_footer(); ?>
