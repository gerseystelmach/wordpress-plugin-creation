<h1>Submenu</h1>
<?php
// output security fields for the registered setting "wporg_options"
settings_fields( 'wporg_options' );
// output setting sections and their fields
// (sections are registered for "wporg", each field is registered to a specific section)
do_settings_sections( 'wporg' );
// output save settings button
submit_button( __( 'Save Settings', 'textdomain' ) );
?>