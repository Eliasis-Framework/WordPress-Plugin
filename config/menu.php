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
			'title'      => __('Eliasis WP Plugin', 'eliasis-wordpress-plugin'),
			'name'       => __('Eliasis WP Plugin', 'eliasis-wordpress-plugin'),
			'capability' => 'manage_options',
			'slug'       => 'eliasis-wp-options',
			'function'   => '',
			'icon_url'   => App::url('icons') . 'eliasis-wp-menu-admin.png',
			'position'   => 26,
		],
	],
	'submenu' => [
		'options' => [
			'parent'     => 'eliasis-wp-options',
			'title'      => __('Options', 'eliasis-wordpress-plugin'),
			'name'       => __('Options', 'eliasis-wordpress-plugin'),
			'capability' => 'manage_options',
			'slug'       => 'eliasis-wp-options',
			'function'   => '',
		],
	],
];
