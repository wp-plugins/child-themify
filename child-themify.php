<?php
/*
 * Plugin Name: Child Themify
 * Description: Enables the quick creation of child themes from any non-child theme you have installed.
 * Version: 1.0.1
 * Plugin URI: https://github.com/johnpbloch/child-themify
 * Author: John P. Bloch
 * License: GPLv2 or later
 */

define( 'CTF_PATH', WP_PLUGIN_DIR . '/' . basename( dirname( __FILE__ ) ) . '/' . basename( __FILE__ ) );
define( 'CTF_URL', WP_PLUGIN_URL . '/' . basename( dirname( __FILE__ ) ) . '/' . basename( __FILE__ ) );
define( 'CTF_VERSION', '1.0.1' );


function ctf_plugins_loaded() {
	if ( version_compare( $GLOBALS['wp_version'], '3.8', '>=' ) ) {
		global $child_themify;
		require_once dirname( CTF_PATH ) . '/includes/plugin.php';
		$child_themify = new Child_Themify();
		add_action( 'init', array( $child_themify, 'init' ) );
	} else {
		require_once dirname( CTF_PATH ) . '/includes/legacy.php';
		add_action( 'init', array( 'CTF_Babymaker', 'init' ) );
	}
}

add_action( 'plugins_loaded', 'ctf_plugins_loaded' );
