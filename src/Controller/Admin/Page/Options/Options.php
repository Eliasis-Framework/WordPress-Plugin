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

namespace EliasisWordPress\Controller\Admin\Page\Options;

use Josantonius\WP_Register\WP_Register,
    Josantonius\WP_Menu\WP_Menu,
    Josantonius\Hook\Hook,
    Eliasis\App\App,
    Eliasis\Controller\Controller;

/**
 * Handler options page.
 *
 * @since 1.0.0
 */
class Options extends Controller {

    /**
     * Slug for this administration page.
     *
     * @since 1.0.0
     *
     * @var string $page
     */
    public $slug = 'eliasis-wp-options';

    /**
     * Class initializer method.
     *
     * @since 1.0.0
     */
    public function init() {

        $this->getSettings();
    }

    /**
     * Add menu and instance to associated method to display the page.
     * 
     * @since 1.0.0
     */
    public function setMenu() {

        WP_Menu::add(
            'menu', 
            App::EliasisWordPress()->get('menu', 'top-level'), 
            [$this, 'render']
        );
    }

    /**
     * Add submenu for this page.
     *
     * @since 1.0.0
     *
     * @uses add_submenu_page() → add a submenu page
     */
    public function addSubmenuPage() {

        WP_Menu::add(
            'submenu', 
            App::EliasisWordPress()->get('submenu', 'options'), 
            [$this, 'render']
        );
    }

    /**
     * Load scripts.
     *
     * @since 1.0.0
     */
    public function addScripts() {

        WP_Register::add(
            'script', 
            App::EliasisWordPress()->get('assets', 'js', 'eliasisadmin')
        );
    }

    /**
     * Load styles.
     *
     * @since 1.0.0
     */
    public function addStyles() {

        WP_Register::add(
            'style',  
            App::EliasisWordPress()->get('assets', 'css', 'eliasisadmin')
        );
    }

    /** 
     * Get json settings from model.
     * 
     * @since 1.0.0
     */
    public function getSettings() { 

        App::EliasisWordPress()->set('data', $this->model->getSettings());
    }

    /** 
     * Example hook.
     * 
     * @since 1.0.0
     *
     * @return string → options html code
     */
    public function example() {

        print(App::EliasisWordPress()->get('data', 'eliasis'));
    }
    
    /**
     * Renderizate admin page.
     *
     * @since 1.0.0
     */
    public function render() {

        $page = App::EliasisWordPress()->get('path', 'page');

        $layout = App::EliasisWordPress()->get('path', 'layout');

        Hook::getInstance(App::$id);

        $this->view->renderizate($layout, 'header');

        $this->view->renderizate($page, 'options');

        $this->view->renderizate($layout, 'footer');     
    }
}