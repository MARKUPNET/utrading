<?php
/**
 * The template for displaying single posts.
 *
 * @package u-trading
 * @since u-trading 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <p class="entry-title">ブログ</p>
    </header>

    <div class="entry-content">

        <ol class="ut_breadcrumb">
            <li class="ut_breadcrumb-item"><a href="<?php echo home_url(); ?>">HOME</a></li>
            <li class="ut_breadcrumb-item"><?php the_title(); ?></li>
        </ol>

        <h1 class="post-title"><?php the_title(); ?></h1>

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
