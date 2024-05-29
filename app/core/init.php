<?php

require 'config.php';
require 'App.php';
require 'functions.php';
require 'Controller.php';
require 'Database.php';
require 'Model.php';

spl_autoload_register(function ($class_name) {

    require '../app/models/' . ucfirst($class_name) . '.php';
});
