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

use Josantonius\Hook\Hook;
?>

<!--
Hello World, HTML + CSS
@author  Taj
@link    http://codepen.io/tajlo/pen/YWJpja
-->
<div class="star">
  <img src="http://bit.ly/2b2lqIN" height="50"  class="rocket">
  <div class="planet-wrapper">
    <div class="planet">
      <div class="crater1"></div>
      <div class="crater2"></div>
      <div class="crater3"></div>
      <div class="eliasis">
         <?php Hook::doAction('example') ?>
      </div>
      <div class="eliasis-subtitle">
         <?= __('PHP Framework', 'eliasis-wordpress-plugin') ?>
      </div>
    </div>
  </div>
</div>