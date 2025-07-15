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

        <header class="page-header <?php
            $queried_object = get_queried_object();
            if ( isset( $queried_object->slug ) ) {
                echo esc_attr( $queried_object->slug );
            }
            ?>">
            <div class="header-content">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="taxonomy-description">', '</div>');
                ?>
            </div>
        </header>

        <div class="page-content">

            <?php ut_custom_breadcrumb(array('taxonomies_to_display' => array('category'))); ?>

            <ul class="ut_terms_list">
                <li class="ut_terms_item">
                    <a href="">term</a>
                </li>
            </ul>

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