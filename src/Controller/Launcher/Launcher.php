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

namespace EliasisWordPress\Controller\Launcher;

use Josantonius\WP_Register\WP_Register,
    Josantonius\WP_Menu\WP_Menu,
    Eliasis\App\App,
    Eliasis\Controller\Controller;

/**
 * Main plugin launcher.
 *
 * @since 1.0.0
 */
class Launcher extends Controller {

    /**
     * Class initializer method.
     * 
     * @since 1.0.0
     *
     * @return boolean
     */
    public function init() {

        if (is_admin()) {

            return $this->admin();
        }

        $this->front();
    }

    /**
     * Hook plugin activation. | Executed only when activating the plugin.
     * 
     * @since 1.0.0
     *
     * @uses check_admin_referer() → user was referred from another admin page
     * @uses flush_rewrite_rules() → remove rewrite rules and recreate
     */
    public function activation() {

        check_admin_referer("activate-plugin_{$_REQUEST['plugin']}");

        $this->model->setOptions();

        flush_rewrite_rules();
    }

    /**
     * Hook plugin deactivation. Executed when deactivating the plugin.
     * 
     * @since 1.0.0
     *
     * @uses check_admin_referer() → tests if the current request is valid 
     * @uses flush_rewrite_rules() → remove rewrite rules and recreate
     */
    public function deactivation() {

        check_admin_referer("deactivate-plugin_{$_REQUEST['plugin']}");

        flush_rewrite_rules();
    }

    /**
     * Set plugin texdomain for translations.
     * 
     * @since 1.0.0 
     */
    public function setLanguage() {

        $slug = App::EliasisWordPress()->get('slug');

        load_plugin_textdomain(
            $slug, 
            false, 
            $slug . App::DS . 'languages' . App::DS
        );
    }

    /**
     * Admin initializer method.
     * 
     * @since 1.0.0
     *
     * @uses add_action() → hooks a function on to a specific action
     */
    public function admin() {

        add_action('init', [$this, 'setLanguage']);

        $this->setMenus(

            App::EliasisWordPress()->get('pages'),
            App::EliasisWordPress()->get('namespaces', 'admin-page')
        );
    }

    /**
     * Get current page and load submenu.
     *
     * @since 1.0.3
     *
     * @param array  $pages 
     * @param string $namespace
     */
    public function setMenus($pages = [], $namespace = '') {

        foreach ($pages as $page) {

            $page = $namespace . $page . '\\' . $page;

            if (!class_exists($page)) { continue; }

            $instance = call_user_func($page . '::getInstance');

            if (method_exists($instance, 'init')) {
                
                call_user_func([$instance, 'init']);
            }

            if (method_exists($instance, 'setMenu')) {
                
                call_user_func([$instance, 'setMenu']);
            }

            if (method_exists($instance, 'setSubmenu')) {
                
                call_user_func([$instance, 'setSubmenu']);
            }
        }
    }

    /**
     * Front initializer method.
     * 
     * @since 1.0.0
     */
    public function front() {

        $this->addStyles();

        $this->addScripts();
    }

    /**
     * Load scripts.
     *
     * @since 1.0.0
     */
    protected function addScripts() {

        WP_Register::add(
            'script', 
            App::EliasisWordPress()->get('assets', 'js', 'eliasisfront')
        );
    }

    /**
     * Load styles.
     *
     * @since 1.0.0
     */
    protected function addStyles() {

        WP_Register::add(
            'style',  
            App::EliasisWordPress()->get('assets', 'css', 'eliasisfront')
        );
    }
}
