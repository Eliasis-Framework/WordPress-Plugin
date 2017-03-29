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

use Eliasis\App\App;

$css = App::url('css');
$js  = App::url('js');

return [

    'assets' => [

        'js' => [
            'eliasisadmin' => [
                'name'      => 'eliasisadmin',
                'url'       => $js . 'eliasis-admin.js',
                'place'     => 'admin',
                'deps'      => ['jquery'],
                'version'   => '1.0.0',
                'footer'    => true,
                'params'    => [],
            ],
            'eliasisfront' => [
                'name'      => 'eliasisfront',
                'url'       => $js . 'eliasis-front.js',
                'place'     => 'front',
            ],
        ],

        'css' => [
            'eliasisfront' => [
                'name'      => 'eliasisfront',
                'url'       => $css . 'eliasis-front.css',
                'place'     => 'front',
                'deps'      => [],
                'version'   => '1.0.0',
                'media'     => '',
            ],
            'eliasisadmin' => [
                'name'      => 'eliasisadmin',
                'url'       => $css . 'eliasis-admin.css',
                'place'     => 'admin',
            ],
        ],
    ],
];
