<?php
/**
 * asu_s Theme Meta Boxes
 *
 * @package asu_s
 * 
 */

/**
 * Adds a meta box to the post editing screen for sidebar layout
 */
function asu_s_custom_meta() {
	// Validate Vars
	if( isset($wp_query->query['post_type']) ) {
		$post_types = get_post_types( array( 'public' => true ) ); 
	} else {
		return;
	}

	foreach ( $post_types as $post_type ) {
		if ( 'attachment' == $postType ) {
			continue;
		}
		add_meta_box(
			'asu_s_sidebar_layout_meta',
			esc_html__( 'Main Sidebar Position', 'asu_s' ),
			'asu_s_sidebar_callback',
			$post_type,
			'side'
		);
		add_meta_box(
			'asu_s_hero_text_meta',
			esc_html__( 'Hero Image Text', 'asu_s' ),
			'asu_s_hero_text_callback',
			$post_type,
			'advanced'
		);
   /*     add_meta_box(*/
			//'asu_s_hero_image_meta',
			//esc_html__( 'Featured Image', 'asu_s' ),
			//'asu_s_hero_callback',
			//$post_type,
			//'side'
		/*);*/
	}
}
add_action( 'add_meta_boxes', 'asu_s_custom_meta' );

/**
 * Outputs the content of the meta box
 */
function asu_s_sidebar_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'asu_s_nonce' );
	$asu_s_stored_meta = get_post_meta( $post->ID );
	$layout_schemes = asu_s_get_layout_scheme_choices();
 
	echo '<p>';
    echo '<div class="asu_s-row-content">';

	foreach ($layout_schemes as $key => $lable)
	{
		echo '<label for="meta-sidebar-', $key, '">';
		echo '<input type="radio" name="meta-sidebar" id="meta-sidebar-', $key, '" value=', $key;
		if ( isset ( $asu_s_stored_meta['meta-sidebar'] ) ) echo checked( $asu_s_stored_meta['meta-sidebar'][0], "$key" );
		if ( asu_s_options( 'sidebar_layout', 'default' ) != "default" ) echo ' disabled="true" ';
		echo '>';
            echo esc_html__( $lable, 'asu_s' );
		echo '</label>';
		echo '<br>';
	}

    echo '</div>';
	echo '</p>';
}

function asu_s_hero_text_callback( $post ) {
	echo '<p>';
	echo '<label for="meta-textarea" class="prfx-row-title">' . _e( 'Hero Text Input', 'asu_s' ) . '</label>';
	echo '<textarea name="meta-textarea" id="meta-textarea">';
	if ( isset ( $asu_s_stored_meta['meta-hero-textarea'] ) ) echo $asu_s_stored_meta['hero-meta-textarea'][0];
	echo '</textarea>';
	echo '</p>';
}
/*function asu_s_hero_callback( $post ) {*/
	//wp_nonce_field( basename( __FILE__ ), 'asu_s_nonce' );
	//$asu_s_stored_meta = get_post_meta( $post->ID );
	//$layout_schemes = asu_s_get_layout_scheme_choices();
 
	//echo '<p>';
    //echo '<label for="meta-hero-image" class="prfx-row-title">' . esc_html__( 'Image Upload', 'asu_s' ) . '</label>';
	//echo '<input type="text" name="meta-hero-image" id="meta-hero-image" value="';
	//if ( isset ( $prfx_stored_meta['meta-hero-image'] ) ) echo $prfx_stored_meta['meta-hero-image'][0];
	//echo '" />';
    //echo '<input type="button" id="meta-hero-image-button" class="button" value="' . esc_attr__( 'Choose or Upload an Image', 'asu_s' ) . '" />';
	//echo '</p>';
/*}*/

/**
 * Loads the image management javascript
 */
/*function prfx_image_enqueue() {*/
    //global $typenow;
    //if( $typenow == 'post' ) {
        //wp_enqueue_media();
 
        //// Registers and enqueues the required javascript.
        //wp_register_script( 'meta-box-image', get_template_directory_uri() . '/js/meta-box-image.js', array( 'jquery' ) );
        //wp_localize_script( 'meta-box-image', 'meta_image',
            //array(
                //'title' => esc_html__( 'Choose or Upload an Image', 'asu_s' ),
                //'button' => esc_html__( 'Use this image', 'asu_s' ),
            //)
        //);
        //wp_enqueue_script( 'meta-box-image' );
    //}
//}
/*add_action( 'admin_enqueue_scripts', 'prfx_image_enqueue' );*/

/**
 * Saves the custom meta input
 */
function asu_s_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'asu_s_nonce' ] ) && wp_verify_nonce( $_POST[ 'asu_s_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
	// Checks for input and saves if needed
	if( isset( $_POST[ 'meta-sidebar' ] ) ) {
    	update_post_meta( $post_id, 'meta-sidebar', $_POST[ 'meta-sidebar' ] );
		$layout_scheme = asu_s_get_layout_scheme( $_POST[ 'meta-sidebar' ] );

		$css = "/* Page Layout Scheme */\n";
		$css .= asu_s_array_to_css( $layout_scheme );
		if( !empty( $css ) )
    		update_post_meta( $post_id, 'meta-sidebar-css', $css );
	}
	// Checks for input and saves if needed
	if( isset( $_POST[ 'hero-meta-textarea' ] ) ) {
	    update_post_meta( $post_id, 'hero-meta-textarea', $_POST[ 'hero-meta-textarea' ] );
	}
	// Checks for input and saves if needed
   /* if( isset( $_POST[ 'meta-hero-image' ] ) ) {*/
		//update_post_meta( $post_id, 'meta-hero-image', $_POST[ 'meta-hero-image' ] );
	/*}*/
}
add_action( 'save_post', 'asu_s_meta_save' );
