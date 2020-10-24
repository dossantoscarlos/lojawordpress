<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://theinnovs.com/cssfe
 * @since      1.0.0
 *
 * @package    Css_For_Elementor
 * @subpackage Css_For_Elementor/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Css_For_Elementor
 * @subpackage Css_For_Elementor/includes
 * @author     theinnovs <theinnovs@gmail.com>
 */
class Css_For_Elementor {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Css_For_Elementor_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'CSS_FOR_ELEMENTOR_VERSION' ) ) {
			$this->version = CSS_FOR_ELEMENTOR_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'css-for-elementor';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Css_For_Elementor_Loader. Orchestrates the hooks of the plugin.
	 * - Css_For_Elementor_i18n. Defines internationalization functionality.
	 * - Css_For_Elementor_Admin. Defines all hooks for the admin area.
	 * - Css_For_Elementor_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-css-for-elementor-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-css-for-elementor-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-css-for-elementor-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-css-for-elementor-public.php';

		/**
		 * page shortcode
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/shortcode/page-shortcode.php';

		/**
		 * Load ajax file
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/wp-ajax.php';

		/**
		 * Elementor controls include
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'elementor-control/cssfe-pratice.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'elementor-control/cssfe-form-accept.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'elementor-control/cssfe-lightbox-caption.php';
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'elementor-control/cssfe-archive-products.php';
		
		/**
		 * Custom css and js file of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/css-for-elementor-css-js.php';

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/css-js-elementor-front.php';
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/css-for-elementor-frontend.php';

		//require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-css-for-elementor-form.php';

		$this->loader = new Css_For_Elementor_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Css_For_Elementor_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Css_For_Elementor_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Css_For_Elementor_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action( 'admin_menu', $plugin_admin, 'admin_nav_menu' );

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Css_For_Elementor_Public( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Css_For_Elementor_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}


}


