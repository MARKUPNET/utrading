<?php
/**
 * コンテンツ
 */

get_header();
?>
<div id="content" class="site-content">

    <div class="breadcrumbs">
        <ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="container">
            <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="<?php home_url(); ?>">U-TRADING</a>
            </li>
        </ol>
    </div>

    <main id="main" class="site-main" role="main">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">

                <h1><?php the_title(); ?></h1>

            </header>

            <div class="entry-content">

                <?php the_content(); ?>

            </div>

            <footer class="entry-footer">

                <p>ページャー</p>

            </footer>

        </article>

    </main>

</div>
<?php
get_footer();
?>