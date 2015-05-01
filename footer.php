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
			<div class="big-foot">
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
			</div><!-- /.big-foot -->

			<div class="little-foot">
				<?php echo file_get_contents('http://www.asu.edu/asuthemes/4.3/includes/footer.shtml'); ?><!-- ASU Footer -->
			</div><!-- /.little-foot -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
