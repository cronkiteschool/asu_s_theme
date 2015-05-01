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
			<div class="campus-info">

<?php
				$selected = asu_get_campus_address();
				echo $selected;

?>
			</div><!-- .campus-info -->
			<?php echo file_get_contents('http://www.asu.edu/asuthemes/4.3/includes/footer.shtml'); ?><!-- ASU Footer -->
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
