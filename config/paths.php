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

$DS   = App::DS;
$ROOT = App::ROOT();

return [

    'path' => [

        'public'    => $ROOT.'public'.$DS,
        'json'      => $ROOT.'public'.$DS.'json'    .$DS,
        'layout'    => $ROOT.'src'   .$DS.'template'.$DS.'layout'  .$DS,
        'page'      => $ROOT.'src'   .$DS.'template'.$DS.'page'   .$DS,
    ],
];
