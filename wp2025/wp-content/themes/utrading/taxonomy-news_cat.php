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

            <?php ut_custom_breadcrumb(array('taxonomies_to_display' => array('news_cat'))); ?>

            <div class="ut_terms">
                <ul class="ut_terms_list">
                    <?php
                    // Get all terms for the 'news_cat' taxonomy
                    $terms = get_terms( array(
                        'taxonomy'   => 'news_cat',
                        'hide_empty' => true, // Set to true if you only want to display terms with posts
                    ) );

                    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
                        foreach ( $terms as $term ) {
                    ?>
                    <li class="ut_terms_item">
                        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
                            <?php echo esc_html( $term->name ); ?>
                        </a>
                    </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>

            <div class="archive-posts-list">

                <?php
                while (have_posts()) : the_post();
                
                if(get_the_post_thumbnail() == null){
                    $thumbnail = sprintf('<img src="%s" alt="">', get_template_directory_uri() . '/images/no-image.jpg');
                }else{
                    $thumbnail = get_the_post_thumbnail();
                }
                ?>

                <article class="archive-post">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo $thumbnail; ?>
                            </a>
                        </div>
                        <div class="col-12 col-md-8 mt-3 mt-md-0">
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                                <div>
                                    <?php the_excerpt(); ?>
                                </div>
                            </a>
                        </div>
                    </div>
                </article>

                <?php endwhile; ?>

            </div>

            <?php
            // Pagination
            the_posts_pagination( array(
                'prev_text' => __( 'Previous', 'u-trading' ), // Change 'u-trading' to your theme's text domain
                'next_text' => __( 'Next', 'u-trading' ),
                'screen_reader_text' => 'Posts navigation', // For accessibility
            ) );
            ?>

            <?php else : ?>
            
            <?php get_template_part('content', 'none'); ?>

            <?php endif; ?>

        </div>

    </main>
</div>

<?php get_footer(); ?>