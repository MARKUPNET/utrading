<?php
/**
 * Customizer
 * 
 * @package WordPress
 * @subpackage u-trading
 * @since u-trading 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cv_workfolio_customize_register( $wp_customize ) {
    // Check for existence of WP_Customize_Manager before proceeding
	if ( ! class_exists( 'WP_Customize_Manager' ) ) {
        return;
    }
    
    // Add the "Go to Premium" upsell section
	$wp_customize->add_section( new Cv_Workfolio_Upsell_Section( $wp_customize, 'upsell_premium_section', array(
		'title'       => __( 'CV Workfolio', 'cv-workfolio' ),
		'button_text' => __( 'GO TO PREMIUM', 'cv-workfolio' ),
		'url'         => esc_url( CV_WORKFOLIO_BUY_NOW ),
		'priority'    => 0,
	)));

	// Add the "Bundle" upsell section
	$wp_customize->add_section( new Cv_Workfolio_Upsell_Section( $wp_customize, 'upsell_bundle_section', array(
		'title'       => __( 'All themes in Single Package', 'cv-workfolio' ),
		'button_text' => __( 'GET BUNDLE', 'cv-workfolio' ),
		'url'         => esc_url( CV_WORKFOLIO_BUNDLE ),
		'priority'    => 1,
	)));
}
add_action( 'customize_register', 'cv_workfolio_customize_register' );

if ( class_exists( 'WP_Customize_Section' ) ) {
	class Cv_Workfolio_Upsell_Section extends WP_Customize_Section {
		public $type = 'cv-workfolio-upsell';
		public $button_text = '';
		public $url = '';

		protected function render() {
			?>
			<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="cv_workfolio_upsell_section accordion-section control-section control-section-<?php echo esc_attr( $this->id ); ?> cannot-expand">
				<h3 class="accordion-section-title premium-details">
					<?php echo esc_html( $this->title ); ?>
					<a href="<?php echo esc_url( $this->url ); ?>" class="button button-secondary alignright" target="_blank" style="margin-top: -4px;"><?php echo esc_html( $this->button_text ); ?></a>
				</h3>
			</li>
			<?php
		}
	}
}

/**
 * Enqueue script for custom customize control.
 */
function cv_workfolio_custom_control_scripts() {
	wp_enqueue_script( 'cv-workfolio-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-sortable' ), '1.0', true );

    wp_enqueue_style( 'cv-workfolio-customizer-css', get_template_directory_uri() . '/assets/css/customizer.css', array(), '1.0' );
}
add_action( 'customize_controls_enqueue_scripts', 'cv_workfolio_custom_control_scripts' );


/**
 * utrading_setup
 */
add_image_size('works', 450, 300, true);

/**
 * カスタム投稿タイプを追加
 */
add_action('init', 'create_post_types');
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