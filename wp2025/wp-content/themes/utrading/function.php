<?php

if (! function_exists('ut_setup')) :

    function twentyfifteen_setup()
    {

        /* ---------- 画像サイズ　追加 ---------- */
        add_image_size('works', 450, 300, true);
        /*----------------------------*/

    }

    /* ---------- カスタム投稿タイプを追加 ---------- */
    add_action('init', 'create_post_type');
    function create_post_type()
    {
        register_post_type(
            'news',
            array(
                'label' => '新着情報',
                'description' => '',
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'rewrite' => true,
                'query_var' => false,
                'has_archive' => true,
                'exclude_from_search' => false,
                'menu_position' => 5,
                'taxonomies' => array('news_cat'),
                'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes'),
                'labels' => array(
                    'name' => '新着情報',
                    'all_items' => '新着情報一覧'
                )
            )
        );
        register_taxonomy(
            'news_cat',
            'news',
            array(
                'hierarchical' => true,
                'label' => 'カテゴリ',
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'news'),
                'singular_label' => 'カテゴリ'
            )
        );

        register_post_type(
            'works',
            array(
                'label' => '施工実績',
                'description' => '',
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'rewrite' => true,
                'query_var' => false,
                'has_archive' => true,
                'exclude_from_search' => false,
                'menu_position' => 5,
                'taxonomies' => array('works_cat'),
                'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes'),
                'labels' => array(
                    'name' => '施工実績',
                    'all_items' => '施工実績一覧'
                )
            )
        );
        register_taxonomy(
            'works_cat',
            'works',
            array(
                'hierarchical' => true,
                'label' => 'カテゴリ',
                'show_ui' => true,
                'query_var' => true,
                'rewrite' => array('slug' => 'works'),
                'singular_label' => 'カテゴリ'
            )
        );
    }

endif;