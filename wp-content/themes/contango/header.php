<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="wrapper hfeed site">

  <header id="masthead" class="site-header" role="banner">
    <div class="container_16 clearfix">
      <div class="grid_16">
        <?php get_template_part( 'custom', 'header' ); ?>
      </div>
    </div>
  </header><!-- #masthead -->


  <div class="container_16 clearfix">
    <nav id="site-navigation" class="grid_16 main-navigation" role="navigation">
      <?php get_template_part( 'primary', 'menu' ); ?>
    </nav><!-- #site-navigation -->
  </div>