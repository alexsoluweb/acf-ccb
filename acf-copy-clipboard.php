<?php

/*
Plugin Name: Advanced Custom Fields: Copy clipboard
Plugin URI: PLUGIN_URL
Description: Copy text field value to clipboard
Version: 1.0.0
Author: Alexandre gravel-Ménard
Author URI: alexsoluweb.digital
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Textdomain: acf-ccb
*/

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// check if class already exists
if ( ! class_exists( 'ccb_acf_plugin_copy_clipboard' ) ) :

	class ccb_acf_plugin_copy_clipboard {

		// vars
		var $settings;


		/*
		*  __construct
		*
		*  This function will setup the class functionality
		*
		*  @type    function
		*  @date    17/02/2016
		*  @since   1.0.0
		*
		*  @param   void
		*  @return  void
		*/

		function __construct() {

			// settings
			// - these will be passed into the field class.
			$this->settings = array(
				'version' => '1.0.0',
				'url'     => plugin_dir_url( __FILE__ ),
				'path'    => plugin_dir_path( __FILE__ ),
			);

			// include field
			add_action( 'acf/include_field_types', array( $this, 'include_field' ) ); // v5
		}


		/*
		*  include_field
		*
		*  This function will include the field type class
		*
		*  @type    function
		*  @date    17/02/2016
		*  @since   1.0.0
		*
		*  @param   $version (int) major ACF version. Defaults to false
		*  @return  void
		*/

		function include_field( $version = false ) {

			// support empty $version
			if ( ! $version ) {
				$version = 5;
			}

			// load acf-ccb
			load_plugin_textdomain( 'acf-ccb', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );

			// include
			include_once 'fields/class-ccb-acf-field-copy-clipboard-v' . $version . '.php';
		}

	}


	// initialize
	new ccb_acf_plugin_copy_clipboard();


	// class_exists check
endif;
