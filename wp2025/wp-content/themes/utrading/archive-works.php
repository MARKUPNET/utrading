<?php
/**
 * The template for displaying Archive pages.
 *
 * @package Wordpress
 * @subpackage u-trading
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<div id="content" class="site-content">
    <main id="main" class="site-main" role="main">

        <?php if (have_posts()) : ?>

        <header class="page-header <?php echo esc_attr( get_query_var('post_type') ); ?>">
            <div class="header-content">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="taxonomy-description">', '</div>');
                ?>
            </div>
        </header>

        <div class="page-content">

            <?php ut_custom_breadcrumb(array('taxonomies_to_display' => array('category', 'news_cat', 'works_cat'))); ?>
            <p>TEST</p>

            <?php while (have_posts()) : the_post(); ?>

            <article>
                <a href="<?php the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                </a>
            </article>

            <?php endwhile; ?>

            <?php else : ?>
            
            <?php get_template_part('content', 'none'); ?>

            <?php endif; ?>

        </div>

    </main>
</div>

<?php get_footer(); ?>