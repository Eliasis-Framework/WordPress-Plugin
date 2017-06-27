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

namespace EliasisWordPress\Model\Launcher;

use Eliasis\App\App,
    Eliasis\Model\Model;

/**
 * Main plugin launcher.
 *
 * @since 1.0.3
 */
class Launcher extends Model {

    /**
     * Set plugin version.
     * 
     * @since 1.0.3
     *
     * @uses get_option()    → option value based on an option name
     * @uses add_option()    → add a new option to Wordpress options
     * @uses update_option() → update a named option/value
     */
    public function setOptions() {

        $pluginName = App::EliasisWordPress()->get('slug');

        $actualVersion = App::EliasisWordPress()->get('version');

        if (!$installed_version = get_option($pluginName) . '-version') {

            add_option($pluginName . '-version', $actualVersion);
        
        } else {

            if ($installed_version < $actualVersion) {

                update_option($pluginName . '-version', $actualVersion);
            }
        }
    }
}
