<?php

// Global Functions
function the_header()
{
    require_once __DIR__ . '/resources/includes/header.inc.php';
}

function the_footer()
{
    require_once __DIR__ . '/resources/includes/footer.inc.php';
}

function the_dashhead()
{
    require_once __DIR__ . '/resources/includes/dashboard-header.inc.php';
}

function the_dashfoot()
{
    require_once __DIR__ . '/resources/includes/dashboard-footer.inc.php';
}

function the_sidebar()
{
    require_once __DIR__ . '/resources/includes/sidebar.inc.php';
}

function config($name, $option)
{
    $config = include __DIR__ . '/config/' . $name . '.php';
    return $config[$option];
}

function asset($path)
{
    echo '/public/'. $path;
}

function view($name, $data = [])
{
    require __DIR__ . '/resources/views/' . $name . '.view.php';
}

function url($path)
{
	echo $path;
}

function e($output)
{
    echo htmlspecialchars($output);
}

function redirect($route)
{
    header('Location: ' . $route);
    exit;
}

function slug($string)
{
    $slug = strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $string));
    return $slug;
}