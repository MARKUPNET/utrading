<?php
/**
 * The template for displaying the footer.
 *
 * @package u-trading
 * @since u-trading 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
        <footer class="site-footer">
            <div class="inner">
                <div class="row justify-content-md-between flex-md-row-reverse">
                    <div class="col-12 col-md-6">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <ul class="ut_fmenu_list">
                                    <li class="ut_fmenu_item">
                                        <a href="<?php echo home_url(''); ?>"><span class="ja">ホーム</span></a>
                                    </li>
                                    <li class="ut_fmenu_item">
                                        <a href="<?php echo home_url('/service'); ?>"><span class="ja">事業案内</span></a>
                                        <ul class="ut_fmenu_list_sub">
                                            <li class="ut_fmenu_item_sub">
                                                <a href="<?php echo home_url('/service'); ?>"><span class="ja">板金塗装</span></a>
                                            </li>
                                            <li class="ut_fmenu_item_sub">
                                                <a href="<?php echo home_url('/service'); ?>"><span class="ja">車検・点検</span></a>
                                            </li>
                                            <li class="ut_fmenu_item_sub">
                                                <a href="<?php echo home_url('/service'); ?>"><span class="ja">新車・中古車販売</span></a>
                                            </li>
                                            <li class="ut_fmenu_item_sub">
                                                <a href="<?php echo home_url('/service'); ?>"><span class="ja">ロードサービス</span></a>
                                            </li>
                                            <li class="ut_fmenu_item_sub">
                                                <a href="<?php echo home_url('/service'); ?>"><span class="ja">ガラスコーティング</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="ut_fmenu_item">
                                        <a href="<?php echo home_url('/works'); ?>"><span class="ja">施工実績</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-6">
                                <ul class="ut_fmenu_list">
                                    <li class="ut_fmenu_item">
                                        <a href="<?php echo home_url('/company'); ?>"><span class="ja">会社案内</span></a>
                                        <ul class="ut_fmenu_list_sub">
                                            <li class="ut_fmenu_item_sub">
                                                <a href="<?php echo home_url('/company'); ?>"><span class="ja">ご挨拶</span></a>
                                            </li>
                                            <li class="ut_fmenu_item_sub">
                                                <a href="<?php echo home_url('/company'); ?>"><span class="ja">会社概要</span></a>
                                            </li>
                                            <li class="ut_fmenu_item_sub">
                                                <a href="<?php echo home_url('/company'); ?>"><span class="ja">アクセス</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="ut_fmenu_item">
                                        <a href="<?php echo home_url('/faq'); ?>"><span class="ja">よくある質問</span></a>
                                    </li>
                                    <li class="ut_fmenu_item">
                                        <a href="<?php echo home_url('/contact'); ?>"><span class="ja">お問い合わせ</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="footer_information">
                            <a href="<?php echo home_url('/'); ?>" class="d-md-flex align-items-center">
                                <p class="footer_information_company_logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="株式会社 U-TRADING" width="288" height="256"></p>
                                <p class="footer_information_company_name">株式会社 U-TRADING</p>
                            </a>
                            <p class="footer_information_compamy_address">〒007-0890 北海道札幌市東区中沼町80-9</p>
                            <p cclass="footer_information_company_tel">TEL:011-788-9483</p>
                            <p cclass="footer_information_company_fax">FAX:011-788-9484</p>
                            <p cclass="footer_information_company_pr"><a href="#" target="_blank" class="icon_blank">カーセンサー</a></p>
                            <p cclass="footer_information_company_pr"><a href="#" target="_blank" class="icon_blank">グーネット</a></p>
                            <ul class="ut_fsns_list">
                                <li class="ut_fsns_item">
                                    <a href="#">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="ut_fsns_item">
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li class="ut_fsns_item">
                                    <a href="#">
                                        <i class="fab fa-tiktok"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <p class="copyright">&copy; 株式会社 U-TRADING <?php echo date('Y'); ?></p>
            </div>
        </footer>
        <a href="#" class="pagetop">TOP</a>

    </div>

    <!-- jQuery の読み込み -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Bootstrap の読み込み -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Slick Slider の読み込み -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- U-TRADING JS の読み込み -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

<?php
wp_footer();
?>
</body>
</html>
