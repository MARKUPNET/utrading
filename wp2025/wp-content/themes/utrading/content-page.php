<?php
/**
 * 固定ページ用コンテンツ
 * 
 */
?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="page-header">
                        <h1 class="page_title"><?php the_title(); ?></h1>
                    </div>

                    <div class="page-content">

                        <div class="m-pt-breadcrumbs">
                            <ul id="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a href="<?php echo home_url('/'); ?>" itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="<?php echo home_url('/'); ?>"><span itemprop="name">株式会社 U-TRADING</span></a></li>
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name"><?php echo get_the_title(); ?></span></li>
                            </ul>
                        </div>

                        <?php the_content(); ?>

                    </div>

                    <div class="page-footer">
                        <div class="row justify-content-center gap-3">
                            <div class="col-12 col-md-5">
                                <a href="#" target="_blank" class="ut_banner">カーセンサー</a>
                            </div>
                            <div class="col-12 col-md-5">
                                <a href="#" target="_blank" class="ut_banner">グーネット</a>
                            </div>
                        </div>
                    </div>

                </article>
