<?php
/**
 * The template used for displaying page content in page.php
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
        <h1 class="entry-title" itemprop="headline"><?php echo apply_filters( 'utrading_404_title', __( 'Oops! That page can&rsquo;t be found.', 'utrading' ) ); ?></h1>
    </header>

    <div class="entry-content">

        <ol class="ut_breadcrumb">
            <li class="ut_breadcrumb-item"><a href="<?php echo home_url(); ?>">HOME</a></li>
            <li class="ut_breadcrumb-item"><?php the_title(); ?></li>
        </ol>

        <?php
        printf(
            '<p>%s</p>',
            apply_filters( 'utrading_404_text', __( 'It looks like nothing was found at this location. Maybe try searching?', 'utrading' ) ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- HTML is allowed in filter here.
        );

        get_search_form();
        ?>

    </div>

</article>
