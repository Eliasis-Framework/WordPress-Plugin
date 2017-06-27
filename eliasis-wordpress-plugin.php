<?php
/**
 * Eliasis WordPress plugin skeleton.
 *
 * Plugin Name: Eliasis WP Plugin
 * Plugin URI:  https://github.com/Eliasis-Framework/WordPress-Plugin.git
 * Description: Skeleton for create WordPress plugins with Eliasis PHP Framework.
 * Version:     1.0.0
 * Author:      Josantonius
 * Author URI:  https://josantonius.com/ 
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: eliasis-wordpress-plugin
 * Domain Path: /languages
 */

use Eliasis\App\App;

$DS = DIRECTORY_SEPARATOR;

/** 
 * Don't expose information if this file called directly.
 */
if (!function_exists('add_action') || !defined('ABSPATH')) {

    echo 'I can do when called directly.'; die;
}

/** 
 * Classloader.
 */
require 'lib' . $DS . 'vendor' . $DS .'autoload.php';

/** 
 * Start application.
 */
App::run(__DIR__, 'wordpress-plugin', 'EliasisWordPress');

/** 
 * Get main instance.
 */
$Launcher = App::instance('Launcher', 'controller');

/** 
 * Register hooks.
 */
register_activation_hook(__FILE__, [$Launcher, 'activation']);

register_deactivation_hook(__FILE__, [$Launcher, 'deactivation']);

/** 
 * Launch application.
 */
$Launcher->init();
?>