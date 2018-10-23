<?php

/*
Plugin Name: Advanced Custom Fields: Sites Field
Plugin URI: https://github.com/hpuit/acf-field-type-template
Description: custom acf field type for sites
Version: 1.0.0
Author: Kevin Saylor
Author URI: https://www.kevinsaylor.me
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('hpu_acf_plugin_sites_field') ) :

class hpu_acf_plugin_sites_field {
	
	// vars
	var $settings;
	
	
	/*
	*  __construct
	*
	*  This function will setup the class functionality
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	void
	*  @return	void
	*/
	
	function __construct() {
		
		// settings
		// - these will be passed into the field class.
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ )
		);
		
		
		// include field
		add_action('acf/include_field_types', 	array($this, 'include_field')); // v5
		add_action('acf/register_fields', 		array($this, 'include_field')); // v4
	}
	
	
	/*
	*  include_field
	*
	*  This function will include the field type class
	*
	*  @type	function
	*  @date	17/02/2016
	*  @since	1.0.0
	*
	*  @param	$version (int) major ACF version. Defaults to false
	*  @return	void
	*/
	
	function include_field( $version = false ) {
		
		// support empty $version
		if( !$version ) $version = 4;
		
		
		// load acf-sites-field
		load_plugin_textdomain( 'acf-sites-field', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' ); 
		
		
		// include
		include_once(plugin_dir_path( __FILE__ ) . '/fields/class-hpu-acf-field-sites-field-v' . $version . '.php');
	}
	
}


// initialize
new hpu_acf_plugin_sites_field();


// class_exists check
endif;
	
?>