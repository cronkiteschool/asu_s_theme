<?php
/**
 * Custom functions specific to ASU theme templates
 *
 * @package asu_s
 */

/**
 * Function to download ASU theme files
 *
 * @param string $path Path to ASU themes file.
 * @return string
 */
function get_asuthemes_contents( $path ) {

    $url = esc_url_raw( 'https://www.asu.edu/asuthemes/4.3/' . $path );
    $response = wp_remote_get( $url );
    try {
 
        // Note that we retrieve the response's body
        $body = wp_remote_retrieve_body($response);
 
    } catch ( Exception $ex ) {
        $body = null;
    } // end try/catch
 
    return $body;
 
}
