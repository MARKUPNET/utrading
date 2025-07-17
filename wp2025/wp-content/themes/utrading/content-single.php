<?php
/**
 * The template for displaying single posts.
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

    <header class="entry-header <?php echo esc_attr( get_post_type() ); ?>">
        <div class="header-content">
            <p class="entry-title">
                <?php
                $post_type_obj = get_post_type_object( get_post_type() );
                if ( $post_type_obj ) {
                    echo esc_html( $post_type_obj->labels->name );
                }
                ?>
            </p>
        </div>
    </header>

    <div class="entry-content">

        <?php ut_custom_breadcrumb(array('taxonomies_to_display' => array('category', 'news_cat', 'works_cat'))); ?>

        <h1 class="post-title"><?php the_title(); ?></h1>

        <?php
        $thumbnail = get_the_post_thumbnail();
        if( $thumbnail ):
        ?>
        <div class="post-thumbnail row justify-content-center mt-3">
            <div class="col-12 col-md-6">
            <?php the_post_thumbnail(); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php if( has_excerpt() ): ?>
        <div class="post-excerpt mt-3">
            <?php the_excerpt(); ?>
        </div>
        <?php endif; ?>

        <?php
        the_content('read more');

        wp_link_pages();

        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;

        the_post_navigation(array(
            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'utrading') . '</span> ' .
                '<span class="screen-reader-text">' . __('Next post:', 'utrading') . '</span> ' .
                '<span class="post-title">%title</span>',
            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'utrading') . '</span> ' .
                '<span class="screen-reader-text">' . __('Previous post:', 'utrading') . '</span> ' .
                '<span class="post-title">%title</span>',
        ));


        ?>

    </div>

</article>
