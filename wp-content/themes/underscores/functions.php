<?php


function init_menu_styles(){
    wp_enqueue_style('menu-style', get_template_directory_uri()."/assets/css/menu_style.css");}
function init_main_styles(){
    wp_enqueue_style('main-style', get_template_directory_uri()."/assets/css/main_style.css");}
function init_fonts_style(){
    wp_enqueue_style('fonts-style', get_template_directory_uri()."/assets/fonts/fonts.css");}
function init_h_bootstrap_styles(){
    wp_enqueue_style('h-bootstrap-style', get_template_directory_uri()."/assets/libs/h-boobstrap.css");}

function init_career_styles(){
    wp_enqueue_style('career-style', get_template_directory_uri()."/assets/css/career.css");}
function init_convert_styles(){
    wp_enqueue_style('convert-style', get_template_directory_uri()."/assets/css/convert.css");}
function init_my_account_styles(){
    wp_enqueue_style('my_account-style', get_template_directory_uri()."/assets/css/my_account.css");}
function init_my_income_styles(){
    wp_enqueue_style('my_income-style', get_template_directory_uri()."/assets/css/my_income.css");}
function init_nimda_styles(){
    wp_enqueue_style('nimda-style', get_template_directory_uri()."/assets/css/nimda.css");}
function init_offering_styles(){
    wp_enqueue_style('offering-style', get_template_directory_uri()."/assets/css/offering.css");}
function init_referral_styles(){
    wp_enqueue_style('referral-style', get_template_directory_uri()."/assets/css/referral.css");}
function init_send_styles(){
    wp_enqueue_style('send-style', get_template_directory_uri()."/assets/css/send.css");}
function init_spec_styles(){
    wp_enqueue_style('spec-style', get_template_directory_uri()."/assets/css/spec.css");}
function init_support_styles(){
    wp_enqueue_style('support-style', get_template_directory_uri()."/assets/css/support.css");}
function init_top_up_styles(){
    wp_enqueue_style('top_up-style', get_template_directory_uri()."/assets/css/top_up.css");}
function init_withdraw_styles(){
    wp_enqueue_style('withdraw-style', get_template_directory_uri()."/assets/css/withdraw.css");}

function init_scripts01(){
    wp_enqueue_script('aside_menu_add_icons', get_template_directory_uri()."/assets/js/add_aside_icons.js");
}function init_scripts1(){
    wp_enqueue_script('menu-script__class-father', get_template_directory_uri()."/assets/js/class_father.js");
}
function init_scripts2(){
    wp_enqueue_script('menu-script__menu', get_template_directory_uri()."/assets/js/menu.js");
}
function init_ajax_scripts(){
    wp_enqueue_script('ajax_scripts', get_template_directory_uri()."/assets/js/ajax.js");
}
function init_nimda_scripts(){
    wp_enqueue_script('nimda_scripts', get_template_directory_uri()."/assets/js/nimda.js");
}
function init_my_account_scripts(){
    wp_enqueue_script('my_account_scripts', get_template_directory_uri()."/assets/js/my_account.js");
}
function init_spec_scripts(){
    wp_enqueue_script('spec_scripts', get_template_directory_uri()."/assets/js/spec.js");
}
function init_offering_scripts(){
    wp_enqueue_script('offering_scripts', get_template_directory_uri()."/assets/js/offering.js");
}
function init_top_up_scripts(){
    wp_enqueue_script('top_up_scripts', get_template_directory_uri()."/assets/js/top_up.js");
}
function init_withdraw_scripts(){
    wp_enqueue_script('withdraw_scripts', get_template_directory_uri()."/assets/js/withdraw.js");
}
function init_jquery_scripts(){
    wp_enqueue_script('jquery_scripts', get_template_directory_uri()."/assets/libs/jquery/jquery-3.6.0.slim.min.js");
}
function init_login_page_scripts(){
    wp_enqueue_script('login_page', get_template_directory_uri()."/assets/js/change_login_page.js");
}
function init_register_validation_scripts(){
    wp_enqueue_script('register_validation', get_template_directory_uri()."/assets/js/register_validation.js");
}
function init_validator(){
    wp_enqueue_script('validator', get_template_directory_uri()."/assets/libs/validator/validator.js");
}

add_action("wp_enqueue_scripts", 'init_fonts_style');
add_action("wp_enqueue_scripts", 'init_menu_styles');
add_action("wp_enqueue_scripts", 'init_main_styles');
add_action("wp_enqueue_scripts", 'init_h_bootstrap_styles');

add_action("wp_enqueue_scripts", 'init_career_styles');
add_action("wp_enqueue_scripts", 'init_convert_styles');
add_action("wp_enqueue_scripts", 'init_my_account_styles');
add_action("wp_enqueue_scripts", 'init_my_income_styles');
add_action("wp_enqueue_scripts", 'init_nimda_styles');
add_action("wp_enqueue_scripts", 'init_offering_styles');
add_action("wp_enqueue_scripts", 'init_referral_styles');
add_action("wp_enqueue_scripts", 'init_send_styles');
add_action("wp_enqueue_scripts", 'init_spec_styles');
add_action("wp_enqueue_scripts", 'init_support_styles');
add_action("wp_enqueue_scripts", 'init_top_up_styles');
add_action("wp_enqueue_scripts", 'init_withdraw_styles');

add_action("wp_footer", 'init_scripts01');
add_action("wp_footer", 'init_scripts1');
add_action("wp_footer", 'init_scripts2');
add_action("wp_footer", 'init_ajax_scripts');
add_action("wp_footer", 'init_nimda_scripts');
add_action("wp_footer", 'init_my_account_scripts');
add_action("wp_footer", 'init_spec_scripts');
add_action("wp_footer", 'init_offering_scripts');
add_action("wp_footer", 'init_top_up_scripts');
add_action("wp_footer", 'init_withdraw_scripts');
add_action("wp_footer", 'init_jquery_scripts');
add_action("wp_footer", 'init_login_page_scripts');
add_action("wp_footer", 'init_register_validation_scripts');
add_action("wp_footer", 'init_validator');



$mysql_host = "pr435071.mysql.tools";
$mysql_user  = "pr435071_wp";
$mysql_password = "T^ni4P4^7t";
$mysql_database = "pr435071_wp";
global $connect;
$connect=mysqli_connect(
    $mysql_host,
    $mysql_user,
    $mysql_password,
    $mysql_database);
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}
function connectDB($sql){
    global $connect;
    $result = $connect->query($sql);
    return mysqli_fetch_all($result);
}
function insertDB($sql){
    global $connect;
    $result = $connect->query($sql);
//    mysqli_close($connect);
    return $result;
}



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
add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link', 40 );
function misha_log_history_link( $menu_links ){

    $menu_links = array_slice( $menu_links, 0, 5, true )
        + array(
//            'log-history' => 'Log history',
            'my_account' => 'Мой кабинет',
            'career' => 'Карьера',
            'offering' => 'Контракты',
            'spec' => 'Спец. Пред.',
            'my_income' => 'Мои доходы',
            'send' => 'Отправить',
            'convert' => 'Конвертация',
            'top_up' => 'Пополнить',
            'withdraw' => 'Вывести',
            'support' => 'Поддержка',
            'referral' => 'Рефералы',
        )
        + array_slice( $menu_links, 5, NULL, true );

    $user_id = get_current_user_id();
    if(get_userdata($user_id)->roles[0]  === "administrator"){
        $menu_links = array_merge(array('nimda'=>'Админпанель'), $menu_links);
    }
    return $menu_links;

}
/*
 * Step 2. Register Permalink Endpoint
 */
add_action( 'init', 'misha_add_endpoint' );
function misha_add_endpoint() {
    // WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
//    add_rewrite_endpoint( 'log-history', EP_PAGES );
    add_rewrite_endpoint( 'nimda', EP_PAGES );
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
    // todo:                                                       . . : : php : : . .
//    add_rewrite_endpoint( 'h_get_bills', EP_PAGES );
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
add_action( 'woocommerce_account_nimda_endpoint', 'misha_my_account_endpoint_content13' );
function misha_my_account_endpoint_content13() {
    include_once "custom-pages/nimda.php";
}
// todo:                                                       . . : : php : : . .
//add_action( 'woocommerce_account_nimda_endpoint', 'h_get_bills' );
//function h_get_bills() {
//    include_once "assets/php/h_get_bills.php";
//}
// todo:                                                       . . : : extra fields : : . .
function woocom_extra_register_fields() {?>
    <p class="form-row form-row-wide">
        <label for="reg_billing_first_name"><?php _e( "Телефон", "woocommerce" ); ?>
            <span class="required">*</span></label>
        <input placeholder="Телефон" type="text" class="input-text" name="billing_phone" id="reg_billing_phone"
               value="<?php if ( ! empty( $_POST["billing_phone"] ) ) esc_attr_e( $_POST["billing_phone"] ); ?>"/></p>
    <?php
}
function woocom_save_extra_register_fields($customer_id) {
    if (isset($_POST["billing_phone"])) {
        update_user_meta($customer_id, "billing_phone", sanitize_text_field($_POST["billing_phone"]));
    }
}

add_action("woocommerce_created_customer", "woocom_save_extra_register_fields");

add_action( "woocommerce_register_form_start", "woocom_extra_register_fields" );
/*
 * Step 4
 */
// Go to Settings > Permalinks and just push "Save Changes" button.

// todo:
add_filter('woocommerce_login_redirect', 'login_redirect');

function login_redirect($redirect_to) {
    return home_url().'/my-account/my_account/';
}
