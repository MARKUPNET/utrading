<?php
/**
 * The Template for displaying all single posts.
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

        while (have_posts()) : the_post();

            get_template_part('content', 'single');

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

        endwhile;

    else :

        get_template_part('content', 'none');

    endif;
    ?>

    </main>
</div>

<?php get_footer(); ?>