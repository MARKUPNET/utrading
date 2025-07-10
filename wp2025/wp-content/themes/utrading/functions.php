<?php
/**
 * U-Trade functions
 * 
 * @package u-trading
 * @since u-trading 1.0
 */

 if ( ! function_exists( 'utrading_setup' ) ) :
function utrading_setup() {

    // Make theme available for translation.
    load_theme_textdomain( 'utrading' );

    /**
     * カスタム投稿タイプを追加
     */
    function create_post_types()
    {
        $post_types = [
            [
                'type' => 'news',
                'label' => '新着情報',
                'menu_position' => 5,
                'taxonomy' => [
                    'slug' => 'news_cat',
                    'label' => 'カテゴリ',
                    'rewrite' => 'news'
                ]
            ],
            [
                'type' => 'works',
                'label' => '施工実績',
                'menu_position' => 5,
                'taxonomy' => [
                    'slug' => 'works_cat',
                    'label' => 'カテゴリ',
                    'rewrite' => 'works'
                ]
            ],
            // 追加したいカスタム投稿タイプがあればここに追記
            // [
            //     'type' => 'staff',
            //     'label' => 'スタッフ',
            //     'menu_position' => 6,
            //     'taxonomy' => [
            //         'slug' => 'staff_cat',
            //         'label' => 'カテゴリ',
            //         'rewrite' => 'staff'
            //     ]
            // ],
        ];

        foreach ($post_types as $pt) {
            register_post_type(
                $pt['type'],
                [
                    'label' => $pt['label'],
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
                    'menu_position' => $pt['menu_position'],
                    'taxonomies' => [$pt['taxonomy']['slug']],
                    'supports' => ['title', 'editor', 'revisions', 'thumbnail', 'page-attributes'],
                    'labels' => [
                        'name' => $pt['label'],
                        'all_items' => $pt['label'] . '一覧'
                    ]
                ]
            );
            register_taxonomy(
                $pt['taxonomy']['slug'],
                $pt['type'],
                [
                    'hierarchical' => true,
                    'label' => $pt['taxonomy']['label'],
                    'show_ui' => true,
                    'query_var' => true,
                    'rewrite' => ['slug' => $pt['taxonomy']['rewrite']],
                    'singular_label' => 'カテゴリ'
                ]
            );
        }
    }
    add_action('init', 'create_post_types');

    /**
     * 固定ページでビジュアルエディタを非表示にする
     */
    function utrading_remove_visual_editor_for_page($can_edit) {
        if (!is_admin()) return $can_edit;
        $screen = function_exists('get_current_screen') ? get_current_screen() : null;
        global $post;
        if (
            $screen &&
            $screen->base === 'post' &&
            $post &&
            $post->post_type === 'page'
        ) {
            return false;
        }
        return $can_edit;
    }
    add_filter('user_can_richedit', 'utrading_remove_visual_editor_for_page');
}
endif; 
add_action( 'after_setup_theme', 'utrading_setup' );
