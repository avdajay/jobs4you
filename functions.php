<?php

// Global Functions
function the_header()
{
    require_once ROOT . '/resources/includes/header.inc.php';
}

function the_footer()
{
    require_once ROOT . '/resources/includes/footer.inc.php';
}

function the_dashhead()
{
    require_once ROOT . '/resources/includes/dashboard-header.inc.php';
}

function the_dashfoot()
{
    require_once ROOT. '/resources/includes/dashboard-footer.inc.php';
}

function the_sidebar()
{
    require_once ROOT . '/resources/includes/sidebar.inc.php';
}

function config($name, $option)
{
    $config = include ROOT . '/config/' . $name . '.php';
    return $config[$option];
}

function asset($path)
{
    echo '/public/'. $path;
}

function view($name, $data = [])
{
    require ROOT. '/resources/views/' . $name . '.view.php';
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
}

function slug($string)
{
    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
    return $slug;
}