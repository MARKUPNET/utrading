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
                            <?php
                            $args = [
                                'post_type' => 'news',
                                'post_status' => 'publish',
                                'posts_per_page' => 5
                            ];
                            $loop = new WP_Query($args);
                            while($loop->have_posts()): $loop->the_post();
                            ?>
                            <li class="news_item">
                                <a href="<?php the_permalink(); ?>">
                                    <div class="news_meta">
                                        <span class="news_date"><?php echo get_the_date(); ?></span>
                                        <?php
                                        $terms = get_the_terms( get_the_ID(), 'news_cat' );
                                        if ( $terms && ! is_wp_error( $terms ) ) : $term = array_shift( $terms ); // 最初のカテゴリーを取得 ?>
                                        <span class="news_category <?php echo esc_attr( $term->slug ); ?>"><?php echo esc_html( $term->name ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <span class="news_text"><?php the_title(); ?></span>
                                </a>
                            </li>
                            <?php endwhile;?>
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
                                <p class="lead_text">ガレージハウスは、お客様のカーライフをトータルでサポートする自動車販売・サービス店です。北海道札幌市東区を拠点に、厳選した中古車の販売から、購入後のアフターサポート、車検、整備、板金塗装、カスタムまで、あらゆるニーズにお応えします。お客様にとって最適な一台との出会いを演出し、安心で快適なカーライフを送っていただけるよう、スタッフ一同、真心を込めてお手伝いさせていただきます。どんなことでもお気軽にご相談ください。</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="service" class="ut_block ut_block_service ut_service">
                    <h2 class="ut_block_title_h2 d-flex align-items-start flex-column"><span class="en">Service</span><span class="ja">事業案内</span></h2>
                    <div class="ut_block_content">
                        <p class="lead_text">ガレージハウス（株式会社U Trading）は、お客様の充実したカーライフをワンストップでサポートするため、多岐にわたるサービスを提供しています。お車の購入から日々のメンテナンス、万が一のトラブルまで、お客様のカーライフに寄り添い、安心と信頼をお届けします。</p>
                        <div class="d-flex justify-content-end">
                            <a href="<?php echo home_url('/service'); ?>" class="ut_button">more</a>
                        </div>
                        <div class="ut_service_list ut_scroll fade-in">
                            <div class="row justify-content-center">
                                <div class="col-12 col-md-4">
                                    <a href="<?php echo home_url('/service/#service_01'); ?>" class="ut_service_item">
                                        <i class="fa-solid fa-car-side"></i>
                                        <h3>中古車販売</h3>
                                    </a>
                                </div>
                                <div class="col-12 col-md-4">
                                    <a href="<?php echo home_url('/service/#service_02'); ?>" class="ut_service_item">
                                        <i class="fa-solid fa-gauge-high"></i>
                                        <h3>自動車整備・車検・点検</h3>
                                    </a>
                                </div>
                                <div class="col-12 col-md-4">
                                    <a href="<?php echo home_url('/service/#service_03'); ?>" class="ut_service_item">
                                        <i class="fa-solid fa-car-side"></i>
                                        <h3>板金塗装</h3>
                                    </a>
                                </div>
                                <div class="col-12 col-md-4">
                                    <a href="<?php echo home_url('/service/#service_04'); ?>" class="ut_service_item">
                                        <i class="fa-solid fa-spray-can-sparkles"></i>
                                        <h3>カスタム・ドレスアップ</h3>
                                    </a>
                                </div>
                                <div class="col-12 col-md-4">
                                    <a href="<?php echo home_url('/service/#service_05'); ?>" class="ut_service_item">
                                        <i class="fa-solid fa-car-side"></i>
                                        <h3>車両買取り・下取り</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="ut_block ut_block_works ut_works">
                    <h2 class="ut_block_title_h2 d-flex align-items-start flex-column"><span class="en">Works</span><span class="ja">施工実績</span></h2>
                    <div class="ut_block_content">
                        <div class="ut_works_slider">
                            <div class="d-flex gap-3">
                                <?php
                                $args = [
                                    'post_type' => 'works',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 5
                                ];
                                $loop = new WP_Query($args);
                                while($loop->have_posts()): $loop->the_post();
                                ?>
                                <div class="col-12 col-md-4 ut_works_slide_item">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="card">
                                            <div class="card-header">
                                                <?php
                                                if(get_the_post_thumbnail() == null){
                                                    $thumbnail = sprintf('<img src="%s" alt="">', get_template_directory_uri() . '/images/no-image.jpg');
                                                }else{
                                                    $thumbnail = get_the_post_thumbnail();
                                                }
                                                echo $thumbnail;
                                                ?>
                                            </div>
                                            <div class="card-body">
                                                <h3 class="ut_works_title"><?php the_title(); ?></h3>
                                                <p class="ut_works_excerpt mt-3"><?php echo wp_trim_words( get_the_excerpt(), 60, ' &hellip; <span class="more-text">[more]</span>' ); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php endwhile; ?>
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
                                    <a href="<?php echo home_url('/company/#company_profile'); ?>" class="ut_company_item"><span class="en">Profile</span><span class="ja">会社概要</span></a>
                                </div>
                                <div class="col-12 col-md-4">
                                    <a href="<?php echo home_url('/company/#our_strengths'); ?>" class="ut_company_item"><span class="en">Our Strengths</span><span class="ja">私たちの強み</span></a>
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
                        <div class="ut_faq_list ut_scroll fade-in mt-5">
                            <dl class="ut_faq_item">
                                <dt>どのような車両を取り扱っていますか？</dt>
                                <dd>国産車から輸入車まで、幅広いメーカーの中古車を取り扱っております。特にカスタムカー、4WD、クラシックカー、RV、軽自動車に力を入れており、常時50台以上の在庫を展示しております。お客様のニーズに合わせた一台をご提案いたします。</dd>
                            </dl>
                            <dl class="ut_faq_item">
                                <dt>在庫にない車を探してもらうことはできますか？</dt>
                                <dd>はい、可能です。お客様のご希望の車種や条件をお伺いし、全国の提携ネットワークから最適な一台をお探しいたします。お気軽にご相談ください。</dd>
                            </dl>
                            <dl class="ut_faq_item">
                                <dt>遠方からの購入は可能ですか？</dt>
                                <dd>はい、北海道内はもちろん、全国のお客様に対応しております。北海道内であれば自社積載車での輸送も可能です。遠方のお客様には、陸送サービスをご利用いただけますのでご安心ください。詳細はお問い合わせください。</dd>
                            </dl>
                            <dl class="ut_faq_item">
                                <dt>購入時の支払い方法にはどのようなものがありますか？</dt>
                                <dd>現金払いの他、各種オートローンをご利用いただけます。お客様のご状況に合わせた最適なプランをご提案させていただきますので、お気軽にご相談ください。</dd>
                            </dl>
                            <dl class="ut_faq_item">
                                <dt>車検や点検、一般整備は依頼できますか？</dt>
                                <dd>はい、国家資格を持つ整備士が常駐しており、車検、法定点検、一般整備、そして急な故障やトラブル時の修理にも対応しております。ご購入後のアフターサポートもお任せください。</dd>
                            </dl>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="<?php echo home_url('/faq'); ?>" class="ut_button">more</a>
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
                        <a href="https://www.carsensor.net/shop/hokkaido/328898001/?BKKN=AU6131976518" target="_blank" class="ut_banner">カーセンサー</a>
                    </div>
                    <div class="col-12 col-md-5">
                        <a href="https://www.goo-net.com/usedcar_shop/0303810/detail.html" target="_blank" class="ut_banner">グーネット</a>
                    </div>
                </div>
            </div>

        </article>

    </main>
</div>

<?php
get_footer();
?>