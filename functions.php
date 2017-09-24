<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

// Register User Contact Methods
function custom_user_contact_methods( $user_contact_method ) {

	$user_contact_method['facebook'] = __( 'Facebook username', 'text_domain' );
	$user_contact_method['twitter'] = __( 'Twitter username', 'text_domain' );
 	$user_contact_method['position'] = __( 'Staff position', 'text_domain' );
   


	return $user_contact_method;

}
add_filter( 'user_contactmethods', 'custom_user_contact_methods' );