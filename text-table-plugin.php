<?php
/*
Plugin Name: Text Table Plugin
Plugin Uri: https://github.com/alnever/text-table-plugin
Description: Adds a shortcode to present a csv-style data as a html-table
Version: 1.0
Author: Alex Neverov
Author URI: http://alneverov.ru

License: GPL2

    Copyright 2018 Alex Neverov

    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License,
    version 2, as published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

*/

namespace TextTablePlugin;

spl_autoload_register(
  function ($class_name) {
    if ( ! class_exists($class_name, FALSE) && strstr($class_name, __NAMESPACE__) !== FALSE )
    {
      $class_name = str_replace(__NAMESPACE__."\\","",$class_name);
      $class_name = strtolower($class_name);
      $class_name = str_replace("_","-",$class_name);
      $class_name = str_replace("\\","/",$class_name);
      include $class_name . ".php";
    }
  }
);

class Text_Table_Plugin {

  private $admin;
  private $frontend;

  public function __construct() {
    if (is_admin()) {
      $this->admin = new Admin\Text_Table();
    } else {
      $this->frontend = new Frontend\Text_Table();
    }
  }
}

new Text_Table_Plugin();
