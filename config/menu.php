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

$textdomain = App::plugin('name');

return [

	'menu' => [
		'top-level' => [
			'title'      => __('Eliasis WP Plugin', $textdomain),
			'name'       => __('Eliasis WP Plugin', $textdomain),
			'capability' => 'manage_options',
			'slug'       => 'eliasis-wp-options',
			'function'   => '',
			'icon_url'   => App::url('icons') . 'eliasis-wp-menu-admin.png',
			'position'   => 25,
		],
	],
	'submenu' => [
		'options' => [
			'parent'     => 'eliasis-wp-options',
			'title'      => __('Options', $textdomain),
			'name'       => __('Options', $textdomain),
			'capability' => 'manage_options',
			'slug'       => 'eliasis-wp-options',
			'function'   => '',
		],
	],
];
