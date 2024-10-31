<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.pricewell.io
 * @since             1.0.0
 * @package           Pricewell
 *
 * @wordpress-plugin
 * Plugin Name:       PriceWell
 * Plugin URI:        https://www.pricewell.io/wordpress-plugin
 * Description:       Integrate Stripe Billing into WordPress without any coding. Pricing Tables, Checkout, Customer Portal, and more.
 * Version:           1.0.0
 * Author:            PriceWell
 * Author URI:        https://www.pricewell.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       pricewell
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
define( 'PRICEWELL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-pricewell-activator.php
 */
function activate_pricewell() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pricewell-activator.php';
	Pricewell_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-pricewell-deactivator.php
 */
function deactivate_pricewell() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-pricewell-deactivator.php';
	Pricewell_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_pricewell' );
register_deactivation_hook( __FILE__, 'deactivate_pricewell' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-pricewell.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_pricewell() {

	$plugin = new Pricewell();
	$plugin->run();

}
run_pricewell();
