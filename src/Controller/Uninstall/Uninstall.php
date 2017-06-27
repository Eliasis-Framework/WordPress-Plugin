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

namespace EliasisWordPress\Controller\Uninstall;

use Eliasis\Controller\Controller;

/**
 * Main method for cleaning and removal of components.
 * 
 * @since 1.0.0
 */
class Uninstall extends Controller { 

    /**
     * Remove and uninstall the plugin components.
     *
     * @since 1.0.0
     *
     * @uses delete_option()      → removes option by name
     * @uses delete_site_option() → removes a option by name
     */
    public function removeAll() {
        
        $this->model->removeAll();
    }
}
