<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       bang-media.com
 * @since      1.0.0
 *
 * @package    Bm_Dynamic_Widget_Areas
 * @subpackage Bm_Dynamic_Widget_Areas/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Bm_Dynamic_Widget_Areas
 * @subpackage Bm_Dynamic_Widget_Areas/includes
 * @author     Mr Neil R Day <neil@bang-media.com>
 */
class Bm_Dynamic_Widget_Areas_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'bm-dynamic-widget-areas',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
