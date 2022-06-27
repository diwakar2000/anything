<?php
/**
 * butter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package butter
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
function butter_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on butter, use a find and replace
		* to change 'butter' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'butter', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'butter' )
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
			'butter_custom_background_args',
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
add_action( 'after_setup_theme', 'butter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function butter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'butter_content_width', 640 );
}
add_action( 'after_setup_theme', 'butter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function butter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'butter' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'butter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'butter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function butter_scripts() {
	wp_enqueue_style( 'butter-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'common-style', get_template_directory_uri().'/css/style.css', array(), _S_VERSION );
	wp_enqueue_style( 'reset-style', get_template_directory_uri().'/css/reset.css', array(), _S_VERSION );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/css/font-awesome/css/font-awesome.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'webfont', get_template_directory_uri().'/css/Simple-Line-Icons-Webfont/simple-line-icons.css', array(), _S_VERSION );
	wp_enqueue_style( 'font', get_template_directory_uri().'/css/et-line-font/et-line-font.css', array(), _S_VERSION );
	wp_enqueue_style( 'responsive', get_template_directory_uri().'/css/responsive-leyouts.css', array(), _S_VERSION, 'screen' );
	wp_enqueue_style( 'main-menu', get_template_directory_uri().'/js/mainmenu/menu.css', array(), _S_VERSION );
	wp_enqueue_style( 'masterslider-style', get_template_directory_uri().'/js/masterslider/style/style.css', array(), _S_VERSION );
	wp_enqueue_style( 'masterslider', get_template_directory_uri().'/js/masterslider/style/masterslider.css', array(), _S_VERSION );
	wp_enqueue_style( 'masterslider-default-style', get_template_directory_uri().'/js/masterslider/skins/default/style.css', array(), _S_VERSION );

	wp_enqueue_style( 'cubeportfolio', get_template_directory_uri().'/js/cubeportfolio/css/cubeportfolio.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'sky-forms', get_template_directory_uri().'/js/form/css/sky-forms.css', array(), _S_VERSION );
	wp_enqueue_style( 'animations', get_template_directory_uri().'/js/animations/css/animations.min.css', array(), _S_VERSION );

	wp_style_add_data( 'butter-style', 'rtl', 'replace' );

	wp_enqueue_script( 'butter-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'jquery_min', get_template_directory_uri() . '/js/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array('jquery_min'), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery_min'), _S_VERSION, true );

	wp_enqueue_script( 'jquery-masterslider', get_template_directory_uri() . '/js/masterslider/jquery.easing.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'masterslider', get_template_directory_uri() . '/js/masterslider/masterslider.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'load-cubeportfolio-jquery-latest', get_template_directory_uri() . '/js/cubeportfolio/jquery-latest.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'load-cubeportfolio-jquery', get_template_directory_uri() . '/js/cubeportfolio/jquery.cubeportfolio.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'cubeportfolio-init', get_template_directory_uri() . '/js/cubeportfolio/main4.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/js/form/jquery-ui.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery-form', get_template_directory_uri() . '/js/form/jquery.form.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jquery-validate', get_template_directory_uri() . '/js/form/jquery.validate.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'sticky', get_template_directory_uri() . '/js/mainmenu/sticky.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'totop', get_template_directory_uri() . '/js/scrolltotop/totop.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'butter_scripts' );

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

