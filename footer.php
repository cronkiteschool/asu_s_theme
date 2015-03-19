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
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'jrnopswp' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'jrnopswp' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'jrnopswp' ), 'jrnopswp', '<a href="http://automattic.com/" rel="designer">Automattic</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php echo file_get_contents('http://www.asu.edu/asuthemes/4.3/includes/footer.shtml'); ?><!-- ASU Footer -->
<?php wp_footer(); ?>
</body>
</html>
