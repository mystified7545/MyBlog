<?php
/* The Template for displaying header area.
 *
 * @package WordPress
 * @subpackage fixy
 * @since Fixy 0.1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

			<div class="site-head" id="site-head">
				<div class="banner">
					<div class="inner">
						<div class="site-title-container">
							<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php if(!is_single()){ ?>
									<h1  id="site-title"><?php esc_attr(bloginfo( 'name' )); ?></h1>
								<?php } else { ?>
									<h3  id="site-title"><?php esc_attr(bloginfo( 'name' )); ?></h3>
								<?php } ?>
							</a>
								<h2 class="site-description" id="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div><!--.site-title-container-->
						<div class="site-wizard-container">
							<ul>
								<li><a class="advancesearch" title="Advance Search"><i class="icon-search"></i></a></li>
								<li><a id="userlogin" title="User Login & Logout"><i class="icon-user"></i></a></li>
								<li><a id="rss2link" href="<?php echo get_bloginfo('rss2_url'); ?>" title="RSS"><i class="icon-rss"></i></a></li>
							</ul>
						</div><!--.site-wizard-container-->
							<?php fixy_login_panel();?>
						</div><!--.inner-->
				</div><!--.banner-->
	
	
				<div id="header-menu-bar" class="header-menu-bar">
					<div class="inner">
						<button class="menu-toggler"><i class="icon-menu"></i></button>
						<?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'menu_class' => 'header-menu' ) ); ?>
					</div><!--.inner-->
				</div><!--.header-menu-bar-->
			
			</div><!--.site-head-->
	
	<div class="main" id="main">
		<div class="content" id="content">
		
			<div class="advance-search-slide">
				<div class="inner">
					<?php fixy_search_form(array('echo'=>1,
											'archive_show'=>1,
											'cat_show'=>1,
											'tag_show'=>1,
											'author_show'=>1,
											'label_show'=>1,
											'advance_show'=>0,
											'close_show'=>1)); ?>
				</div><!--.inner-->	
			</div><!--.header-menu-bar-->	
	
		