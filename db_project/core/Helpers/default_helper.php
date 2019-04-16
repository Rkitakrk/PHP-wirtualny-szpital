<?php

use Component\Container;

function getBaseThemeHeader()
{
    $view_path = Container::get('config')['main']['dir_theme'].Container::get('config')['main']['theme'];

    require $view_path.'/base_header.php';
}

function getBaseThemeFooter()
{
    $view_path = Container::get('config')['main']['dir_theme'].Container::get('config')['main']['theme'];

    require $view_path.'/base_footer.php';
}

function view($name, $param = null)
{
    $view_path = Container::get('config')['main']['dir_theme'].Container::get('config')['main']['theme'];

    if ($param) {
        extract($param);
    }

    require_once $view_path.'/'.$name.'.php';
}

function redirect($uri)
{
    $uri = trim($uri, '/');
    $base = Container::get('config')['main']['base_path'];
    header('Location: '.$base.$uri);
}

function basePath()
{
    return Container::get('config')['main']['base_path'];
}

?>