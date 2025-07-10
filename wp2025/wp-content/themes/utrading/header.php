<?php
/**
 * The template for displaying the header.
 *
 * @package u-trading
 * @since u-trading 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />

<!-- google font の読み込み -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="style" fetchpriority="high" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" />
<link rel="preload" as="style" fetchpriority="high" href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap" />
<link rel="preload" as="style" fetchpriority="high" href="https://fonts.googleapis.com/css2?family=Alike+Angular&display=swap">

<!-- Fontawsome の読み込み -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- Bootstrap の読み込み -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<!-- Slick Slider の読み込み -->
<!-- slickのCSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.css">

<!-- Stylesheet の読み込み -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/utrading-style.css">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="wrapper">

        <header class="site-header">

            <button id="js-hamburger" class="ut_hamburger">
                <span class="ut_hamburger_bar"></span>
                <span class="ut_hamburger_text">menu</span>
            </button>

            <div class="ut_logo">
                <a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="株式会社 U-TRADING" width="288" height="256"></a>
            </div>
            <div class="ut_gmenu_wrap">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <ul class="ut_gmenu_list">
                            <li class="ut_gmenu_item">
                                <a href="<?php echo home_url('/'); ?>"><span class="ja">ホーム</span><span class="en">Home</span></a>
                            </li>
                            <li class="ut_gmenu_item">
                                <a href="<?php echo home_url('/service'); ?>"><span class="ja">事業案内</span><span class="en">Service</span></a>
                            </li>
                            <li class="ut_gmenu_item">
                                <a href="<?php echo home_url('/works'); ?>"><span class="ja">施工実績</span><span class="en">Works</span></a>
                            </li>
                            <li class="ut_gmenu_item">
                                <a href="<?php echo home_url('/company'); ?>"><span class="ja">会社案内</span><span class="en">Company</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul class="ut_gmenu_list">
                            <li class="ut_gmenu_item">
                                <a href="<?php echo home_url('/faq'); ?>"><span class="ja">よくある質問</span><span class="en">Faq</span></a>
                            </li>
                            <li class="ut_gmenu_item">
                                <a href="<?php echo home_url('/contact'); ?>"><span class="ja">お問い合わせ</span><span class="en">Contact</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <ul class="ut_hsns_list">
                            <li class="ut_hsns_item">
                                <a href="#">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li class="ut_hsns_item">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="ut_hsns_item">
                                <a href="#">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>