<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://theinnovs.com/cssfe
 * @since      1.0.0
 *
 * @package    Css_For_Elementor
 * @subpackage Css_For_Elementor/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Css_For_Elementor
 * @subpackage Css_For_Elementor/admin
 * @author     theinnovs <theinnovs@gmail.com>
 */
class Css_For_Elementor_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Css_For_Elementor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Css_For_Elementor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_style( $this->plugin_name . '_cssfe-bootstrap' , plugin_dir_url( __FILE__ ) . 'css/cssfe-bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name .'_cssfe-bootstrap-toggle' , plugin_dir_url( __FILE__ ) . 'css/cssfe-bootstrap-toggle.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name .'_cssfe-font-awosome' , plugin_dir_url( __FILE__ ) . 'css/cssfe-font-awosome.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name , plugin_dir_url( __FILE__ ) . 'css/css-for-elementor-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Css_For_Elementor_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Css_For_Elementor_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'wp-color-picker');
		wp_enqueue_script( $this->plugin_name . '_cssfe-bootstrap', plugin_dir_url( __FILE__ ) . 'js/cssfe-bootstrap.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_cssfe-bootstrap-toggle', plugin_dir_url( __FILE__ ) . 'js/cssfe-bootstrap-toggle.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_cssfe-proper', plugin_dir_url( __FILE__ ) . 'js/cssfe-proper.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name . '_admin' , plugin_dir_url( __FILE__ ) . 'js/css-for-elementor-admin.js', array( 'jquery' ), $this->version, false );
		wp_localize_script($this->plugin_name . '_admin', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
	}


	public function admin_nav_menu(){
		$parent_slug = 'css-for-elementor';
		$capability = 'manage_options';

		/**
		* Add menu and submenu page
		*/
		if( get_option( 'front_on' ) == 'front-on' ){
			
			add_menu_page( 'css for elementor' , 'Elementor Extender', $capability, $parent_slug, [$this , 'set_control'], 'dashicons-align-right', 6 );

			add_submenu_page( $parent_slug, 'Set Control', 'Set Control', $capability, $parent_slug, [$this , 'set_control'] );

			add_submenu_page( $parent_slug, 'sticky Header', 'Sticky Header', $capability, 'sticky_header' , [$this , 'sticky_header'] );

			//add_submenu_page( $parent_slug, 'Documentation', 'Documentation', $capability, 'documentation', [$this , 'documentation'] );
			add_submenu_page( $parent_slug, 'Image Carousel Link', 'Image Carousel Link', $capability, 'image_carousel_link', [$this , 'image_carousel_link'] );

			add_submenu_page( $parent_slug, 'Modern Browser', 'Modern Browser', $capability, 'mordern-browser', [$this , 'mordern_browser'] );
			
			if(! class_exists('Css_For_Elementor_Pro')){
				add_submenu_page( $parent_slug, 'Go Pro', 'Go Pro', $capability, 'go_pro_addon', [$this , 'go_pro_addon'] );
			}
			

		}else{
			add_menu_page( 'css for elementor' , 'Elementor Extender', $capability, $parent_slug, [$this , 'set_control'], 'dashicons-align-right', 6 );

			add_submenu_page( $parent_slug, 'Set Control', 'Set Control', $capability, $parent_slug, [$this , 'set_control'] );

			

			// add_submenu_page( $parent_slug, 'Logo Center', 'Logo Center', $capability, 'logo_center', [$this , 'logo_center'] );

			add_submenu_page( $parent_slug, 'sticky Section', 'Sticky Section', $capability, 'sticky_section', [$this , 'sticky_section'] );

			add_submenu_page( $parent_slug, 'Center Forms', 'Center Forms', $capability, 'center_forms', [$this , 'center_forms'] );

			add_submenu_page( $parent_slug, 'Map BG Color', 'Map BG Color', $capability, 'map_bg_color', [$this , 'map_bg_color'] );

			add_submenu_page( $parent_slug, 'Image Carousel Link', 'Image Carousel Link', $capability, 'image_carousel_link', [$this , 'image_carousel_link'] );

			add_submenu_page( $parent_slug, 'Image In Text Deisgn', 'Image In Text Deisgn', $capability, 'image_in_text_deisgn', [$this , 'image_in_text_deisgn'] );

			add_submenu_page( $parent_slug, 'Go Pro', __( 'Go Pro', 'css-for-elementor' ), $capability, 'go_pro_addon', [$this , 'go_pro_addon'] );
		}
		
		/**
		* Remove submenu page
		*/
		if( class_exists( 'Css_For_Elementor_Pro' ) ) {
			remove_submenu_page( $parent_slug, 'image_carousel_link');
			remove_submenu_page( $parent_slug, 'go_pro_addon');
		}
		
		add_action( 'admin_init', [ $this, 'sticky_header_setting' ] );
		add_action( 'admin_init', [ $this, 'sticky_section_setting' ] );
		add_action( 'admin_init', [ $this, 'center_forms_setting' ] );
		add_action( 'admin_init', [ $this, 'image_carousel_link_setting' ] );
		add_action( 'admin_init', [ $this, 'map_color_setting' ] );
		add_action( 'admin_init', [ $this, 'image_in_text_setting' ] );
		add_action( 'admin_init', [ $this, 'set_control_setting' ] );
		add_action( 'admin_init', [ $this, 'mordern_browser_setting' ] );
	}


	/**
	 * Setting control
	 */
	public function set_control() {
		require_once plugin_dir_path( dirname( __FILE__ )) . 'admin/partials/set-control.php';
	}

	public function set_control_setting() {
		
		register_setting( 'set_control_settings', 'front_on' );
		register_setting( 'set_control_settings', 'dash_on' );
	}

	/**
	 * sticky header menu and setting
	 */
	public function sticky_header(){
		require_once plugin_dir_path( dirname( __FILE__ )) . 'admin/partials/sticky-header.php';
	}

	public function sticky_header_setting(){
		register_setting( 'sticky_header_settings_group', 'sticky_on' );
		register_setting( 'sticky_header_settings_group', 'scroll_up_down' );
		register_setting( 'sticky_header_settings_group', 'font_color' );
		register_setting( 'sticky_header_settings_group', 'background_color' );
		register_setting( 'sticky_header_settings_group', 'header_height' );
	}

	/**
	 * logo central menu and setting
	 */
	public function logo_center(){
		require_once plugin_dir_path( dirname( __FILE__ )) . 'admin/partials/logo-center.php';
	}

	/**
	 * Map menu and setting
	 */
	public function map_bg_color() {
		require_once plugin_dir_path(dirname( __FILE__ )) . 'admin/partials/map-bg-color.php';
	}

	public function map_color_setting() {
		register_setting( 'map_color_settings_group', 'map_on' );
		register_setting( 'map_color_settings_group', 'map_bg_color' );
	}
	/**
	 * Image in text design menu and setting
	 */
	public function image_in_text_deisgn(){
		require_once plugin_dir_path( dirname( __FILE__ )) . 'admin/partials/image-in-text-design.php';
	}

	public function image_in_text_setting(){
		register_setting( 'image_in_text_settings_group', 'background_type' );
	}

	/**
	 * sticky section menu and setting
	 */
	public function sticky_section(){
		require_once plugin_dir_path( dirname( __FILE__ )) . 'admin/partials/sticky-section.php';
	}

	public function sticky_section_setting(){
		register_setting( 'sticky_section_settings_group', 'position_top' );
	}	
	
	/**
	 * Center forms menu and setting
	 */
	public function center_forms(){
		require_once plugin_dir_path( dirname( __FILE__ )) . 'admin/partials/center-forms.php';
	}

	public function center_forms_setting(){
		register_setting( 'center_forms_settings', 'form_on' );
		register_setting( 'center_forms_settings', 'cssef_form_lac' );
		register_setting( 'center_forms_settings', 'ph_align' );
	}

	/**
	 * Image carousel link menu and setting
	 */
	public function image_carousel_link(){
		require_once plugin_dir_path( dirname( __FILE__ )) . 'admin/partials/image-carouse-link.php';
	}

	public function image_carousel_link_setting(){
		register_setting( 'image_carousel_settings_group', 'carousel_link_on' );
		register_setting( 'image_carousel_settings_group', '1st_link' );
		register_setting( 'image_carousel_settings_group', '2nd_link' );
		register_setting( 'image_carousel_settings_group', '3rd_link' );
		register_setting( 'image_carousel_settings_group', '4th_link' );
		register_setting( 'image_carousel_settings_group', '5th_link' );
		register_setting( 'image_carousel_settings_group', '6th_link' );
		// register_setting('image_carousel_settings_group','7th_link');
		// register_setting('image_carousel_settings_group','8th_link');
	}

	/**
	 * Modern Browser
	 */
	public function mordern_browser(){
		require_once plugin_dir_path( dirname( __FILE__ )) . 'admin/partials/mordern-browser.php';
	}

	public function mordern_browser_setting(){
		register_setting( 'mordern_browser_settings', 'modern_on' );
		register_setting( 'mordern_browser_settings', 'modern_title' );
		register_setting( 'mordern_browser_settings', 'modern_content' );
	}

	/**
	 * Pro Addon
	 */
	public function go_pro_addon() {
		require_once plugin_dir_path( dirname( __FILE__ )) . 'admin/partials/go-pro.php';
	}

	

	

}
