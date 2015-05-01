<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package jrnopswp
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<?php echo file_get_contents('http://www.asu.edu/asuthemes/4.3/heads/default.shtml'); ?><!-- ASU Header -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php echo file_get_contents('http://www.asu.edu/asuthemes/4.3/includes/gtm.shtml'); ?><!-- ASU Google Tag Manager -->

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'jrnopswp' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div id="asu_header">
			<?php $asu_header =  file_get_contents('http://www.asu.edu/asuthemes/4.3/headers/default.shtml'); ?>
			<?php
				$search_option = jrnopswp_s_options( 'header_search' );
				if (!$search_option == 1):
					$asu_header = preg_replace('#<div id="asu_search">.*?</div>#is', ' ', $asu_header);
					$asu_header = preg_replace('#<div id="main-search" class="main-search [^"]*">.*?</div>#is', ' ', $asu_header);
					$asu_header = preg_replace('#<div class="f-search" [^>]*>.*?</div>#is', ' ', $asu_header);
				endif;
			?>
			<?php
				echo $asu_header;
			?><!-- ASU Header -->
		</div><!-- .asu_header -->

		<div class="site-branding">
			<div id="site-name-desktop" class="section site-name-desktop">
			  <div class="container">
				<h1 class="site-title" id="asu_school_name">
				  <?php
					// Print the parent organization and its link
					// Do we have a parent org?
					$org_option = jrnopswp_s_options( 'org' );
				  if ( $org_option &&
						   $org_option !== '' ) {
					  $prefix   = '<span class="first-word">%1$s</span>&nbsp;|&nbsp;';
					  // Does the parent org have a link?
					  $org_link_option = jrnopswp_s_options( 'org_link' );
					if ( $org_link_option &&
						   $org_link_option !== '' ) {
						$wrapper = '<a href="%1$s" id="org-link-site-title">%2$s</a>';

						$wrapper = sprintf( $wrapper, esc_html( $org_link_option ), '%1$s' );
						$prefix  = sprintf( $prefix, $wrapper );
					}

					echo wp_kses( sprintf( $prefix, esc_html( $org_option ) ), wp_kses_allowed_html( 'post' ) );
				  }
				  ?>
				  <a href="<?php echo esc_url( home_url() ); ?>" id="blog-name-site-title"><?php bloginfo( 'name' ); ?></a>
				</h1>
			  </div>
			</div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Primary Menu', 'jrnopswp' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
