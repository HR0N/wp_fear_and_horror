<?php



function init_menu_styles(){
    wp_enqueue_style('menu-style', get_template_directory_uri()."/assets/css/menu_style.css");}
function init_main_styles(){
    wp_enqueue_style('main-style', get_template_directory_uri()."/assets/css/main_style.css");}
function init_fonts_style(){
    wp_enqueue_style('fonts-style', get_template_directory_uri()."/assets/fonts/fonts.css");}
function init_scripts1(){
    wp_enqueue_script('menu-script__class-father', get_template_directory_uri()."/assets/js/class_father.js");
}
function init_scripts2(){
    wp_enqueue_script('menu-script__menu', get_template_directory_uri()."/assets/js/menu.js");
}

add_action("wp_enqueue_scripts", 'init_fonts_style');
add_action("wp_enqueue_scripts", 'init_menu_styles');
add_action("wp_enqueue_scripts", 'init_main_styles');
add_action("wp_footer", 'init_scripts1');
add_action("wp_footer", 'init_scripts2');


/**
 * underscores functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package underscores
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function underscores_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on underscores, use a find and replace
		* to change 'underscores' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'underscores', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'underscores' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'underscores_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'underscores_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function underscores_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'underscores_content_width', 640 );
}
add_action( 'after_setup_theme', 'underscores_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function underscores_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'underscores' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'underscores' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'underscores_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function underscores_scripts() {
	wp_enqueue_style( 'underscores-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'underscores-style', 'rtl', 'replace' );

	wp_enqueue_script( 'underscores-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'underscores_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// todo:                                                         . . : : remove personal links : : . .
add_filter ( 'woocommerce_account_menu_items', 'misha_remove_my_account_links' );
function misha_remove_my_account_links( $menu_links ){

    unset( $menu_links['edit-address'] ); // Addresses
    unset( $menu_links['dashboard'] ); // Dashboard
    unset( $menu_links['payment-methods'] ); // Payment Methods
    unset( $menu_links['orders'] ); // Orders
    unset( $menu_links['downloads'] ); // Downloads
    unset( $menu_links['edit-account'] ); // Account details
    unset( $menu_links['customer-logout'] ); // Logout

    return $menu_links;
}
// todo:                                                         . . : : add personal links : : . .
// custom link
//add_filter ( 'woocommerce_account_menu_items', 'misha_one_more_link' );
function misha_one_more_link( $menu_links ){

    // we will hook "anyuniquetext123" later
    $new = array( 'anyuniquetext123' => 'Gift for you' );

    // or in case you need 2 links
    // $new = array( 'link1' => 'Link 1', 'link2' => 'Link 2' );

    // array_slice() is good when you want to add an element between the other ones
    $menu_links = array_slice( $menu_links, 0, 1, true )
        + $new
        + array_slice( $menu_links, 1, NULL, true );

    return $menu_links;
}
add_filter( 'woocommerce_get_endpoint_url', 'misha_hook_endpoint', 10, 4 );
function misha_hook_endpoint( $url, $endpoint, $value, $permalink ){

    if( $endpoint === 'anyuniquetext123' ) {

        // ok, here is the place for your custom URL, it could be external
        $url = site_url();

    }
    return $url;
}
// todo:                                                       . . : : some operations to "add side menu item" : : . .
/*
 * Step 1. Add Link to My Account menu
 */
/*

            'my_account' => 'Мой кабинет',
            'career' => 'Карьера',
            'offering' => 'Предложения',
            'spec' => 'Спец',
            'my_income' => 'Мои доходы',
            'send' => 'Отправ',
            'convert' => 'Конвертировать',
            'top_up' => 'Пополнить',
            'withdraw' => 'Вывести',
            'support' => 'Поддержка',
            'referral' => 'Рефералы',
 */
add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link', 40 );
//add_filter ( 'woocommerce_account_menu_items', 'misha_my_account_link', 40 );
//add_filter ( 'woocommerce_account_menu_items', 'misha_career_link', 40 );
//add_filter ( 'woocommerce_account_menu_items', 'misha_offering_link', 40 );
//add_filter ( 'woocommerce_account_menu_items', 'misha_spec_link', 40 );
//add_filter ( 'woocommerce_account_menu_items', 'misha_my_income_link', 40 );
//add_filter ( 'woocommerce_account_menu_items', 'misha_send_link', 40 );
//add_filter ( 'woocommerce_account_menu_items', 'misha_convert_link', 40 );
//add_filter ( 'woocommerce_account_menu_items', 'misha_top_up_link', 40 );
//add_filter ( 'woocommerce_account_menu_items', 'misha_withdraw_link', 40 );
//add_filter ( 'woocommerce_account_menu_items', 'misha_support_link', 40 );
//add_filter ( 'woocommerce_account_menu_items', 'misha_referral_link', 40 );
function misha_log_history_link( $menu_links ){

    $menu_links = array_slice( $menu_links, 0, 5, true )
        + array(
//            'log-history' => 'Log history',
            'my_account' => 'Мой кабинет',
            'career' => 'Карьера',
            'offering' => 'Предложения',
            'spec' => 'Спец',
            'my_income' => 'Мои доходы',
            'send' => 'Отправ',
            'convert' => 'Конвертировать',
            'top_up' => 'Пополнить',
            'withdraw' => 'Вывести',
            'support' => 'Поддержка',
            'referral' => 'Рефералы',
        )
        + array_slice( $menu_links, 5, NULL, true );

    return $menu_links;

}
/*
 * Step 2. Register Permalink Endpoint
 */
add_action( 'init', 'misha_add_endpoint' );
function misha_add_endpoint() {

    // WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
//    add_rewrite_endpoint( 'log-history', EP_PAGES );
    add_rewrite_endpoint( 'my_account', EP_PAGES );
    add_rewrite_endpoint( 'career', EP_PAGES );
    add_rewrite_endpoint( 'offering', EP_PAGES );
    add_rewrite_endpoint( 'spec', EP_PAGES );
    add_rewrite_endpoint( 'my_income', EP_PAGES );
    add_rewrite_endpoint( 'send', EP_PAGES );
    add_rewrite_endpoint( 'convert', EP_PAGES );
    add_rewrite_endpoint( 'top_up', EP_PAGES );
    add_rewrite_endpoint( 'withdraw', EP_PAGES );
    add_rewrite_endpoint( 'support', EP_PAGES );
    add_rewrite_endpoint( 'referral', EP_PAGES );

}
/*
 * Step 3. Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint
 */
// custom page
add_action( 'woocommerce_account_log-history_endpoint', 'misha_my_account_endpoint_content' );
function misha_my_account_endpoint_content() {

    // of course you can print dynamic content here, one of the most useful functions here is get_current_user_id()
    echo 'Last time you logged in: yesterday from Safari.';

}
add_action( 'woocommerce_account_my_account_endpoint', 'misha_my_account_endpoint_content2' );
function misha_my_account_endpoint_content2() {
    include_once "custom-pages/my_account.php";
}
add_action( 'woocommerce_account_career_endpoint', 'misha_my_account_endpoint_content3' );
function misha_my_account_endpoint_content3() {
    include_once "custom-pages/career.php";
}
add_action( 'woocommerce_account_offering_endpoint', 'misha_my_account_endpoint_content4' );
function misha_my_account_endpoint_content4() {
    include_once "custom-pages/offering.php";
}
add_action( 'woocommerce_account_spec_endpoint', 'misha_my_account_endpoint_content5' );
function misha_my_account_endpoint_content5() {
    include_once "custom-pages/spec.php";
}
add_action( 'woocommerce_account_my_income_endpoint', 'misha_my_account_endpoint_content6' );
function misha_my_account_endpoint_content6() {
    include_once "custom-pages/my_income.php";
}
add_action( 'woocommerce_account_send_endpoint', 'misha_my_account_endpoint_content7' );
function misha_my_account_endpoint_content7() {
    include_once "custom-pages/send.php";
}
add_action( 'woocommerce_account_convert_endpoint', 'misha_my_account_endpoint_content8' );
function misha_my_account_endpoint_content8() {
    include_once "custom-pages/convert.php";
}
add_action( 'woocommerce_account_top_up_endpoint', 'misha_my_account_endpoint_content9' );
function misha_my_account_endpoint_content9() {
    include_once "custom-pages/top_up.php";
}
add_action( 'woocommerce_account_withdraw_endpoint', 'misha_my_account_endpoint_content10' );
function misha_my_account_endpoint_content10() {
    include_once "custom-pages/withdraw.php";
}
add_action( 'woocommerce_account_support_endpoint', 'misha_my_account_endpoint_content11' );
function misha_my_account_endpoint_content11() {
    include_once "custom-pages/support.php";
}
add_action( 'woocommerce_account_referral_endpoint', 'misha_my_account_endpoint_content12' );
function misha_my_account_endpoint_content12() {
    include_once "custom-pages/referral.php";
}
/*
 * Step 4
 */
// Go to Settings > Permalinks and just push "Save Changes" button.