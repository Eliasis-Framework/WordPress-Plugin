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

require(App::EliasisWordPress('path', 'elements') . 'header.php');
require(App::EliasisWordPress('path', 'pages')    . 'options.php');
require(App::EliasisWordPress('path', 'elements') . 'footer.php');
