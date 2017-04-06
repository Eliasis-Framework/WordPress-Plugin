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

namespace EliasisWordPress\Controller;

use Eliasis\App\App;
/**
 * Main method for cleaning and removal of components.
 * 
 * @since 1.0.0
 */
class Uninstall { 

    /**
     * Remove and uninstall the plugin components.
     *
     * @since 1.0.0
     *
     * @uses delete_option()      → removes option by name
     * @uses delete_site_option() → removes a option by name
     */
    public static function removeAll() {

        $pluginName = App::plugin('name');

        delete_option($pluginName .'version');
        // For site options in Multisite
        delete_site_option($pluginName . 'version');
    }
}
