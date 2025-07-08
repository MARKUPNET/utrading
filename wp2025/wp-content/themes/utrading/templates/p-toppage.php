<?php
/**
 * Template name: トップページ
 */

get_header();
?>
        <div id="content" class="site-content">
            <main id="main" class="site-main" role="main">

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="page-header">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/img_57213860.webp" alt="株式会社 U-TRADING" width="1980" height="1300">
                        <div class="mainvisual_textwrapper">
                            <h1 class="toppage_title">株式会社 U-TRADING</h1>
                            <p>未来をつなぐ</p>
                        </div>
                    </div>

                    <div class="page-content">

                        <section id="news" class="ut_block ut_block_news">
                            <h2 class="ut_block_title_h2 d-flex align-items-start flex-column"><span class="en">News</span><span class="ja">新着情報</span></h2>
                            <div class="ut_block_content">
                                <ul class="news_list">
                                    <li class="news_item">
                                        <a href="#">
                                            <div class="news_meta">
                                                <span class="news_date">2025-07-01</span>
                                                <span class="news_category news">お知らせ</span>
                                            </div>
                                            <span class="news_text">ホームページを開設しました</span>
                                        </a>
                                    </li>
                                    <li class="news_item">
                                        <a href="#">
                                            <div class="news_meta">
                                                <span class="news_date">2025-06-10</span>
                                                <span class="news_category usedcar">入荷情報</span>
                                            </div>
                                            <span class="news_text">アルファード入荷しました。</span>
                                        </a>
                                    </li>
                                    <li class="news_item">
                                        <a href="#">
                                            <div class="news_meta">
                                                <span class="news_date">2025-05-10</span>
                                                <span class="news_category usedcar">入荷情報</span>
                                            </div>
                                            <span class="news_text">ベルファイア入荷しました</span>
                                        </a>
                                    </li>
                                    <li class="news_item">
                                        <a href="#">
                                            <div class="news_meta">
                                                <span class="news_date">2025-04-10</span>
                                                <span class="news_category usedcar">入荷情報</span>
                                            </div>
                                            <span class="news_text">トライトン入荷しました</span>
                                        </a>
                                    </li>
                                    <li class="news_item">
                                        <a href="#">
                                            <div class="news_meta">
                                                <span class="news_date">2024-12-01</span>
                                                <span class="news_category news">お知らせ</span>
                                            </div>
                                            <span class="news_text">年末年始（12/28-1/6）はお休みします</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </section>

                        <section id="about" class="ut_block ut_block_about ut_about">
                            <h2 class="ut_block_title_h2 d-flex align-items-start flex-column"><span class="en">U-TRADING</span><span class="ja">U-TRADINGとは</span></h2>
                            <div class="ut_block_content">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <picture class="ut_scroll fade-in">
                                            <source srcset="" media="(min-width: 768px)">
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/img_41695663.jpg" alt="イメージ画像 U-TRADINGとは">
                                        </picture>
                                    </div>
                                    <div class="col-12 col-md-6 mt-3 mt-md-0">
                                        <p class="lead_text">ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。</p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="service" class="ut_block ut_block_service ut_service">
                            <h2 class="ut_block_title_h2 d-flex align-items-start flex-column"><span class="en">Service</span><span class="ja">事業案内</span></h2>
                            <div class="ut_block_content">
                                <p class="lead_text">ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。</p>
                                <div class="d-flex justify-content-end">
                                    <a href="<?php echo home_url('/service'); ?>" class="ut_button">詳しく見る</a>
                                </div>
                                <div class="ut_service_list ut_scroll fade-in">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-4">
                                            <a href="<?php echo home_url('/service/#ach1'); ?>" class="ut_service_item">
                                                <i class="fa-solid fa-spray-can-sparkles"></i>
                                                <h3>板金塗装</h3>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <a href="<?php echo home_url('/service/#ach1'); ?>" class="ut_service_item">
                                                <i class="fa-solid fa-gauge-high"></i>
                                                <h3>車検・点検</h3>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <a href="<?php echo home_url('/service/#ach1'); ?>" class="ut_service_item">
                                                <i class="fa-solid fa-car-side"></i>
                                                <h3>新車・中古車販売</h3>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <a href="<?php echo home_url('/service/#ach1'); ?>" class="ut_service_item">
                                                <i class="fa-solid fa-spray-can-sparkles"></i>
                                                <h3>ロードサービス</h3>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <a href="<?php echo home_url('/service/#ach1'); ?>" class="ut_service_item">
                                                <i class="fa-solid fa-spray-can-sparkles"></i>
                                                <h3>ガラスコーティング</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="ut_block ut_block_works ut_works">
                            <h2 class="ut_block_title_h2 d-flex align-items-start flex-column"><span class="en">Works</span><span class="ja">施工実績</span></h2>
                            <div class="ut_block_content">
                                <div class="ut_works_slide">
                                    <div class="d-flex gap-3">
                                        <div class="col-12 col-md-4 ut_works_slide_item">
                                            <a href="<?php echo home_url('/works'); ?>">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <picture>
                                                            <source srcset="">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/img_115628367.webp" alt="">
                                                        </picture>
                                                    </div>
                                                    <div class="card-body">
                                                        <h3>施工タイトル</h3>
                                                        <p>ここに文章を入れます。ここに文章を入れます。ここに文章を入れます。ここに文章を入れます。</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-4 ut_works_slide_item">
                                            <a href="<?php echo home_url('/works'); ?>">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <picture>
                                                            <source srcset="">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/img_117184381.webp" alt="">
                                                        </picture>
                                                    </div>
                                                    <div class="card-body">
                                                        <h3>施工タイトル</h3>
                                                        <p>ここに文章を入れます。ここに文章を入れます。ここに文章を入れます。ここに文章を入れます。</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-4 ut_works_slide_item">
                                            <a href="<?php echo home_url('/works'); ?>">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <picture>
                                                            <source srcset="">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/img_111587379.webp" alt="">
                                                        </picture>
                                                    </div>
                                                    <div class="card-body">
                                                        <h3>施工タイトル</h3>
                                                        <p>ここに文章を入れます。ここに文章を入れます。ここに文章を入れます。ここに文章を入れます。</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-4 ut_works_slide_item">
                                            <a href="<?php echo home_url('/works'); ?>">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <picture>
                                                            <source srcset="">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/img_124798896.webp" alt="">
                                                        </picture>
                                                    </div>
                                                    <div class="card-body">
                                                        <h3>施工タイトル</h3>
                                                        <p>ここに文章を入れます。ここに文章を入れます。ここに文章を入れます。ここに文章を入れます。</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-12 col-md-4 ut_works_slide_item">
                                            <a href="<?php echo home_url('/works'); ?>">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <picture>
                                                            <source srcset="">
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/img_119819005.webp" alt="">
                                                        </picture>
                                                    </div>
                                                    <div class="card-body">
                                                        <h3>施工タイトル</h3>
                                                        <p>ここに文章を入れます。ここに文章を入れます。ここに文章を入れます。ここに文章を入れます。</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="company" class="ut_block ut_block_company ut_company">
                            <h2 class="ut_block_title_h2 d-flex align-items-start flex-column"><span class="en">Company</span><span class="ja">会社案内</span></h2>
                            <div class="ut_block_content">
                                <div class="ut_company_list ut_scroll fade-in">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <a href="<?php echo home_url('/company/#message'); ?>" class="ut_company_item"><span class="en">Message</span><span class="ja">ご挨拶</span></a>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <a href="<?php echo home_url('/company/#profile'); ?>" class="ut_company_item"><span class="en">Profile</span><span class="ja">会社概要</span></a>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <a href="<?php echo home_url('/company/#access'); ?>" class="ut_company_item"><span class="en">Access</span><span class="ja">アクセス</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="faq" class="ut_block ut_block_faq ut_faq">
                            <h2 class="ut_block_title_h2 d-flex align-items-start flex-column"><span class="en">Faq</span><span class="ja">よくある質問</span></h2>
                            <div class="ut_block_content">
                                <p class="lead_text">ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。</p>
                                <div class="d-flex justify-content-end">
                                    <a href="<?php echo home_url('/faq'); ?>" class="ut_button">詳しく見る</a>
                                </div>
                                <div class="ut_faq_list ut_scroll fade-in mt-5">
                                    <dl class="ut_faq_item">
                                        <dt>施工時間はどれくらいかかりますか？</dt>
                                        <dd>ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。</dd>
                                    </dl>
                                    <dl class="ut_faq_item">
                                        <dt>施工価格を教えてください。</dt>
                                        <dd>ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。</dd>
                                    </dl>
                                    <dl class="ut_faq_item">
                                        <dt>ここに質問文章</dt>
                                        <dd>ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。</dd>
                                    </dl>
                                    <dl class="ut_faq_item">
                                        <dt>ここに質問文章</dt>
                                        <dd>ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。</dd>
                                    </dl>
                                    <dl class="ut_faq_item">
                                        <dt>ここに質問文章</dt>
                                        <dd>ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。ここに文章を入力します。</dd>
                                    </dl>
                                </div>
                            </div>
                        </section>

                        <section class="ut_block menu_001">
                            <h2 class="ut_block_title_h2 d-flex align-items-start flex-column"><span class="en">Contact us</span><span class="ja">お問い合わせ</span></h2>
                            <div class="ut_block_content">
                                <div>
                                    <div>
                                        <h3>定休日</h3>
                                        <p>年中無休</p>
                                        <h3>営業時間</h3>
                                        <p>10:00 - 19:00</p>
                                    </div>
                                    <div>
                                        <h3>電話でお問い合わせ</h3>
                                        <p>011-788-9483</p>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-success">メールでお問い合わせ</a>
                                    </div>
                                </div>
                            </div>
                        </section>
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

            </main>
        </div>

<?php
get_footer();
?>