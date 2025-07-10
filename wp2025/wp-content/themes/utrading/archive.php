<?php
/**
 * The template for displaying Archive pages.
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

    <?php if (have_posts()) : ?>

        <header class="page-header">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="taxonomy-description">', '</div>');
            ?>
        </header>

    <?php
        while (have_posts()) : the_post();

            the_post();

        endwhile;

    else :
        get_template_part('content', 'none');

    endif;
    ?>

    </main>
</div>

<?php get_footer(); ?>