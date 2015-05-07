<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package jrnopswp
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="contact-info">
<?php
            //  =============================
            //  = Logo                      =
            //  =============================
            // Do we have a logo?
			$logo_option = jrnopswp_s_options( 'logo' );
            if ( $logo_option && $logo_option !== '' ) {
              $logo = '<img class="footer-logo" src="%1$s" alt="%2$s"/><br/>';
              echo wp_kses( sprintf( $logo, $logo_option, get_bloginfo( 'name' ) . ' Logo' ), wp_kses_allowed_html( 'post' ) );
            } else {
              echo '<h2>' .wp_kses( get_bloginfo( 'description' ), wp_kses_allowed_html( 'post' ) ) . '</h2>';
            }
?>
<?php
            //  =============================
            //  = Campus Address            =
            //  =============================
            // Do we have an address?
				$campus_address_option = asu_get_campus_address();
				if ( $campus_address_option && $campus_address_option !== '' ) {
					echo '<address>';
					echo wp_kses( nl2br( $campus_address_option ), wp_kses_allowed_html( 'post' ) );
					echo '</address><br/>';
				}
?>
			<address>
			<?php
		      //  =============================
              //  = School Address            =
              //  =============================
              // Do we have an address?
				$address_option = jrnopswp_s_options( 'address' );
				if ( $address_option && $address_option !== '' ) {
					echo wp_kses( nl2br( $address_option ), wp_kses_allowed_html( 'post' ) );
				}
			?><br/>	
			<?php
              //  =============================
              //  = Phone                     =
              //  =============================
				// Do we have a phone number?
				$phone_option = jrnopswp_s_options( 'phone' );
				if ( $phone_option && $phone_option !== '' ) {
					$phone = 'Phone: <a class="phone-link" href="tel:%1$s" id="phone-link-in-footer">%1$s</a><br/>';
					echo wp_kses( sprintf( $phone, $phone_option ), wp_kses_allowed_html( 'post' ) );
				}
			?>
			<?php
              //  =============================
              //  = Fax                       =
              //  =============================
				// Do we have a fax number?
				$fax_option = jrnopswp_s_options( 'fax' );
				if ( $fax_option && $fax_option !== '' ) {
					$fax = 'Fax: %1$s<br/>';
					echo wp_kses( sprintf( $fax, $fax_option ), wp_kses_allowed_html( 'post' ) );
				}
			?>
			</address>
				<?php
				//  =============================
				//  = Contact Us Email or URL   =
				//  =============================

				  // Do we have a contact?
				  $contact_option = jrnopswp_s_options( 'contact' );
				if ( $contact_option &&
					  $contact_option !== '' ) {
				  $contactURL = '<p><a class="contact-link" href="%1$s%2$s%3$s" id="contact-us-link-in-footer">Contact Us</a></p>';
				  $type       = '';
				  $contact    = $contact_option;
				  $additional = '';

				  if ( filter_var( $contact, FILTER_VALIDATE_EMAIL ) ) {
					$type = 'mailto:';

					//  =============================
					//  = Contact Us Email Subject  =
					//  =============================

					// Do we have a subject line?
					if ( $contact_subject_option &&
						 $contact_subject_option !== '' ) {
					  $contact_subject_option = jrnopswp_s_options( 'contact_subject' );
					  $additional .= '&subject=' . rawurlencode( $contact_subject_option );
					}

					//  =============================
					//  = Contact Us Email Body     =
					//  =============================

					// Do we have a body?
					if ( $contact_body_option &&
						 $contact_body_option !== '' ) {
					  $contact_body_option = jrnopswp_s_options( 'contact_body' );
					  $additional .= '&body=' . rawurlencode( $contact_body_option );
					}

					// Fix the additional part
					if ( strlen( $additional ) > 0 ) {
					  $additional = substr_replace( $additional, '?', 0, 1 );
					}
				  }

				  echo wp_kses( sprintf( $contactURL, $type, $contact, $additional ), wp_kses_allowed_html( 'post' ) );
				}

				?>
				<ul class="social-media">
				  <?php
				  //  =============================
				  //  = Facebook                  =
				  //  =============================

				  // Do we have a facebook?
				  $facebook_option = jrnopswp_s_options( 'facebook' );
				  if ( $facebook_option &&
						 $facebook_option !== '' ) {
					$fb = '<li><a href="%1$s" title="Facebook" id="facebook-link-in-footer"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>';
					echo wp_kses( sprintf( $fb, $facebook_option ), wp_kses_allowed_html( 'post' ) );
				  }
				  ?>
				  <?php
				  //  =============================
				  //  = Twitter                   =
				  //  =============================

				  // Do we have a twitter?
				  $twitter_option = jrnopswp_s_options( 'twitter' );
				  if ( $twitter_option &&
						 $twitter_option !== '' ) {
					$twitter = '<li><a href="%1$s" title="Twitter" id="twitter-link-in-footer"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>';
					echo wp_kses( sprintf( $twitter, $twitter_option ), wp_kses_allowed_html( 'post' ) );
				  }
				  ?>
				  <?php
				  //  =============================
				  //  = Google+                   =
				  //  =============================

				  // Do we have a google+?
				  $google_plus_option = jrnopswp_s_options( 'google_plus' );
				  if ( $google_plus_option &&
						 $google_plus_option !== '' ) {
					$googlePlus = '<li><a href="%1$s" title="Google+" id="google_plus-link-in-footer"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>';
					echo wp_kses( sprintf( $googlePlus, $google_plus_option ), wp_kses_allowed_html( 'post' ) );
				  }

				  //  =============================
				  //  = LinkedIn                  =
				  //  =============================

				  // Do we have a linkedin?
				  $linkedin_option = jrnopswp_s_options( 'linkedin' );
				  if ( $linkedin_option &&
						 $linkedin_option !== '' ) {
					$linkedIn = '<li><a href="%1$s" title="LinkedIn" id="linkedin-link-in-footer"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>';
					echo wp_kses( sprintf( $linkedIn, $linkedin_option ), wp_kses_allowed_html( 'post' ) );
				  }

				  //  =============================
				  //  = Youtube                   =
				  //  =============================

				  // Do we have a youtube?
				  $youtube_option = jrnopswp_s_options( 'youtube' );
				  if ( $youtube_option &&
						 $youtube_option !== '' ) {
					$youtube = '<li><a href="%1$s" title="Youtube" id="youtube-link-in-footer"><i class="fa fa-youtube-square" aria-hidden="true"></i></a></li>';
					echo wp_kses( sprintf( $youtube, $youtube_option ), wp_kses_allowed_html( 'post' ) );
				  }

				  //  =============================
				  //  = Vimeo                     =
				  //  =============================

				  // Do we have a vimeo?
				  $vimeo_option = jrnopswp_s_options( 'vimeo' );
				  if ( $vimeo_option &&
						 $vimeo_option !== '' ) {
					$vimeo = '<li><a href="%1$s" title="Vimeo" id="vimeo-link-in-footer"><i class="fa fa-vimeo-square" aria-hidden="true"></i></a></li>';
					echo wp_kses( sprintf( $vimeo, $vimeo_option ), wp_kses_allowed_html( 'post' ) );
				  }

				  //  =============================
				  //  = Instagram                 =
				  //  =============================

				  // Do we have a instagram?
				  $instagram_option = jrnopswp_s_options( 'instagram' );
				  if ( $instagram_option &&
						 $instagram_option !== '' ) {
					$instagram = '<li><a href="%1$s" title="Instagram" id="instagram-link-in-footer"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
					echo wp_kses( sprintf( $instagram, $instagram_option ), wp_kses_allowed_html( 'post' ) );
				  }

				  //  =============================
				  //  = RSS                       =
				  //  =============================

				  // Do we have a instagram?
				  $rss_option = jrnopswp_s_options( 'rss' );
				  if ( $rss_option &&
						 $rss_option !== '' ) {
					$rss = '<li><a href="%1$s" title="RSS"  id="rss-link-in-footer"><i class="fa fa-rss" aria-hidden="true"></i></a></li>';
					echo wp_kses( sprintf( $rss, $rss_option ), wp_kses_allowed_html( 'post' ) );
				  }
				  ?>
				</ul>
				<?php
				//  =============================
				//  = Contribute URL            =
				//  =============================

				// Do we have a contribute?
				$contribute_option = jrnopswp_s_options( 'contribute' );
				if ( $contribute_option &&
					   $contribute_option !== '' ) {
				  $contribute = '<a type="button" class="btn btn-primary" href="%s"  id="contribute-button-in-footer">Contribute</a>';
				  echo wp_kses( sprintf( $contribute, $contribute_option ), wp_kses_allowed_html( 'post' ) );
				}
				?>
			</div><!-- /.contact-info -->
			
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'secondary',
						'menu_id' => 'secondary-menu',
					)
				);
			?>
		</div><!-- .site-info -->
		<div class="asu-info">
			<?php echo file_get_contents('http://www.asu.edu/asuthemes/4.3/includes/footer.shtml'); ?><!-- ASU Footer -->
		</div><!-- /.asu-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
