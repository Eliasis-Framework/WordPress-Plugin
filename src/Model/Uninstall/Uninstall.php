<?php
/**
 * Eliasis WordPress plugin skeleton
 * 
 * @author     Josantonius - hello@josantonius.com
 * @copyright  Copyright (c) 2017
 * @license    GPL-2.0+
 * @link       https://github.com/Eliasis-Framework/WordPress-Plugin.git
 * @since      1.0.3
 */

namespace EliasisWordPress\Model\Uninstall;

use Eliasis\App\App,
    Eliasis\Model\Model;
/**
 * Main method for cleaning and removal of components.
 * 
 * @since 1.0.3
 */
class Uninstall extends Model { 

    /**
     * Remove and uninstall the plugin components.
     *
     * @since 1.0.3
     *
     * @uses delete_option()      → removes option by name
     * @uses delete_site_option() → removes a option by name
     */
    public function removeAll() {

        $pluginName = App::EliasisWordPress()->get('slug');

        delete_option($pluginName .'version');
        // For site options in Multisite
        delete_site_option($pluginName . 'version');
    }
}
