<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package createc
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'createc' ); ?></a>

	<nav id="mobile-navigation" class="mobile-navigation" role="navigation">
		<div id="toggle"><span></span></div>
		<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
	</nav>

	<header id="masthead" class="site-header" role="banner">

		<div class="site-branding">
		<?php $logo = get_field('logo', 'option'); if( !empty($logo) ): ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" /></a>
		<?php endif; ?>
		</div>
		
		<div id="nav">
			<nav id="top-navigation" class="top-navigation" role="navigation">
				<ul class="login">
					<?php if ( is_user_logged_in() ): ?>
						<?php $current_user = wp_get_current_user(); ?>
						<li>Welcome, <?php echo $current_user->display_name; ?> | <a title="View Files" href="<?php echo home_url( '/dashboard' ); ?>" rel="login">View Downloads</a> | <a title="Logout to your account." href="<?php echo wp_logout_url(); ?>" rel="login">Log Out</a></li>
					<?php else: ?>
						<li><a title="Login to your dashboard." href="<?php echo wp_login_url( get_permalink() ); ?>" rel="login">Login</a></li>
					<?php endif; ?>
				</ul>
				<ul class="alt-menu">
					<li><a target="_blank" href="<?php the_field('twitter_url', 'option'); ?>"><i class="fa fa-twitter"></i></a></li>
					<li><a target="_blank" href="<?php the_field('facebook_url', 'option'); ?>"><i class="fa fa-facebook"></i></a></li>
					<li><a target="_blank" href="<?php the_field('linkedin_url', 'option'); ?>"><i class="fa fa-linkedin"></i></a></li>
					<li><a href="#" class="search-link"><i class="fa fa-search"></i></a></li>
				</ul>
				<div class="search-box" id="search-box">
					<a href="#" class="close">X</a>
					<h2>Search our website:</h2>
					<?php get_search_form(); ?>
				</div>
			</nav>
			<nav id="main-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
