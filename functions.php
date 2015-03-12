<?php 

if ( ! isset( $content_width ) ) $content_width = 900;

/**
 * Enqueue scripts and styles.
*/
function materialpress_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'mp-materialize', get_template_directory_uri() . '/js/materialize.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'tabs', get_template_directory_uri() . '/js/tabs.js', array(), '1.0.0', true );
	wp_enqueue_script( 'collapsible', get_template_directory_uri() . '/js/collapsible.js', array(), '1.0.0', true );
	wp_enqueue_script( 'dropdown', get_template_directory_uri() . '/js/dropdown.js', array(), '1.0.0', true );
	wp_enqueue_script( 'forms', get_template_directory_uri() . '/js/forms.js', array(), '1.0.0', true );
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array(), '1.0.0', true );
	wp_enqueue_script( 'leanModal', get_template_directory_uri() . '/js/leanModal.js', array(), '1.0.0', true );
	wp_enqueue_script( 'materialbox', get_template_directory_uri() . '/js/materialbox.js', array(), '1.0.0', true );
	wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.js', array(), '1.0.0', true );
	wp_enqueue_script( 'prism', get_template_directory_uri() . '/js/prism.js', array(), '1.0.0', true );
	wp_enqueue_script( 'scrollspy', get_template_directory_uri() . '/js/scrollspy.js', array(), '1.0.0', true );
	wp_enqueue_script( 'sideNav', get_template_directory_uri() . '/js/sideNav.js', array(), '1.0.0', true );
	wp_enqueue_script( 'toasts', get_template_directory_uri() . '/js/toasts.js', array(), '1.0.0', true );
	wp_enqueue_script( 'tooltip', get_template_directory_uri() . '/js/tooltip.js', array(), '1.0.0', true );
	wp_enqueue_script( 'velocity', get_template_directory_uri() . '/js/velocity.min.js', array(), '1.0.0', true );

	wp_enqueue_script( 'init', get_template_directory_uri() . '/js/init.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'materialpress_scripts' );

/**
 * Navigation Menus
*/

function materialpress_nav_menu() {
	register_nav_menu( 'primary', 'Primary Menu' );
	register_nav_menu( 'footer', 'Footer Menu' );
}  
add_action( 'after_setup_theme', 'materialpress_nav_menu' );

/* Add Waves Effect to Menu Items */
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	$classes[] = "waves-effect waves-light";
	return $classes;
}


/**
 * Register sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer-widgetize-1',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="white-text truncate">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'footer-widgetize-2',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="white-text truncate">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => 'Footer 3',
		'id'            => 'footer-widgetize-3',
		'before_widget' => '<div class="footer-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="white-text truncate">',
		'after_title'   => '</h5>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

/**
 * Theme Support
*/
function materialpress_support() {
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link','image','quote','video','status','audio') );
}
add_action( 'after_setup_theme', 'materialpress_support' );

?>