<?php

namespace App\Controllers;

use Component\Container;
use Component\DatabaseManager\QueryBuilder;

class HomeController
{
    public function indexAction()
    {
        return view('index');
    }

}