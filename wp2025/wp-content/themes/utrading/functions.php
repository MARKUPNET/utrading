<?php
/**
 * U-Trade functions
 * 
 * @package u-trading
 * @since u-trading 1.0
 */

if ( ! function_exists( 'utrading_setup' ) ) :
function utrading_setup() {

    // テーマの翻訳
    load_theme_textdomain( 'utrading' );

    // オリジナル画像サイズを追加
    add_action('after_setup_theme', function() {
        add_image_size('custom-thumb', 600, 400, true); // 幅600px, 高さ400px, トリミングあり
    });

    // カスタム投稿タイプ・タクソノミー登録
    add_action('init', function() {
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
    });

    // 「未分類」カテゴリー自動作成（news_cat, works_cat）
    add_action('init', function() {
        $taxonomies = ['news_cat', 'works_cat'];
        foreach ($taxonomies as $taxonomy) {
            $term = get_term_by('slug', 'uncategorized', $taxonomy);
            if (!$term) {
                wp_insert_term(
                    '未分類',
                    $taxonomy,
                    ['slug' => 'uncategorized']
                );
            }
        }
    });

    // 固定ページでビジュアルエディタを非表示
    add_filter('user_can_richedit', function($can_edit) {
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
    });

}
endif; 
add_action( 'after_setup_theme', 'utrading_setup' );

// 新着情報・施工実績 一覧に「投稿者」「カテゴリー」カラム追加
function utrading_add_custom_columns($columns, $post_type) {
    if ($post_type === 'news' || $post_type === 'works') {
        $new_columns = [];
        foreach ($columns as $key => $value) {
            $new_columns[$key] = $value;
            if ($key === 'title') {
                $new_columns['author'] = '投稿者';
                $taxonomy = ($post_type === 'news') ? 'news_cat' : 'works_cat';
                $new_columns[$taxonomy] = 'カテゴリー';
            }
        }
        return $new_columns;
    }
    return $columns;
}
add_filter('manage_news_posts_columns', function($columns) {
    return utrading_add_custom_columns($columns, 'news');
}, 10, 1);
add_filter('manage_works_posts_columns', function($columns) {
    return utrading_add_custom_columns($columns, 'works');
}, 10, 1);

// カスタムカラムの値を表示
function utrading_custom_column_content($column, $post_id) {
    if ($column === 'author') {
        $author_id = get_post_field('post_author', $post_id);
        echo esc_html(get_the_author_meta('display_name', $author_id));
    }
    if ($column === 'news_cat') {
        $terms = get_the_terms($post_id, 'news_cat');
        if ($terms && !is_wp_error($terms)) {
            $names = wp_list_pluck($terms, 'name');
            echo esc_html(implode(', ', $names));
        }
    }
    if ($column === 'works_cat') {
        $terms = get_the_terms($post_id, 'works_cat');
        if ($terms && !is_wp_error($terms)) {
            $names = wp_list_pluck($terms, 'name');
            echo esc_html(implode(', ', $names));
        }
    }
}
add_action('manage_news_posts_custom_column', 'utrading_custom_column_content', 10, 2);
add_action('manage_works_posts_custom_column', 'utrading_custom_column_content', 10, 2);

// カテゴリが未選択の場合は「未分類」を自動で付与
function utrading_set_default_category($post_id, $post, $update) {
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( wp_is_post_revision($post_id) ) return;
    if ( $post->post_status === 'auto-draft' || $post->post_status === 'trash' ) return;

    $post_type = $post->post_type;
    $taxonomies = [
        'news'  => 'news_cat',
        'works' => 'works_cat',
    ];

    if ( array_key_exists($post_type, $taxonomies) ) {
        $taxonomy = $taxonomies[$post_type];
        $terms = wp_get_object_terms($post_id, $taxonomy, ['fields' => 'ids']);
        if ( empty($terms) ) {
            $uncat = get_term_by('slug', 'uncategorized', $taxonomy);
            if ( $uncat ) {
                wp_set_object_terms($post_id, [$uncat->term_id], $taxonomy);
            }
        }
    }
}
add_action('save_post', 'utrading_set_default_category', 10, 3);

// 管理画面「投稿」を「ブログ」に変更
function utrading_change_post_menu_label() {
    global $menu, $submenu;
    $menu[5][0] = 'ブログ';
    $submenu['edit.php'][5][0] = 'ブログ一覧';
    $submenu['edit.php'][10][0] = '新規ブログ追加';
}
add_action('admin_menu', 'utrading_change_post_menu_label');

function utrading_change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'ブログ';
    $labels->singular_name = 'ブログ';
    $labels->add_new = '新規追加';
    $labels->add_new_item = '新規ブログ追加';
    $labels->edit_item = 'ブログを編集';
    $labels->new_item = '新規ブログ';
    $labels->view_item = 'ブログを表示';
    $labels->search_items = 'ブログを検索';
    $labels->not_found = 'ブログが見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱内にブログが見つかりませんでした';
    $labels->all_items = 'ブログ一覧';
    $labels->menu_name = 'ブログ';
    $labels->name_admin_bar = 'ブログ';
}
add_action('init', 'utrading_change_post_object_label');