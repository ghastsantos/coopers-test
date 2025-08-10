<?php

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function coopers_theme_setup() {
	load_theme_textdomain( 'coopers-theme', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'coopers-theme' ),
		)
	);

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

	add_theme_support(
		'custom-background',
		apply_filters(
			'coopers_theme_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

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
add_action( 'after_setup_theme', 'coopers_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function coopers_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'coopers_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'coopers_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function coopers_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'coopers-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'coopers-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'coopers_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function coopers_theme_scripts() {
	wp_enqueue_style( 'coopers-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'coopers-theme-style', 'rtl', 'replace' );
	wp_enqueue_style(
		'coopers-google-fonts',
		'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap',
		false
	);


	wp_enqueue_script( 'coopers-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'coopers-theme-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'coopers_theme_scripts' );

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

