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

namespace EliasisWordPress\Controller\Admin\Page;

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

        $this->addScripts();
        $this->addStyles();
        $this->getSettings();
        $this->addHooks();
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
            App::EliasisWordPress('submenu', 'options'), 
            [$this, 'render']
        );
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

            WP_Register::add(
                'script', 
                App::EliasisWordPress('assets', 'js', $script)
            );
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

            WP_Register::add(
                'style',  
                App::EliasisWordPress('assets', 'css', $style)
            );
        }
    }

    /** 
     * Get json settings from model.
     * 
     * @since 1.0.0
     */
    public function getSettings() { 

        App::id(EliasisWordPress);

        App::addOption('data', $this->model->getSettings());
    }

    /**
     * Add hooks.
     *
     * @since 1.0.0
     */
    public function addHooks() {

        Hook::addHook([

            'example' => __CLASS__ . '@example',
        ]);
    }

    /** 
     * Example hook.
     * 
     * @since 1.0.0
     *
     * @return string → options html code
     */
    public function example() {

        print(App::EliasisWordPress('data', 'eliasis'));
    }
    
    /**
     * Renderizate admin page.
     *
     * @since 1.0.0
     */
    public function render() {

        $this->view->renderizate(
            App::EliasisWordPress('path', 'layout') . 'default'
        );
    }
}