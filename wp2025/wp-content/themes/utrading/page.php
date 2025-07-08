<?php



get_header(); ?>

        <div id="content" class="site-content">
            <main id="main" class="site-main" role="main">

            <?php
                while ( have_posts() ) : the_post(); 

                // Include the page content template.
                get_template_part( 'content', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

                // End the loop.
                endwhile;
            ?>

            </main>
        </div>

<?php get_footer(); ?>
