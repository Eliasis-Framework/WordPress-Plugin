<?php
/**
 * Eliasis WordPress plugin skeleton
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Eliasis-Framework/WordPress-Plugin.git
 * @since      1.0.0
 */

$DS = DIRECTORY_SEPARATOR;

require 'lib' . $DS . 'vendor' . $DS .'autoload.php';

use Eliasis\App\App;

if (!defined('WP_UNINSTALL_PLUGIN')) {

    exit();
}

App::run(__DIR__, 'wordpress-plugin', 'EliasisWordPress');

App::EliasisWordPress()->instance('Uninstall', 'controller')->removeAll();
