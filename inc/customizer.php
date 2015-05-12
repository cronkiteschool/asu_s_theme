<?php
/**
 * asu_s Theme Customizer
 *
 * @package asu_s
 * 
 * I've used the following sources as insperation for these functions.
 * - https://github.com/gios-asu/ASU-Web-Standards-Wordpress-Theme/blob/master/inc/customizer.php
 * - https://themes.svn.wordpress.org/twentyfifteen/1.2/inc/customizer.php
 */

/**
 * Custom theme manager.  Special settings for the theme
 * get defined here.
 */
function asu_s_customize_register( $wp_customize ) {

  //  =============================
  //  =============================
  //  = School Info Section       =
  //  =============================
  //  =============================
  $wp_customize->add_section(
      'asu_s_section_info' ,
      array(
        'title'      => __( 'School Information','asu_s' ),
        'priority'   => 30,
      )
  );
  //  =============================
  //  = School Logo               =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[logo]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_logo_text',
      array(
        'label'      => __( 'School Logo Full URL', 'asu_s' ),
        'section'    => 'asu_s_section_info',
        'settings'   => 'asu_s_options[logo]',
        'priority'   => 0,
      )
  );
  //  =============================
  //  = Organization Text         =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[org]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
      )
  );
  $wp_customize->add_control(
      'asu_s_org_text',
      array(
        'label'      => __( 'Parent Organization', 'asu_s' ),
        'section'    => 'asu_s_section_info',
        'settings'   => 'asu_s_options[org]',
        'priority'   => 1,
      )
  );
  //  =============================
  //  = Organization Link         =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[org_link]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_org_link',
      array(
        'label'      => __( 'Parent Organization URL', 'asu_s' ),
        'section'    => 'asu_s_section_info',
        'settings'   => 'asu_s_options[org_link]',
        'priority'   => 10,
      )
  );
  //  =============================
  //  = Campus                    =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[campus_name]',
      array(
        'default'           => 'default',
		'sanitize_callback' => 'asu_sanitize_campus_choices',
// 		'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
      )
  );
  $wp_customize->add_control(
      'asu_campus_name',
      array(
        'settings'   => 'asu_s_options[campus_name]',
        'label'      => __( 'Select Campus Name', 'asu_s' ),
        'section'    => 'asu_s_section_info',
		'type'    => 'select',
		'choices'    => asu_get_campus_choices(),
		'priority' => 20,
	)
  );
  //  =============================
  //  = School Address            =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[address]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'asu_s_address',
      array(
        'label'      => __( 'School Address', 'asu_s' ),
        'section'    => 'asu_s_section_info',
        'settings'   => 'asu_s_options[address]',
        'type'       => 'textarea',
        'priority'   => 21,
      )
  );
  //  =============================
  //  = Phone                     =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[phone]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_phone',
      )
  );
  $wp_customize->add_control(
      'asu_s_phone',
      array(
        'label'      => __( 'Phone Number', 'asu_s' ),
        'section'    => 'asu_s_section_info',
        'settings'   => 'asu_s_options[phone]',
        'priority'   => 30,
      )
  );
  //  =============================
  //  = Fax                       =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[fax]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_phone',
      )
  );
  $wp_customize->add_control(
      'asu_s_fax',
      array(
        'label'      => __( 'Fax Number', 'asu_s' ),
        'section'    => 'asu_s_section_info',
        'settings'   => 'asu_s_options[fax]',
        'priority'   => 40,
      )
  );
  //  =============================
  //  = Contact Us Email or URL   =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[contact]',
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'asu_s_sanitize_email_or_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_contact',
      array(
        'label'      => __( 'Contact Us Email or URL', 'asu_s' ),
        'section'    => 'asu_s_section_info',
        'settings'   => 'asu_s_options[contact]',
        'priority'   => 50,
      )
  );
  //  =============================
  //  = Contact Us Email Subject  =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[contact_subject]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'sanitize_text_field',
      )
  );
  $wp_customize->add_control(
      'asu_s_contact_subject',
      array(
        'label'      => __( 'Contact Us Email Subject (Optional)', 'asu_s' ),
        'section'    => 'asu_s_section_info',
        'settings'   => 'asu_s_options[contact_subject]',
        'priority'   => 60,
      )
  );
  //  =============================
  //  = Contact Us Email Body     =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[contact_body]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'asu_s_contact_body',
      array(
        'label'    => __( 'Contact Us Email Body (Optional)', 'asu_s' ),
        'section'  => 'asu_s_section_info',
        'settings' => 'asu_s_options[contact_body]',
        'type'     => 'textarea',
        'priority' => 70,
      )
  );
  //  =============================
  //  = Contribute URL            =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[contribute]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_contribute',
      array(
        'label'      => __( 'Contribute URL (Optional)', 'asu_s' ),
        'section'    => 'asu_s_section_info',
        'settings'   => 'asu_s_options[contribute]',
        'priority'   => 80,
      )
  );
  //  =============================
  //  =============================
  //  = Social Media Section      =
  //  =============================
  //  =============================
  $wp_customize->add_section(
      'asu_s_section_social',
      array(
        'title'      => __( 'Social Media','asu_s' ),
        'priority'   => 31,
      )
  );
  //  =============================
  //  = Facebook                  =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[facebook]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_facebook',
      array(
        'label'      => __( 'Facebook URL', 'asu_s' ),
        'section'    => 'asu_s_section_social',
        'settings'   => 'asu_s_options[facebook]',
      )
  );
  //  =============================
  //  = Twitter                   =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[twitter]',
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_twitter',
      array(
        'label'      => __( 'Twitter URL', 'asu_s' ),
        'section'    => 'asu_s_section_social',
        'settings'   => 'asu_s_options[twitter]',
      )
  );
  //  =============================
  //  = Google+                   =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[google_plus]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_google_plus',
      array(
        'label'      => __( 'Google Plus URL', 'asu_s' ),
        'section'    => 'asu_s_section_social',
        'settings'   => 'asu_s_options[google_plus]',
      )
  );
  //  =============================
  //  = LinkedIn                  =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[linkedin]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_linkedin',
      array(
        'label'      => __( 'Linked In URL', 'asu_s' ),
        'section'    => 'asu_s_section_social',
        'settings'   => 'asu_s_options[linkedin]',
      )
  );
  //  =============================
  //  = Youtube                   =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[youtube]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_youtube',
      array(
        'label'      => __( 'Youtube URL', 'asu_s' ),
        'section'    => 'asu_s_section_social',
        'settings'   => 'asu_s_options[youtube]',
      )
  );
  //  =============================
  //  = Vimeo                     =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[vimeo]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_vimeo',
      array(
        'label'      => __( 'Vimeo URL', 'asu_s' ),
        'section'    => 'asu_s_section_social',
        'settings'   => 'asu_s_options[vimeo]',
      )
  );
  //  =============================
  //  = Instagram                 =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[instagram]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_instagram',
      array(
        'label'      => __( 'Instagram URL', 'asu_s' ),
        'section'    => 'asu_s_section_social',
        'settings'   => 'asu_s_options[instagram]',
      )
  );
  //  =============================
  //  = Fickr                     =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[flickr]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_flickr',
      array(
        'label'      => __( 'Flickr URL', 'asu_s' ),
        'section'    => 'asu_s_section_social',
        'settings'   => 'asu_s_options[flickr]',
      )
  );
  //  =============================
  //  = RSS                 =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[rss]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'asu_s_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'asu_s_rss',
      array(
        'label'      => __( 'RSS URL', 'asu_s' ),
        'section'    => 'asu_s_section_social',
        'settings'   => 'asu_s_options[rss]',
      )
  );
  //  =============================
  //  =============================
  //  = Search Options            =
  //  =============================
  //  =============================
  $wp_customize->add_section(
      'asu_s_section_search',
      array(
        'title'      => __( 'Search','asu_s' ),
        'priority'   => 40,
      )
  );
  //  =============================
  //  = ASU Google Search App     =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[header_search]',
      array(
        'default'           => '1',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
      )
  );
  $wp_customize->add_control(
      'asu_s_asu_gsa',
      array(
        'label'      => __( 'ASU Header Search Box', 'asu_s' ),
        'section'    => 'asu_s_section_search',
        'settings'   => 'asu_s_options[header_search]',
		'type'    => 'checkbox',
      )
  );
  //  =============================
  //  =============================
  //  = Layout options            =
  //  =============================
  //  =============================
  $wp_customize->add_section(
      'asu_s_section_layout',
      array(
        'title'      => __( 'Layout','asu_s' ),
        'priority'   => 40,
        'description' => __( "Allows you to edit your theme's layout.", 'narga' )
      )
  );
  //  =============================
  //  = Sidebar Layout        =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[sidebar_layout]',
      array(
        'default'           => 'default',
        'capability'        => 'edit_theme_options',
		'type'              => 'option',
		'sanitize_callback' => 'asu_s_sanitize_layout_scheme',
      )
  );
  $wp_customize->add_control(
      'asu_s_sidebar_layout',
      array(
        'label'      => __( 'Sidebar Layout', 'asu_s' ),
        'section'    => 'asu_s_section_layout',
        'settings'   => 'asu_s_options[sidebar_layout]',
		'type'    => 'radio',
		'choices'    => asu_s_get_layout_scheme_choices(),
      )
  );
  //  =============================
  //  = Fixed Width Layout        =
  //  =============================
  $wp_customize->add_setting(
      'asu_s_options[fixed_width]',
      array(
        'default'           => FALSE,
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
      )
  );
  $wp_customize->add_control(
      'asu_s_fixed_width',
      array(
        'label'      => __( 'Fixed Width Page Display', 'asu_s' ),
        'section'    => 'asu_s_section_layout',
        'settings'   => 'asu_s_options[fixed_width]',
		'type'    => 'checkbox',
      )
  );
  /**
   * Add postMessage support for site title and description for the Theme Customizer.
   *
   * @param WP_Customize_Manager $wp_customize Theme Customizer object.
  */

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'asu_s_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function asu_s_customize_preview_js() {
	wp_enqueue_script( 'asu_s_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'asu_s_customize_preview_js' );


/**
 * Returns the options array for asu_s
 */
function asu_s_options($name, $default = false) {
    $options = ( get_option( 'asu_s_options' ) ) ? get_option( 'asu_s_options' ) : null;
    // return the option if it exists
    if ( isset( $options[ $name ] ) ) {
        return apply_filters( 'asu_s_options$name', $options[ $name ] );
    }
    // return default if nothing else
    return apply_filters( 'asu_s_options_$name', $default );
}


/**
 * Sanitizer that does nothing
 */
function asu_s_sanitize_nothing( $data ) {
  return $data;
}
/**
 * Sanitizer that checks if the data is an url
 */
function asu_s_sanitize_url( $data ) {
  $protocols = array('http', 'https');
  return esc_url( $data, $protocols );
}
/**
 * Sanitizer that checks if the data is an email or url
 */
function asu_s_sanitize_email_or_url( $data ) {
  if (is_email( $data )) {
    // Matches email, return data.
    return sanitize_email( $data );
  } else {
	  return asu_s_sanitize_url( $data );
  }
}
/**
 * Sanitizer that checks if the data is a phone number
 */
function asu_s_sanitize_phone( $data ) {
  $reg = '/^[+]?([\d]{0,3})?[\(\.\-\s]?([\d]{3})[\)\.\-\s]*([\d]{3})[\.\-\s]?([\d]{4})$/';
  if (preg_match($reg, $data)) { 
    return $data;
  } else {
    return FALSE;
  }
}


/**
 * Register Campus Addresses for ASU Theme.
 *
 *
 * Can be filtered with {@see 'asu_campus_addresses'}.
 *
 * @since asu_s 1.0
 *
 * @return array An associative array of ASU campus options.
 */
function asu_get_campus_addresses() {
	return apply_filters( 'asu_campus_addresses', array(
		'default' => array(
			'label'  => __( '', 'asu_s' ),
			'address' => '',
		),
		'tempe' => array(
			'label'  => __( 'Tempe', 'asu_s' ),
			'address' => 'Arizona State University - Tempe campus<br/>1151 S. Forest Ave.<br/>Tempe, AZ 85287 USA',
		),
		'polytechnic' => array(
			'label'  => __( 'Polytechnic', 'asu_s' ),
			'address' => 'Arizona State University - Polytechnic campus<br/>Power Road and Williams Field Road<br/>7001 E. Williams Field Road<br/>Mesa, AZ 85212',
		),
		'downtown_phoenix' => array(
			'label'  => __( 'Downtown Phoenix', 'asu_s' ),
			'address' => 'Arizona State University - Downtown Phoenix<br/>411 N. Central, Suite 520<br/>Phoenix, AZ 85004',
		),
		'west' => array(
			'label'  => __( 'West', 'asu_s' ),
			'address' => 'Arizona State University - West campus<br/>4701 West Thunderbird Road<br/>PO Box 37100<br/>Phoenix, AZ 85069-7100',
		),
		'research_park' => array(
			'label'  => __( 'Research Park', 'asu_s' ),
			'address' => 'Arizona State University - Research Park<br/>8750 S Science Dr<br/>Tempe, AZ 85284',
		),
		'skysong' => array(
			'label'  => __( 'Skysong', 'asu_s' ),
			'address' => 'Arizona State University - SkySong<br/>1475 N. Scottsdale Rd, Suite 200<br/>Scottsdale, Arizona 85257-3538',
		),
		'lake_havasu' => array(
			'label'  => __( 'Lake Havasu', 'asu_s' ),
			'address' => 'Arizona State University - Lake Havasu<br/>100 University Way<br/>Lake Havasu City, AZ 86403',
		),
	) );
}

if ( ! function_exists( 'asu_get_campus_address' ) ) :
/**
 * Get the current ASU Campus Address.
 *
 * @since asu_s 1.0
 *
 * @return a string address of either the current or default campus selected.
 */
function asu_get_campus_address() {
	$asu_campus_option = asu_s_options( 'campus_name', $default = 'default' );
	$campus_addresses       = asu_get_campus_addresses();
	if ( array_key_exists( $asu_campus_option, $campus_addresses ) ) {
		return $campus_addresses[ $asu_campus_option ]['address'];
	}
	return $campus_addresses['default']['address'];
}
endif; // asu_get_campus_address

if ( ! function_exists( 'asu_get_campus_choices' ) ) :
/**
 * Returns an array of campus choices registered for ASU.
 *
 * @since asu_s 1.0
 *
 * @return array Array of ASU campuses.
 */
function asu_get_campus_choices() {
	$asu_campuses               = asu_get_campus_addresses();
	$asu_campus_control_options = array();
	foreach ( $asu_campuses as $asu_campus => $value ) {
		$asu_campus_control_options[ $asu_campus ] = $value['label'];
	}
	return $asu_campus_control_options;
}
endif; // asu_get_campus_choices

if ( ! function_exists( 'asu_sanitize_campus_choices' ) ) :
/**
 * Sanitization callback for ASU Campuses.
 *
 * @since asu_s 1.0
 *
 * @param string $value ASU campus name value.
 * @return string ASU campus name.
 */
function asu_sanitize_campus_choices( $value ) {
	$asu_campuses = asu_get_campus_choices();
	if ( ! array_key_exists( $value, $asu_campuses ) ) {
		$value = 'default';
	}
	return $value;
}
endif;


/**
 * Register layout schemes for ASU _s theme.
 *
 * Can be filtered with {@see 'asu_s_layout_schemes'}.
 *
 * @since asu_s 1.0
 *
 * @return array An associative array of layout scheme options.
 */
function asu_s_get_layout_schemes() {
	return apply_filters( 'asu_s_layout_schemes', array(
		'default' => array(
			'label'  => __( 'None', 'asu_s' ),
			'css' => array(),
		),
		'content_sidebar'  => array(
			'label'  => __( 'content-sidebar', 'asu_s' ),
			'css' => array(
				'.content-area' => array(
					'float' => 'left',
					'margin' => '0 -25% 0 0',
					'width' => '100%',
				),
				'.site-main' => array(
					'margin' => '0 25% 0 0',
				),
				'.site-content .widget-area' => array(
					'float' => 'right',
					'overflow' => 'hidden',
					'width' => '25%',
				),
				'.site-footer' => array(
					'clear' => 'both',
					'width' => '100%',
				),
			),
		),
		'sidebar_content'    => array(
			'label'  => __( 'sidebar-content', 'asu_s' ),
			'css' => array(
				'.content-area' => array(
					'float' => 'right',
					'margin' => '0 0 0 -25%',
					'width' => '100%',
				),
				'.site-main' => array(
					'margin' => '0 0 0 25%',
				),
				'.site-content .widget-area' => array(
					'float' => 'left',
					'overflow' => 'hidden',
					'width' => '25%',
				),
				'.site-footer' => array(
					'clear' => 'both',
					'width' => '100%',
				),
			),
		),
	) );
}
if ( ! function_exists( 'asu_s_get_layout_scheme' ) ) :
/**
 * Get the current asu_s layout scheme.
 *
 * @since asu_s 1.0
 *
 * @return array An associative array of either the current or default layout scheme css values.
 */
function asu_s_get_layout_scheme() {
	$layout_scheme_option = asu_s_options( 'sidebar_layout' );
	$layout_schemes       = asu_s_get_layout_schemes();

	if ( array_key_exists( $layout_scheme_option, $layout_schemes ) ) {
		return $layout_schemes[ $layout_scheme_option ]['css'];
	}

	return $layout_schemes['default']['css'];
}
endif; // asu_s_get_layout_scheme
if ( ! function_exists( 'asu_s_get_layout_scheme_choices' ) ) :
/**
 * Returns an array of layout scheme choices registered for asu_s.
 *
 * @since asu_s 1.0
 *
 * @return array Array of layout schemes.
 */
function asu_s_get_layout_scheme_choices() {
	$layout_schemes                = asu_s_get_layout_schemes();
	$layout_scheme_control_options = array();

	foreach ( $layout_schemes as $layout_scheme => $value ) {
		$layout_scheme_control_options[ $layout_scheme ] = $value['label'];
	}

	return $layout_scheme_control_options;
}
endif; // asu_s_get_layout_scheme_choices
if ( ! function_exists( 'asu_s_sanitize_layout_scheme' ) ) :
/**
 * Sanitization callback for layout schemes.
 *
 * @since asu_s 1.0
 *
 * @param string $value Layout scheme name value.
 * @return string Layout scheme name.
 */
function asu_s_sanitize_layout_scheme( $value ) {
	$layout_schemes = asu_s_get_layout_scheme_choices();

	if ( ! array_key_exists( $value, $layout_schemes ) ) {
		$value = 'default';
	}

	return $value;
}
endif; // asu_s_sanitize_layout_scheme
/**
 * Returns CSS for the layout schemes.
 *
 * @since asu_s 1.0
 *
 * @param array $layouts Layout scheme layouts.
 * @return string Layout scheme CSS.
 */
function asu_s_get_layout_scheme_css( $layout ) {
	$layout = wp_parse_args( $layout, array() );

	$css[] = "/* Layout Scheme */";
	
	foreach ($layout as $selector => $css_properties) {
	  if( empty($css_properties) ) { continue; }
	  $css[] = "$selector {";
	  foreach ($css_properties as $property => $value) {
	    $css[] = "  $property: $value;";
	  }
	$css[] = '}';
	}
	$css[] = "\n";
	return  join("\n",$css);
}
// asu_s_fixed_width
/**
 * Output custom CSS for fixed width layout
 * @package asu_s
 */
function asu_s_fixed_width() {
	$css = array();
	$fixed_width_option = asu_s_options( 'fixed_width' );
	if ( $fixed_width_option == 1 ) {
		$css['.site'] = array(
			'margin' => '0 auto',
			'max-width' => '980px',
		);
	}
	if( !empty( $css ) )
		return $css;
}

/**
 * Enqueues front-end CSS for layout scheme.
 *
 * @since asu_s 1.0
 *
 * @see wp_add_inline_style()
 */
function asu_s_customize_css() {
	$layout_scheme = asu_s_get_layout_scheme();
	$fixed_width = asu_s_fixed_width();
	$custom_layout = array_merge($layout_scheme, $fixed_width);

	$css = asu_s_get_layout_scheme_css( $custom_layout );
	if( !empty( $css ) )
		wp_add_inline_style( 'asu_s-style', $css );

}
add_action( 'wp_enqueue_scripts', 'asu_s_customize_css' );
