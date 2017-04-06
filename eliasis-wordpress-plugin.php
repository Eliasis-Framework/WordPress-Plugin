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

/** 
 * Don't expose information if this file called directly.
 */
if (!function_exists('add_action') || !defined('ABSPATH')) {

    echo 'I can do when called directly.'; die;
}

define('ELIASIS_WP', 'EliasisWordPress');

$DS = DIRECTORY_SEPARATOR;

require 'lib' . $DS . 'vendor' . $DS .'autoload.php';

new App(__DIR__, 'wordpress-plugin', ELIASIS_WP);

$method = App::getNamespace('controller') . 'Launcher::getInstance';

$Launcher = call_user_func($method);

$Launcher->init();
?>