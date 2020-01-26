<?php

// Define constant global values
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('HOST', $_SERVER['HTTP_HOST']);

// The entry point for most files
// Requires all important files including class and vendor files and useful helper functions

// Start the application session
session_start();

//Development Mode;
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once ROOT . '/autoload.php';
require_once ROOT . '/vendor/autoload.php';
require_once ROOT . '/functions.php';
