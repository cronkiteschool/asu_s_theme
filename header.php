<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package asu_s
 */

$home_url = esc_url( home_url( '/' ) );
$blog_title = get_bloginfo();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php echo file_get_contents('http://www.asu.edu/asuthemes/4.3/heads/default.shtml'); ?><!-- ASU Header -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php echo file_get_contents('http://www.asu.edu/asuthemes/4.3/includes/gtm.shtml'); ?><!-- ASU Google Tag Manager -->


<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'asu' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div id="asu_header">
			<?php echo  file_get_contents('http://www.asu.edu/asuthemes/4.3/headers/default.shtml'); ?>
		<!-- .asu_header -->

		<div class="site-branding">
			<div id="site-name-screen" class="section site-name-screen">
				<h1 class="site-title" id="asu_school_name">
				  <?php
					// Print the parent organization and its link
					// Do we have a parent org?
					$org_option = asu_s_options( 'org' );
				  if ( $org_option &&
						   $org_option !== '' ) {
					  $prefix   = '<span class="first-word">%1$s</span>&nbsp;|&nbsp;';
					  // Does the parent org have a link?
					  $org_link_option = asu_s_options( 'org_link' );
					if ( $org_link_option &&
						   $org_link_option !== '' ) {
						$wrapper = '<a href="%1$s" id="org-link-site-title">%2$s</a>';

						$wrapper = sprintf( $wrapper, esc_html( $org_link_option ), '%1$s' );
						$prefix  = sprintf( $prefix, $wrapper );
					}

					echo wp_kses( sprintf( $prefix, esc_html( $org_option ) ), wp_kses_allowed_html( 'post' ) );
				  }
				  ?>
				  <a href="<?php echo $home_url; ?>" id="blog-name-site-title"><?php echo $blog_title; ?></a>
				</h1>
			</div>
		</div><!-- .site-branding -->

		<div id="navigation">
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					$wrapper  = '';
					if ( asu_s_options( 'mobile_toggle_search' ) == 1 ) {
						$wrapper .= "<form id=\"search-handheld\" role=\"search\" action=\"$home_url\" method=\"get\">";
						$wrapper .= '<div id="label-handheld"><label for="search-terms-handheld" id="search-label-handheld" role=button><i id="search-icon-handheld" class="fa fa-search"></i></label></div>';
						$wrapper .= '<div id="input-handheld"><input type="text" name="s" id="search-terms-handheld" placeholder="Search for..."></div>';
						$wrapper .= '</form>';
					}
					$wrapper .= "<a href=\"$home_url\" id=\"site-name-handheld\" class=\"site-name-handheld\">$blog_title</a>";
					$wrapper .= '<ul id="%1$s" class="%2$s">';
					$wrapper .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children">';
					$wrapper .= "<a href=\"$home_url\" title=\"Home\"  id=\"home-icon-main-nav\">";
					$wrapper .= '<span class="fa fa-home fa-fw menu-home-icon" aria-hidden="true"></span><span class="menu-home-text">Home</span>';
					$wrapper .= '</a>';
					$wrapper .= '</li>';
					$wrapper .= '%3$s';
					$wrapper .= '</ul>';

					wp_nav_menu( array(
						'theme_location' => 'primary',
						'menu_id' => 'primary-menu',
						'container' => false,
						'items_wrap' => $wrapper,
					));
				?>
			</nav><!-- #site-navigation -->
		</div><!-- #navigation -->
	</header><!-- #masthead -->

<script type="text/javascript">
	ASUHeader.site_menu = ASUHeader.site_menu || {};
	ASUHeader.site_menu.site_name = '<?php echo $blog_title; ?>';
	var asusearchbox = '<?php echo asu_s_options( 'header_search' ); ?>';
	var home_url = '<?php echo home_url( '/' ); ?>';
	var navMenu = '<?php echo sanitize_text_field(json_wp_nav_menu_array("primary", "primary-menu")); ?>';
	if (navMenu && navMenu != '') {
		ASUHeader.site_menu.json = navMenu;
	}
	<?php
		if ( asu_s_options( 'header_wp_login' ) == 1 ) {
			echo "ASUHeader.signin_url = \"" . wp_login_url() . "\";\n";
			echo "ASUHeader.signout_url = \"" . wp_logout_url( get_permalink() ) . "\";\n";

			if ( is_user_logged_in() == 1 ) {
				global $current_user;
				get_currentuserinfo();
				echo "ASUHeader.user_signedin = true;\n";
				echo "ASUHeader.user_displayname = '$current_user->display_name';\n";
			}
		}
	?>
</script>
	<div id="content" class="site-content">
