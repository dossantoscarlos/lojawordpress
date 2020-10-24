<?php

/**
 * Fired during plugin activation
 *
 * @link       https://theinnovs.com/cssfe
 * @since      1.0.0
 *
 * @package    Css_For_Elementor
 * @subpackage Css_For_Elementor/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Css_For_Elementor
 * @subpackage Css_For_Elementor/includes
 * @author     theinnovs <theinnovs@gmail.com>
 */
class Css_For_Elementor_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		
		self::installation_time();
		self::page_create();
		self::cssfe_update();

	}

	public static function installation_time() {

		$get_installation_time = strtotime("now");
		update_option( 'cssfe_install_time', $get_installation_time );
		update_option( 'cssfe_page_shortcode', '[modern]' );

	}

	public static function page_create() {
		$short = get_option('cssfe_page_shortcode');
		$custom_page = array(
			'post_title'    => wp_strip_all_tags( 'Modern Browser' ),
			'post_content'  => $short,
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type'     => 'page',
		  );
	  
		  // Insert the post into the database
		  $page_value = wp_insert_post( $custom_page, false );
    	  update_option( 'cssfe_page', $page_value );
	}

	public static function cssfe_update() {
		update_option( 'modern_title', 'PLEASE UPDATE YOUR BROWSER' );
		update_option( 'modern_content', 'This website requires a modern browser to look and function perfectly! Internet Explorer is no longer supported or recommended by Microsoft. Browse in security and be on the cutting edge of technologic innovations by downloading one of the following options:' );
	}



}
