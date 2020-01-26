<?php
/**
 * --------------------
 * Autoload Core Files
 * --------------------
 */

// Autoload controllers and models
function autoload($class)
{
    $path = $_SERVER['DOCUMENT_ROOT'] . '/core/';
    require $path . $class .'.php';
}

spl_autoload_register('autoload');
