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

$iconsUrl = App::EliasisWordPress()->get('url', 'icons');

return [

	'menu' => [
		'top-level' => [
			'title'      => __('Eliasis WP Plugin', 'eliasis-wordpress-plugin'),
			'name'       => __('Eliasis WP Plugin', 'eliasis-wordpress-plugin'),
			'capability' => 'manage_options',
			'slug'       => 'eliasis-wp-options',
			'function'   => '',
			'icon_url'   => $iconsUrl . 'eliasis-wp-menu-admin.png',
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
