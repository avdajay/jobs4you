<?php
/**
 * --------------------
 * Autoload Core Files
 * --------------------
 */

// Autoload controllers and models
function autoload($class)
{
    $path = __DIR__ . '/core/';
    require $path . $class .'.php';
}

spl_autoload_register('autoload');
