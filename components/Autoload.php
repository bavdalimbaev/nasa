<?php

spl_autoload_register('myAutoloader');

function myAutoloader($class_name) {
    $array_paths = array(
        '/components/',
        '/controllers/',
    );

    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';

        if (is_file($path)) include_once $path;
    }
}