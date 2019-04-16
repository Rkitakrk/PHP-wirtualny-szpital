<?php

use Component\Container;
use Component\DatabaseManager\QueryBuilder;
use Component\Router\Router;

// Initialize default data in Container
Container::add('config', require_once './app/config.php');
//Container::add(
//    'db_connection',
//    (new ConnectionManager)->connect(Container::get('config')['db'])
//);
Container::add(
    'query_builder',
    new QueryBuilder(Container::get('config')['db'])
);

require_once 'Helpers/default_helper.php';

$routeCollection = require_once './app/routes.php';

// Add every defined routes to router storage
$router = new Router($routeCollection);

