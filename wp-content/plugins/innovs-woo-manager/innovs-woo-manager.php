<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://profiles.wordpress.org/innovs/
 * @since             1.0.0
 * @package           Innovs_Woo_Manager
 *
 * @wordpress-plugin
 * Plugin Name: Woo Manager for WooCommerce
 * Plugin URI: https://wordpress.org/plugins/innovs-woo-manager/
 * Description: Control add to cart button (color, text color, size on every page) And add custom fields, edit registered fields and manage their position according to your choice.
 * Author: TheInnovs
 * Author URI: https://theinnovs.com
 * Version: 1.2.3
 * License: GPL v2 or later
 * Text Domain: innovs-woo-manager
 * Domain Path: /language
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
define( 'INNOVS_WOO_MANAGER_VERSION', '1.2.3' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-innovs-woo-manager-activator.php
 */
function activate_innovs_woo_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-innovs-woo-manager-activator.php';
	Innovs_Woo_Manager_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-innovs-woo-manager-deactivator.php
 */
function deactivate_innovs_woo_manager() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-innovs-woo-manager-deactivator.php';
	Innovs_Woo_Manager_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_innovs_woo_manager' );
register_deactivation_hook( __FILE__, 'deactivate_innovs_woo_manager' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-innovs-woo-manager.php';



function innovswoo_run_error_notice() {
	$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
	if ( !in_array( 'woocommerce/woocommerce.php', $active_plugins ) ) {
		$message = "You have to install WooCommerce plugin to run Woo Manager";
    ?>
    <div class="error notice">
        <p><?php _e( $message, 'css-for-elementor' ); ?></p>
    </div>
	<?php
	}
}
add_action( 'admin_notices', 'innovswoo_run_error_notice' );


/**
 * Plugin review option show to user
 */
function iwm_review_notice() {

	?>

		<div class="notice notice-success is-dismissible iwm-review">
			<div class="row iwm-review-notice">
				<div class="col-md-2">
					<p><a href="https://theinnovs.com" target="_blank"><img class="review-logo" src="<?php echo plugin_dir_url( __FILE__ ) . 'img/theinnovs.png' ?>" alt="WOO Manager"></a></p>
				</div>
				<div class="col-md-10">
					<?php //echo $past_date; ?>
					<p>We hope you're enjoying <a href="https://wordpress.org/plugins/innovs-woo-manager/" target="_blank"> <img class="plu-logo" src="<?php echo plugin_dir_url( __FILE__ ) . 'img/woo-logo.png' ?>" alt=""> WOO Manager</a>! Could you please do us a BIG favor and give it a 5-star rating on WordPress to help us spread the word and boost our motivation?</p>
					<ul>
						<li><a href="https://wordpress.org/support/plugin/innovs-woo-manager/reviews/" target="_blank"><span class="dashicons dashicons-external"></span> Ok, You deserve it!</a></li>
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


function iwm_check_installation_time() {
   // $spare_me = get_option('void_wbwhmcse_spare_me');
   
        $install_date = get_option( 'iwm_install_time' );
        $past_date = strtotime( '-7 days' );
        if ( $install_date != " " && $past_date >= $install_date ) {
			add_action( 'admin_notices', 'iwm_review_notice' );
    	}
}
add_action( 'admin_init', 'iwm_check_installation_time' );

	
/**
 * End Plugin review option show to user
 */


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_innovs_woo_manager() {

	$plugin = new Innovs_Woo_Manager();
	$plugin->run();

}
run_innovs_woo_manager();
