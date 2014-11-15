<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

  <title><?php if ( is_category() ) {
      echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
    } elseif ( is_tag() ) {
      echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
    } elseif ( is_archive() ) {
      wp_title(''); echo ' Archive | '; bloginfo( 'name' );
    } elseif ( is_search() ) {
      echo 'Search for &quot;'.esc_html($s).'&quot; | '; bloginfo( 'name' );
    } elseif ( is_home() || is_front_page() ) {
      bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
    }  elseif ( is_404() ) {
      echo 'Error 404 Not Found | '; bloginfo( 'name' );
    } elseif ( is_single() ) {
      wp_title('');
    } else {
      echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
    } ?></title>

  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ; ?>/css/materialize.css" />

  <!-- Favicons -->
  <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
  <meta name="msapplication-TileColor" content="#FFFFFF">
  <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
  <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">

  <!-- Android 5 Chrome Color -->
  <meta name="theme-color" content="#EE6E73">
  
  <link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
  
  <?php wp_head();?>
</head>

  
<body <?php body_class(); ?>>
  <nav id="front-page-nav">
    <div class="container">
      <div class="nav-wrapper">
        <a href="index.html" class="brand-logo" id="logo-container">
          <h2 style="color:#fff;font-size:24px;" class="site-title">MaterialPress</h2>
        </a>
        <?php $menu_args = array(
  'theme_location'  => 'primary',
  'container'       => 'ul',
  'container_class' => 'right side-nav',
  'container_id'    => 'nav-mobile',
  'menu_class'      => 'menu',
  'menu_id'         => '',
  'echo'            => true,
  'depth'           => 0,
);

wp_nav_menu( $menu_args );?>

        <a class="button-collapse" href="#" data-activates='nav-mobile'><i class="mdi-navigation-menu"></i></a>
      </div>
    </div>
  </nav>