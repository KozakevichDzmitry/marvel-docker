<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
define('ICON_PATH', dirname(__FILE__) . '/icons/');
define('COMPONENTS_PATH', dirname(__FILE__) . '/components/');

require_once(dirname(__FILE__) . '/inc/carbon-fields.php');
require_once(dirname(__FILE__) . '/inc/customizer.php');
require_once(ICON_PATH . 'icon-btn.php');

function kd_marvel_setup() {

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'kd-marvel' ),
		)
	);


	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
    add_theme_support( 'custom-logo', array(
        'height'      => 145,
        'width'       => 55,
        'flex-width'  => true,
        'flex-height' => true,
    ) );
}
add_action( 'after_setup_theme', 'kd_marvel_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kd_marvel_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kd-marvel' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kd-marvel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kd_marvel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kd_marvel_scripts() {
	wp_enqueue_style( 'kd-marvel-style', get_stylesheet_uri(), array(), _S_VERSION );

    wp_register_style('fonts', get_template_directory_uri() . '/fonts/stylesheet.css', false, null);
    wp_enqueue_style('fonts');

    wp_enqueue_style( 'kd-style', get_template_directory_uri() . '/css/kd-style.css', array('kd-marvel-style'), _S_VERSION);

    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', null, _S_VERSION);
    wp_enqueue_script( 'section-indicator', get_template_directory_uri() . '/js/section-indicator.js', null, _S_VERSION);
    wp_enqueue_script( 'menu', get_template_directory_uri() . '/js/menu.js', null, _S_VERSION);

}
add_action( 'wp_enqueue_scripts', 'kd_marvel_scripts' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Add svg
 */
add_filter( 'upload_mimes', 'svg_upload_allow' );

function svg_upload_allow( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

    // WP 5.1 +
    if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) ){
        $dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
    }
    else {
        $dosvg = ( '.svg' === strtolower( substr( $filename, -4 ) ) );
    }

    // mime тип был обнулен, поправим его
    // а также проверим право пользователя
    if( $dosvg ){

        // разрешим
        if( current_user_can('manage_options') ){

            $data['ext']  = 'svg';
            $data['type'] = 'image/svg+xml';
        }
        // запретим
        else {
            $data['ext']  = false;
            $data['type'] = false;
        }

    }

    return $data;
}

/**
 * Replace submit button in Contact Form 7
 */
if(function_exists('wpcf7_init')){
    remove_action( 'wpcf7_init', 'wpcf7_add_form_tag_submit' );
    add_action( 'wpcf7_init', 'new_wpcf7_add_shortcode_submit_button',20 );

    function new_wpcf7_add_shortcode_submit_button() {
        wpcf7_add_shortcode( 'submit', 'new_wpcf7_submit_button_shortcode_handler' );
    }

    function new_wpcf7_submit_button_shortcode_handler( $tag ) {

     $html= '<div class="form__btn">
                <p>
                <button class="wpcf7-form-control wpcf7-submit btn btn-submit" type="submit">Send
                    <span class="wpcf7-spinner"></span>';
     ob_start();
     render_btn_icon();
     $html .= ob_get_clean();
     ob_end_flush();
     $html .= '</button>
            </p>
        </div>';
        return $html;
    }
}
