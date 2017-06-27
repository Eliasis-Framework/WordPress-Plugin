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

use Eliasis\App\App;

$namespace = App::EliasisWordPress()->get('namespaces', 'admin-page');

$Options = $namespace . 'Options\Options';

return [

    'hooks' => [

        ['example', [$Options, 'example'], 8, 0],
    ]
];
