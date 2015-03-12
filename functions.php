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
function materialpress_widgets() {

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
add_action( 'widgets_init', 'materialpress_widgets' );

/**
 * Theme Support
*/
function materialpress_support() {
	add_theme_support( 'custom-background' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link','image','quote','video','status','audio') );
}
add_action( 'after_setup_theme', 'materialpress_support' );

/* Customizer API */
class materialpress_customize {
   public static function register ( $wp_customize ) {
	  //1. Define a new section (if desired) to the Theme Customizer
	  $wp_customize->add_section( 'materialpress_options', 
	     array(
	        'title' => __( 'MaterialPress Options', 'materialpress' ), //Visible title of section
	        'priority' => 35, //Determines what order this appears in
	        'capability' => 'edit_theme_options', //Capability needed to tweak
	        'description' => __('Customize MaterialPress to your liking.', 'materialpress'), //Descriptive tooltip
	     ) 
	  );
	  
	  //2. Register new settings to the WP database...
	  $wp_customize->add_setting( 'link_textcolor', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
	     array(
	        'default' => '#2BA6CB', //Default setting/value to save
	        'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
	        'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
	        'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
	     ) 
	  );      
	        
	  //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
	  $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
	     $wp_customize, //Pass the $wp_customize object (required)
	     'materialpress_link_textcolor', //Set a unique ID for the control
	     array(
	        'label' => __( 'Link Color', 'materialpress' ), //Admin-visible name of the control
	        'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
	        'settings' => 'link_textcolor', //Which setting to load and manipulate (serialized is okay)
	        'priority' => 10, //Determines the order this control appears in for the specified section
	     ) 
	  ) );
	  
	  //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
	  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	  $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	  $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
   }

   public static function header_output() {
	  ?>
	  <!--Customizer CSS--> 
	  <style type="text/css">
	       <?php self::generate_css('#site-title a', 'color', 'header_textcolor', '#'); ?> 
	       <?php self::generate_css('body', 'background-color', 'background_color', '#'); ?> 
	       <?php self::generate_css('a', 'color', 'link_textcolor'); ?>
	  </style> 
	  <!--/Customizer CSS-->
	  <?php
   }
   
   public static function live_preview() {
	  wp_enqueue_script( 
	       'materialpress-themecustomizer', // Give the script a unique ID
	       get_template_directory_uri() . '/js/theme-customizer.js', // Define the path to the JS file
	       array(  'jquery', 'customize-preview' ), // Define dependencies
	       '', // Define a version (optional) 
	       true // Specify whether to put in footer (leave this true)
	  );
   }

	public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
	  $return = '';
	  $mod = get_theme_mod($mod_name);
	  if ( ! empty( $mod ) ) {
	     $return = sprintf('%s { %s:%s; }',
	        $selector,
	        $style,
	        $prefix.$mod.$postfix
	     );
	     if ( $echo ) {
	        echo $return;
	     }
	  }
	  return $return;
	}
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'materialpress_customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'materialpress_customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'materialpress_customize' , 'live_preview' ) );

?>