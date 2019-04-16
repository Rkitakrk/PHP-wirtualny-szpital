<?php

namespace Component\Router;

use Component\Router\Route;

class RouteCollection
{

    /** @var array Collection of routes. */
    private $routes;

    /**
     * Add route to collection.
     *
     * @param \Component\Router\Route $route
     */
    public function add($route)
    {
        $this->routes[] = $route;
    }

    /**
     * If route is defined will return it.
     *
     * @param string $uri
     * @param string $request_method
     * @return bool|mixed
     */
    public function getRoute($uri, $request_method)
    {

        foreach($this->routes as $route)
        {
            if(preg_match($route->getUriPattern(), $uri) && $route->getRequestMethod() === $request_method)
            {
                return $route;
            }
        }

        return false;
    }

    /**
     * Return whole route collection
     *
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }



}