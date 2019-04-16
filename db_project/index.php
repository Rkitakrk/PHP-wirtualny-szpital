<?php

use Symfony\Component\HttpFoundation\Request;

session_start();

require 'vendor/autoload.php';
require 'core/bootstrap.php';

// Get route typed in uri
$request = Request::createFromGlobals();

// Direct to route typed in uri
$router->direct($request->getPathInfo(), $request->getMethod());