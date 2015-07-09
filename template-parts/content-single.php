<?php
/**
 * @package asu_s
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php 
			asu_s_posted_on();
		?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'asu_s' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php 
			asu_s_entry_footer();
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php
	// check if the post has a Post Thumbnail assigned to it.
	if ( has_post_thumbnail() ) {
		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'hero-image', true);
		$thumb_url = $thumb_url_array[0];
		echo '<div id="hero" class="">';
			echo '<div id="hero-text-1" class="hero-text fixed-width"><h1>Hero Text 1</h1></div>';
			echo '<div id="hero-image" class="blur"></div>';
		echo '</div>';
		echo '<style id="asu_s-style-inline-css" type="text/css">';
		echo '#hero-image {';
		  echo "background-image:url($thumb_url);";
		echo '}';
		echo '</style>';
		echo '<script type="text/javascript">';
			echo '(function($) {';
				echo '$("#hero").insertBefore( $("#content") );';
				echo '$(window).load(function() {';
			    	echo '$("#hero-image").addClass("bg");';
			    	echo '$("#hero").addClass("bg");';
				echo '});';
			echo '})(jQuery);';
		echo '</script>';
	} 
	?>
