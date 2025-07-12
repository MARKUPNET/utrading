<?php
/**
 * U-Trade functions
 * 
 * @package Wordpress
 * @subpackage u-trading
 * @since 1.0
 */

if ( ! function_exists( 'utrading_setup' ) ) :
function utrading_setup() {

    // テーマの翻訳
    load_theme_textdomain( 'utrading' );

    // オリジナル画像サイズを追加
    add_action('after_setup_theme', function() {
        add_image_size('custom-thumb', 600, 400, true); // 幅600px, 高さ400px, トリミングあり
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

// カスタム投稿タイプ・タクソノミー登録
function ut_cpts_news() {

    /**
     * Post Type: 新着情報.
     */

    $labels = [
        "name" => "新着情報",
        "singular_name" => "新着情報",
    ];

    $args = [
        "label" => "新着情報",
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "menu_position" => 6,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "news", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title", "editor", "thumbnail" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "news", $args );
}

add_action( 'init', 'ut_cpts_news' );

function ut_taxes_news_cat() {

    /**
     * Taxonomy: カテゴリ.
     */

    $labels = [
        "name" => "カテゴリ",
        "singular_name" => "カテゴリ",
    ];

    $args = [
        "label" => "カテゴリ",
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'news_cat', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "news_cat",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => false,
        "sort" => false,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "news_cat", [ "news" ], $args );
}
add_action( 'init', 'ut_taxes_news_cat' );

function ut_cpts_works() {

    /**
     * Post Type: 施工実績.
     */

    $labels = [
        "name" => "施工実績",
        "singular_name" => "施工実績",
    ];

    $args = [
        "label" => "施工実績",
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "menu_position" => 7,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "works", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title", "editor", "thumbnail" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "works", $args );
    }

add_action( 'init', 'ut_cpts_works' );

function ut_taxes_works_cat() {

    /**
     * Taxonomy: カテゴリ.
     */

    $labels = [
        "name" => "カテゴリ",
        "singular_name" => "カテゴリ",
    ];


    $args = [
        "label" => "カテゴリ",
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => false,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'works_cat', 'with_front' => true, ],
        "show_admin_column" => false,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "works_cat",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => false,
        "sort" => false,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "works_cat", [ "works" ], $args );
}
add_action( 'init', 'ut_taxes_works_cat' );


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

/**
 * カスタムパンくずリストを表示する関数
 * Category と指定したカスタムタクソノミーをサポート
 * @param array $args カスタマイズオプション
 */
function ut_custom_breadcrumb( $args = array() ) {
    $defaults = array(
        'home_text' => 'HOME',
        'delimiter' => '', // 区切り文字（<li>間の表示はCSSで行うのが一般的）
        'show_on_front' => false, // トップページでパンくずを表示するか
        'show_home' => true, // HOMEへのリンクを表示するか
        'show_current' => true, // 現在のページ名をパンくずの最後に表示するか
        'before' => '', // 各パンくずアイテムの前に挿入するHTML
        'after' => '',  // 各パンくずアイテムの後に挿入するHTML
        // 投稿ページで表示したいタクソノミー。'category' を含めることでカテゴリーも処理されます。
        // 指定しない場合は 'category' のみがデフォルトになります。
        'taxonomies_to_display' => array('category'),
    );
    $args = wp_parse_args( $args, $defaults );

    if ( is_front_page() && ! $args['show_on_front'] ) {
        return; // トップページで表示しない設定なら終了
    }

    echo '<ol class="ut_breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">';
    $position = 1;

    // HOME
    if ( $args['show_home'] ) {
        echo '<li class="ut_breadcrumb-item" itemscope itemtype="https://schema.org/ListItem">';
        echo '<a href="' . esc_url( home_url('/') ) . '" itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="' . esc_url( home_url('/') ) . '">';
        echo '<span itemprop="name">' . esc_html( $args['home_text'] ) . '</span>';
        echo '</a>';
        echo '<meta itemprop="position" content="' . $position++ . '">';
        echo '</li>';
    }

    if ( is_singular() && ! is_front_page() ) {
        global $post;

        // タクソノミー階層 (投稿に設定されている最初のタクソノミーを表示)
        // 'taxonomies_to_display' に 'category' が含まれていれば、カテゴリーもここで処理されます。
        foreach ( $args['taxonomies_to_display'] as $taxonomy_slug ) {
            $terms = get_the_terms( $post->ID, $taxonomy_slug );
            if ( $terms && ! is_wp_error( $terms ) ) {
                $term = array_shift( $terms ); // 最初のタームを選択

                $ancestors = get_ancestors( $term->term_id, $taxonomy_slug, 'taxonomy' );
                $ancestors = array_reverse( $ancestors );

                foreach ( $ancestors as $ancestor_id ) {
                    $ancestor_term = get_term( $ancestor_id, $taxonomy_slug );
                    echo '<li class="ut_breadcrumb-item" itemscope itemtype="https://schema.org/ListItem">';
                    echo '<a href="' . esc_url( get_term_link( $ancestor_term ) ) . '" itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="' . esc_url( get_term_link( $ancestor_term ) ) . '">';
                    echo '<span itemprop="name">' . esc_html( $ancestor_term->name ) . '</span>';
                    echo '</a>';
                    echo '<meta itemprop="position" content="' . $position++ . '">';
                    echo '</li>';
                }
                // 現在のタクソノミー/カテゴリー
                echo '<li class="ut_breadcrumb-item" itemscope itemtype="https://schema.org/ListItem">';
                echo '<a href="' . esc_url( get_term_link( $term ) ) . '" itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="' . esc_url( get_term_link( $term ) ) . '">';
                echo '<span itemprop="name">' . esc_html( $term->name ) . '</span>';
                echo '</a>';
                echo '<meta itemprop="position" content="' . $position++ . '">';
                echo '</li>';
                break; // 最初のタクソノミーを見つけたらループを抜ける (複数のタクソノミーが設定されている場合)
            }
        }

        // 現在の投稿タイトル
        if ( $args['show_current'] ) {
            echo '<li class="ut_breadcrumb-item" itemscope itemtype="https://schema.org/ListItem">';
            echo '<span itemprop="name">' . esc_html( get_the_title() ) . '</span>';
            echo '<meta itemprop="position" content="' . $position++ . '">';
            echo '</li>';
        }

    } elseif ( is_tax() || is_category() || is_tag() ) { // タクソノミーアーカイブページの場合
        $queried_object = get_queried_object();
        $taxonomy_slug = $queried_object->taxonomy;
        $term_id = $queried_object->term_id;

        $ancestors = get_ancestors( $term_id, $taxonomy_slug, 'taxonomy' );
        $ancestors = array_reverse( $ancestors );

        foreach ( $ancestors as $ancestor_id ) {
            $ancestor_term = get_term( $ancestor_id, $taxonomy_slug );
            echo '<li class="ut_breadcrumb-item" itemscope itemtype="https://schema.org/ListItem">';
            echo '<a href="' . esc_url( get_term_link( $ancestor_term ) ) . '" itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="' . esc_url( get_term_link( $ancestor_term ) ) . '">';
            echo '<span itemprop="name">' . esc_html( $ancestor_term->name ) . '</span>';
            echo '</a>';
            echo '<meta itemprop="position" content="' . $position++ . '">';
            echo '</li>';
        }
        // 現在のターム
        if ( $args['show_current'] ) {
            echo '<li class="ut_breadcrumb-item" itemscope itemtype="https://schema.org/ListItem">';
            echo '<span itemprop="name">' . esc_html( $queried_object->name ) . '</span>';
            echo '<meta itemprop="position" content="' . $position++ . '">';
            echo '</li>';
        }

    } elseif ( is_post_type_archive() ) { // カスタム投稿タイプアーカイブの場合
        $post_type_obj = get_post_type_object( get_query_var('post_type') );
        if ( $args['show_current'] ) {
            echo '<li class="ut_breadcrumb-item" itemscope itemtype="https://schema.org/ListItem">';
            echo '<span itemprop="name">' . esc_html( $post_type_obj->labels->name ) . '</span>';
            echo '<meta itemprop="position" content="' . $position++ . '">';
            echo '</li>';
        }
    } elseif ( is_page() && ! is_front_page() ) { // 固定ページの場合 (トップページ以外)
        $ancestors = get_post_ancestors( get_the_ID() );
        $ancestors = array_reverse( $ancestors );

        foreach ( $ancestors as $ancestor_id ) {
            echo '<li class="ut_breadcrumb-item" itemscope itemtype="https://schema.org/ListItem">';
            echo '<a href="' . esc_url( get_permalink( $ancestor_id ) ) . '" itemscope itemtype="https://schema.org/WebPage" itemprop="item" itemid="' . esc_url( get_permalink( $ancestor_id ) ) . '">';
            echo '<span itemprop="name">' . esc_html( get_the_title( $ancestor_id ) ) . '</span>';
            echo '</a>';
            echo '<meta itemprop="position" content="' . $position++ . '">';
            echo '</li>';
        }
        if ( $args['show_current'] ) {
            echo '<li class="ut_breadcrumb-item" itemscope itemtype="https://schema.org/ListItem">';
            echo '<span itemprop="name">' . esc_html( get_the_title() ) . '</span>';
            echo '<meta itemprop="position" content="' . $position++ . '">';
            echo '</li>';
        }
    } elseif ( is_search() ) { // 検索結果ページの場合
        if ( $args['show_current'] ) {
            echo '<li class="ut_breadcrumb-item" itemscope itemtype="https://schema.org/ListItem">';
            echo '<span itemprop="name">' . sprintf( esc_html__( 'Search Results for: %s', 'your-text-domain' ), '<span>' . esc_html( get_search_query() ) . '</span>' ) . '</span>';
            echo '<meta itemprop="position" content="' . $position++ . '">';
            echo '</li>';
        }
    } elseif ( is_404() ) { // 404ページの場合
        if ( $args['show_current'] ) {
            echo '<li class="ut_breadcrumb-item" itemscope itemtype="https://schema.org/ListItem">';
            echo '<span itemprop="name">' . esc_html__( 'Page Not Found', 'your-text-domain' ) . '</span>';
            echo '<meta itemprop="position" content="' . $position++ . '">';
            echo '</li>';
        }
    }

    echo '</ol>';
}

/**
 * 現在のパーマリンク（リライト）ルールを画面に出力して確認するための診断用関数
 */
function utrading_debug_rewrite_rules() {
    // 管理者でログインしていて、URLに ?debug_rewrite=1 がある場合のみ実行
    if ( current_user_can('manage_options') && isset( $_GET['debug_rewrite'] ) && '1' === $_GET['debug_rewrite'] ) {
        global $wp_rewrite;
        header('Content-Type: text/plain; charset=utf-8');
        echo "--- WordPress Rewrite Rules ---\n\n";
        print_r( $wp_rewrite->rules );
        echo "\n--- End of Rules ---";
        die(); // これ以上処理を進めない
    }
}
add_action( 'init', 'utrading_debug_rewrite_rules', 999 );
