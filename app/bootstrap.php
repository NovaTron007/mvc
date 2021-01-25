<?php

// require config file
require_once('config/config.php');

// load core libs using autoload
spl_autoload_register(function($className){
  require_once 'libraries/' . $className .'.php';
});