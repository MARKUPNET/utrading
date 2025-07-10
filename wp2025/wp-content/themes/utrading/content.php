<?php
/**
 * The template for displaying posts within the loop.
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

        <h1 class="entry-title"><?php the_title(); ?></h1>

    </header>

    <div class="entry-content">

        <ol class="ut_breadcrumb">
            <li class="ut_breadcrumb-item"><a href="<?php echo home_url(); ?>">HOME</a></li>
            <li class="ut_breadcrumb-item"><?php the_title(); ?></li>
        </ol>

        <?php
        the_content();

        wp_link_pages();
        ?>

    </div>

</article>
