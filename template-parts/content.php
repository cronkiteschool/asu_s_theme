<?php
/**
 * @package asu_s
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	// check if the post has a Post Thumbnail assigned to it.
	if ( has_post_thumbnail() ) {
		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'hero-image', true);
		$thumb_url = $thumb_url_array[0];
		echo '<div id="hero" class="">';
			echo '<div id="hero-text-1" class="hero-text">Hero Text 1</div>';
			echo '<div id="hero-image" class="blur"></div>';
		echo '</div>';
		echo '<style id="asu_s-style-inline-css" type="text/css">';
		echo '#hero-image {';
		  echo "background-image:url($thumb_url);";
		echo '}';
		echo '</style>';
		echo '<script type="text/javascript">';
			echo '(function($) {';
				echo '$(window).load(function() {';
			    	echo '$("#hero-image").addClass("bg");';
			    	echo '$("#hero").addClass("bg");';
				echo '});';
			echo '})(jQuery);';
		echo '</script>';
	} 
	?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php 
			if ( 'post' == get_post_type() ) :
				asu_s_posted_on();
			endif;
		?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				esc_html__( 'Continue reading %s ', 'asu_s' ) . '<span class="meta-nav"><i class="fa fa-caret-right"></i></span>',
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

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