<?php
//This function searches the directories specified below
//for the class/interface/abstract passed to the autoloader

spl_autoload_register(function($class) {
    if (!defined('APP_DIR')) {
        define ("ROOT_DIR", 'C:\xampp\htdocs\413001842');
        define ("APP_DIR", ROOT_DIR . "\app");
        define ("FRAMEWORK_DIR", ROOT_DIR . "\framework");
        define ("TPL_DIR", ROOT_DIR . '\tpl');
        define ("DATA_DIR", ROOT_DIR . '\data');
    }
    if(file_exists(FRAMEWORK_DIR . "/" . $class . '.php')) {
        require FRAMEWORK_DIR . '/' . $class . '.php';
    }
    else if (file_exists(APP_DIR . "/" . $class . '.php')) {
        require APP_DIR . "/" .$class . '.php';
    }
    else if (file_exists(TPL_DIR . "/" . $class . '.php')) {
        require TPL_DIR . "/" .$class . '.php';
    }
    else if (file_exists(DATA_DIR . "/" . $class . '.php')) {
        require DATA_DIR . "/" .$class . '.php';
    }
    /*else {
        trigger_error('Cannot find class/interface/abstract definition: ' . $class, E_USER_ERROR);
    }*/


});