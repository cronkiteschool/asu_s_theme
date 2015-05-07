<?php
/**
 * asu_s Theme Customizer
 *
 * @package asu_s
 */

/**
 * Custom theme manager.  Special settings for the theme
 * get defined here.
 */
function wordpress_jrnops_customize_register( $wp_customize ) {
  //  =============================
  //  =============================
  //  = School Info Section       =
  //  =============================
  //  =============================
  $wp_customize->add_section(
      'wordpress_jrnops_theme_section' ,
      array(
        'title'      => __( 'School Information','asu_wordpress' ),
        'priority'   => 30,
      )
  );
  //  =============================
  //  = School Logo               =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[logo]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_logo_text',
      array(
        'label'      => __( 'School Logo Full URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section',
        'settings'   => 'wordpress_jrnops_theme_options[logo]',
        'priority'   => 0,
      )
  );
  //  =============================
  //  = Organization Text         =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[org]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_org_text',
      array(
        'label'      => __( 'Parent Organization', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section',
        'settings'   => 'wordpress_jrnops_theme_options[org]',
        'priority'   => 1,
      )
  );
  //  =============================
  //  = Organization Link         =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[org_link]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_org_link',
      array(
        'label'      => __( 'Parent Organization URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section',
        'settings'   => 'wordpress_jrnops_theme_options[org_link]',
        'priority'   => 10,
      )
  );
  //  =============================
  //  = Campus                    =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[campus_name]',
      array(
        'default'           => 'default',
		'sanitize_callback' => 'asu_sanitize_campus_choices',
		'transport'         => 'postMessage',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
      )
  );
  $wp_customize->add_control(
      'asu_campus_name',
      array(
        'settings'   => 'wordpress_jrnops_theme_options[campus_name]',
        'label'      => __( 'Select Campus Name', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section',
		'type'    => 'select',
		'choices'    => asu_get_campus_choices(),
		'priority' => 20,
	)
  );
  //  =============================
  //  = School Address            =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[address]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_address',
      array(
        'label'      => __( 'School Address', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section',
        'settings'   => 'wordpress_jrnops_theme_options[address]',
        'type'       => 'textarea',
        'priority'   => 21,
      )
  );
  //  =============================
  //  = Phone                     =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[phone]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_phone',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_phone',
      array(
        'label'      => __( 'Phone Number', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section',
        'settings'   => 'wordpress_jrnops_theme_options[phone]',
        'priority'   => 30,
      )
  );
  //  =============================
  //  = Fax                       =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[fax]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_phone',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_fax',
      array(
        'label'      => __( 'Fax Number', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section',
        'settings'   => 'wordpress_jrnops_theme_options[fax]',
        'priority'   => 40,
      )
  );
  //  =============================
  //  = Contact Us Email or URL   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[contact]',
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_email_or_url',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_contact',
      array(
        'label'      => __( 'Contact Us Email or URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section',
        'settings'   => 'wordpress_jrnops_theme_options[contact]',
        'priority'   => 50,
      )
  );
  //  =============================
  //  = Contact Us Email Subject  =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[contact_subject]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_contact_subject',
      array(
        'label'      => __( 'Contact Us Email Subject (Optional)', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section',
        'settings'   => 'wordpress_jrnops_theme_options[contact_subject]',
        'priority'   => 60,
      )
  );
  //  =============================
  //  = Contact Us Email Body     =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[contact_body]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_contact_body',
      array(
        'label'    => __( 'Contact Us Email Body (Optional)', 'asu_wordpress' ),
        'section'  => 'wordpress_jrnops_theme_section',
        'settings' => 'wordpress_jrnops_theme_options[contact_body]',
        'type'     => 'textarea',
        'priority' => 70,
      )
  );
  //  =============================
  //  = Contribute URL            =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[contribute]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_url',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_contribute',
      array(
        'label'      => __( 'Contribute URL (Optional)', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section',
        'settings'   => 'wordpress_jrnops_theme_options[contribute]',
        'priority'   => 80,
      )
  );
  //  =============================
  //  =============================
  //  = Social Media Section      =
  //  =============================
  //  =============================
  $wp_customize->add_section(
      'wordpress_jrnops_theme_section_social',
      array(
        'title'      => __( 'Social Media','asu_wordpress' ),
        'priority'   => 31,
      )
  );
  //  =============================
  //  = Facebook                  =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[facebook]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_facebook',
      array(
        'label'      => __( 'Facebook URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section_social',
        'settings'   => 'wordpress_jrnops_theme_options[facebook]',
      )
  );
  //  =============================
  //  = Twitter                   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[twitter]',
      array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_twitter',
      array(
        'label'      => __( 'Twitter URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section_social',
        'settings'   => 'wordpress_jrnops_theme_options[twitter]',
      )
  );
  //  =============================
  //  = Google+                   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[google_plus]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_google_plus',
      array(
        'label'      => __( 'Google Plus URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section_social',
        'settings'   => 'wordpress_jrnops_theme_options[google_plus]',
      )
  );
  //  =============================
  //  = LinkedIn                  =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[linkedin]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_linkedin',
      array(
        'label'      => __( 'Linked In URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section_social',
        'settings'   => 'wordpress_jrnops_theme_options[linkedin]',
      )
  );
  //  =============================
  //  = Youtube                   =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[youtube]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_youtube',
      array(
        'label'      => __( 'Youtube URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section_social',
        'settings'   => 'wordpress_jrnops_theme_options[youtube]',
      )
  );
  //  =============================
  //  = Vimeo                     =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[vimeo]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_vimeo',
      array(
        'label'      => __( 'Vimeo URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section_social',
        'settings'   => 'wordpress_jrnops_theme_options[vimeo]',
      )
  );
  //  =============================
  //  = Instagram                 =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[instagram]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_instagram',
      array(
        'label'      => __( 'Instagram URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section_social',
        'settings'   => 'wordpress_jrnops_theme_options[instagram]',
      )
  );
  //  =============================
  //  = Fickr                     =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[flickr]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_flickr',
      array(
        'label'      => __( 'Flickr URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section_social',
        'settings'   => 'wordpress_jrnops_theme_options[flickr]',
      )
  );
  //  =============================
  //  = RSS                 =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[rss]',
      array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
        'sanitize_callback' => 'wordpress_jrnops_sanitize_nothing',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_rss',
      array(
        'label'      => __( 'RSS URL', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section_social',
        'settings'   => 'wordpress_jrnops_theme_options[rss]',
      )
  );
  //  =============================
  //  =============================
  //  = Search Options            =
  //  =============================
  //  =============================
  $wp_customize->add_section(
      'wordpress_jrnops_theme_section_search',
      array(
        'title'      => __( 'Search','asu_wordpress' ),
        'priority'   => 40,
      )
  );
  //  =============================
  //  = ASU Google Search App     =
  //  =============================
  $wp_customize->add_setting(
      'wordpress_jrnops_theme_options[header_search]',
      array(
        'default'           => '1',
        'capability'        => 'edit_theme_options',
        'type'              => 'option',
      )
  );
  $wp_customize->add_control(
      'wordpress_jrnops_asu_gsa',
      array(
        'label'      => __( 'ASU Header Search Box', 'asu_wordpress' ),
        'section'    => 'wordpress_jrnops_theme_section_search',
        'settings'   => 'wordpress_jrnops_theme_options[header_search]',
		'type'    => 'checkbox',
      )
  );
}
add_action( 'customize_register', 'wordpress_jrnops_customize_register' );


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function asu_s_customize_register( $wp_customize ) {
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
    $options = ( get_option( 'wordpress_jrnops_theme_options' ) ) ? get_option( 'wordpress_jrnops_theme_options' ) : null;
    // return the option if it exists
    if ( isset( $options[ $name ] ) ) {
        return apply_filters( 'wordpress_jrnops_theme_options$name', $options[ $name ] );
    }
    // return default if nothing else
    return apply_filters( 'wordpress_jrnops_theme_options_$name', $default );
}

/**
 * Sanitizer that does nothing
 */
function wordpress_jrnops_sanitize_nothing( $data ) {
  return $data;
}
/**
 * Sanitizer that checks if the data is an url
 */
function wordpress_jrnops_sanitize_url( $data ) {
  // TODO check that $data is an email or url
  return $data;
}
/**
 * Sanitizer that checks if the data is an email or url
 */
function wordpress_jrnops_sanitize_email_or_url( $data ) {
  // TODO check that $data is an email or url
  return $data;
}
/**
 * Sanitizer that checks if the data is a phone number
 */
function wordpress_jrnops_sanitize_phone( $data ) {
  // TODO check that $data is a phone number
  return $data;
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
			'label'  => __( '', 'asu_wordpress' ),
			'address' => '',
		),
		'tempe' => array(
			'label'  => __( 'Tempe', 'asu_wordpress' ),
			'address' => 'Arizona State University - Tempe campus<br/>1151 S. Forest Ave.<br/>Tempe, AZ 85287 USA',
		),
		'polytechnic' => array(
			'label'  => __( 'Polytechnic', 'asu_wordpress' ),
			'address' => 'Arizona State University - Polytechnic campus<br/>Power Road and Williams Field Road<br/>7001 E. Williams Field Road<br/>Mesa, AZ 85212',
		),
		'downtown_phoenix' => array(
			'label'  => __( 'Downtown Phoenix', 'asu_wordpress' ),
			'address' => 'Arizona State University - Downtown Phoenix<br/>411 N. Central, Suite 520<br/>Phoenix, AZ 85004',
		),
		'west' => array(
			'label'  => __( 'West', 'asu_wordpress' ),
			'address' => 'Arizona State University - West campus<br/>4701 West Thunderbird Road<br/>PO Box 37100<br/>Phoenix, AZ 85069-7100',
		),
		'research_park' => array(
			'label'  => __( 'Research Park', 'asu_wordpress' ),
			'address' => 'Arizona State University - Research Park<br/>8750 S Science Dr<br/>Tempe, AZ 85284',
		),
		'skysong' => array(
			'label'  => __( 'Skysong', 'asu_wordpress' ),
			'address' => 'Arizona State University - SkySong<br/>1475 N. Scottsdale Rd, Suite 200<br/>Scottsdale, Arizona 85257-3538',
		),
		'lake_havasu' => array(
			'label'  => __( 'Lake Havasu', 'asu_wordpress' ),
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
endif; // asu_sanitize_campus_choices

