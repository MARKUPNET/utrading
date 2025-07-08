<?php
/**
 * The template for displaying all single posts and attachments
 *
 */
get_header(); ?>

        <div id="content" class="site-content">
            <main id="main" class="site-main" role="main">

                <?php
                while (have_posts()) : the_post();

                    get_template_part('content', get_post_format());

                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                    the_post_navigation(array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'twentyfifteen') . '</span> ' .
                            '<span class="screen-reader-text">' . __('Next post:', 'twentyfifteen') . '</span> ' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'twentyfifteen') . '</span> ' .
                            '<span class="screen-reader-text">' . __('Previous post:', 'twentyfifteen') . '</span> ' .
                            '<span class="post-title">%title</span>',
                    ));

                endwhile;
                ?>

            </main>
        </div>

<?php get_footer(); ?>