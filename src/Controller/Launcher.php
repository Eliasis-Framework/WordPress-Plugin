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

use Josantonius\WP_Register\WP_Register,
    Josantonius\WP_Menu\WP_Menu,
    Josantonius\Hook\Hook,
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

        App::id(ELIASIS_WP);

        if (!isset($_REQUEST['plugin'])) { $_REQUEST['plugin'] = ''; }

        add_action('init', [$this, 'setLanguage']);

        $this->setHooks();

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

        $this->setVersion();

        flush_rewrite_rules();
    }

    /**
     * Set plugin version.
     * 
     * @since 1.0.0
     *
     * @uses get_option()    → option value based on an option name
     * @uses add_option()    → add a new option to Wordpress options
     * @uses update_option() → update a named option/value
     */
    protected function setVersion() {

        $pluginName = App::plugin('name');

        $actualVersion = App::plugin('version');

        if (!$installed_version = get_option($pluginName) . '-version') {

            add_option($pluginName . '-version', $actualVersion);
        
        } else {

            if ($installed_version < $actualVersion) {

                update_option($pluginName . '-version', $actualVersion);
            }
        }
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

        load_plugin_textdomain(
            'search-inside', 
            false, 
            App::plugin('name') . App::DS . 'languages' . App::DS
        );
    }

    /**
     * Set plugin hooks.
     * 
     * @since 1.0.0 
     */
    protected function setHooks() {

        Hook::setHook(App::hooks());
    }

    /**
     * Admin initializer method.
     * 
     * @since 1.0.0
     *
     * @uses add_action() → hooks a function on to a specific action
     */
    public function admin() {

        WP_Menu::add('menu', App::menu('top-level'));

        add_action('plugins_loaded', array($this, 'getCurrentScreen'));
    }

    /**
     * Get only current admin page.
     *
     * @since 1.0.0
     *
     * @uses init() → initialize only the methods of the page visited
     *
     * @return
     */
    public function getCurrentScreen() {

        App::id(ELIASIS_WP);

        foreach (App::pages() as $page) {

            $page = App::namespace('admin-page') . $page;

            if (class_exists($page)) {

                $page = call_user_func($page . '::getInstance');

                $page->addSubmenuPage();

                if (isset($_GET['page']) && $_GET['page'] == $page->slug) {

                    return $page->init();
                }
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

        $scripts = [
            'eliasisfront', 
            'eliasisadmin',
        ];

        foreach ($scripts as $script) {

            WP_Register::add('script', App::assets('js', $script));
        }
    }

    /**
     * Load styles.
     *
     * @since 1.0.0
     */
    protected function addStyles() {

        $styles = [
            'eliasisfront', 
            'eliasisadmin',
        ];

        foreach ($styles as $style) {

            WP_Register::add('style',  App::assets('css', $style));
        }
    }
}
