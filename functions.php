<?php 

/**
 * Enqueue scripts and styles.
*/
function materialpress_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'mp-materialize', get_template_directory_uri() . '/js/materialize.js', array(), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'materialpress_scripts' );

/**
 * Navigation Menus
*/

function materialpress_nav_menu() {
  register_nav_menu( 'primary', 'Primary Menu' );
}  
add_action( 'after_setup_theme', 'materialpress_nav_menu' );

?>