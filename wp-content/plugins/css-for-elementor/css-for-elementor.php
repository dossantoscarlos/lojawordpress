<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://theinnovs.com/css-for-elementor
 * @since             1.0.1
 * @package           CSS_For_Elementor
 *
 * @wordpress-plugin
 * Plugin Name:       Elementor Extender
 * Plugin URI:        https://wordpress.org/plugins/css-for-elementor
 * Description:       Get more customized options for Elementor Widgets. No coding knowledge required!
 * Version:           1.0.7
 * Author:            TheInnovs
 * Author URI:        https://theinnovs.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       css-for-elementor
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CSS_FOR_ELEMENTOR_VERSION', '1.0.7' );
define( 'CSSFE_SLUG', plugin_basename( __FILE__ ) );
define( 'CSSFE_PRO_CLASS', 'Css_For_Elementor_Pro' );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-css-for-elementor-activator.php
 */
function activate_css_for_elementor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-css-for-elementor-activator.php';
	Css_For_Elementor_Activator::activate();
}


function cssef_my_error_notice() {
	$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
	if ( !in_array( 'elementor/elementor.php', $active_plugins ) ) {
		$message = "You have to install Elementor plugin to run CSS For Elementor";
    ?>
    <div class="error notice">
        <p><?php _e( $message, 'css-for-elementor' ); ?></p>
    </div>
	<?php
	}
}
add_action( 'admin_notices', 'cssef_my_error_notice' );


/**
 * Plugin review option show to user
 */
function cssfe_review_notice() {

	?>

		<div class="notice notice-success is-dismissible cssfe-review">
			<div class="row cssfe-review-notice">
				<div class="col-md-1">
					<p><img class="review-logo" src="<?php _e( plugin_dir_url( __FILE__ ) . 'admin/img/theinnovs.png' ); ?>" alt=""></p>
				</div>
				<div class="col-md-11">
					<?php //echo $past_date; ?>
					<p>We hope you're enjoying <a href="https://wordpress.org/plugins/css-for-elementor/" target="_blank"> <img class="plu-logo" src="<?php echo plugin_dir_url( __FILE__ ) . 'admin/img/css-logo.png'; ?>" alt=""> CSS for Elementor</a>! Could you please do us a BIG favor and give it a 5-star rating on WordPress to help us spread the world and boost our motivation?</p>
					<ul>
						<li><a href="https://wordpress.org/support/plugin/css-for-elementor/reviews/" target="_blank"><span class="dashicons dashicons-external"></span> Ok, You deserve it!</a></li>
						<li id="reviewAlreadyDid"> <a href="#" ><span class="dashicons dashicons-smiley"></span> I already did</a></li>
						<li id="maybeLater"> <a href=""><span class="dashicons dashicons-calendar-alt"></span> Maybe Later</a> </li>
						<li> <a href="https://docs.theinnovs.com" target="_blank"><span class="dashicons dashicons-editor-help"></span> I need help</a> </li>
						<li id="neverShowAgain"><a href=""><span class="dashicons dashicons-no"></span> Never show again</a> </li>
					</ul>
				</div>
			</div>
		</div>
    <?php
}


function cssfe_check_installation_time() {
   // $spare_me = get_option('void_wbwhmcse_spare_me');
   
        $install_date = get_option( 'cssfe_install_time' );
        $past_date = strtotime( '-7 days' );
        if ( $install_date != " " && $past_date >= $install_date ) {
			add_action( 'admin_notices', 'cssfe_review_notice' );
    	}
}
add_action( 'admin_init', 'cssfe_check_installation_time' );
	
/**
 * End Plugin review option show to user
 */

 /**
  * Add Go to pro link under plugin row
  */

add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'insert_plugin_links' );

function insert_plugin_links($links)  {
	// go pro
	if( ! class_exists( CSSFE_PRO_CLASS ) ) {
		$links[] = sprintf('<a href="https://theinnovs.com/elementor-extender-pro" target="_blank" style="color: #dc3545; font-weight: bold;">' . __('Go Pro') . '</a>');
	}
	return $links;
}

/**
  * End Add Go to pro link under plugin row
  */

/**
 * Direct redirect to WP Dashboard from Elementor editor
 */
function cssfe_exit_to_dashboard(){ 
	$url=admin_url(); return $url;
} 
if( get_option('dash_on') == 'dash-on'){
	add_filter('elementor/document/urls/exit_to_dashboard' , 'cssfe_exit_to_dashboard');
}

/**
 * End Direct redirect to WP Dashboard from Elementor editor
 */

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-css-for-elementor-deactivator.php
 */
function deactivate_css_for_elementor() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-css-for-elementor-deactivator.php';
	Css_For_Elementor_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_css_for_elementor' );
register_deactivation_hook( __FILE__, 'deactivate_css_for_elementor' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-css-for-elementor.php';

//require plugin_dir_path( __FILE__ ) . 'includes/class-css-for-elementor-frontend.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_css_for_elementor() {

	$plugin = new Css_For_Elementor();
	$plugin->run();

}
run_css_for_elementor();



