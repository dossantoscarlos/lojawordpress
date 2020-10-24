<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://theinnovs.com/cssfe
 * @since      1.0.0
 *
 * @package    Css_For_Elementor
 * @subpackage Css_For_Elementor/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Css_For_Elementor
 * @subpackage Css_For_Elementor/includes
 * @author     theinnovs <theinnovs@gmail.com>
 */
class Css_For_Elementor_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		self::remove_page();
	}


	public static function remove_page() {

		$page_id = get_option('cssfe_page');
		wp_delete_post( $page_id, true);
		
	}

}
