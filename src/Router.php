<?php

class Router
{
  private $routes;
  public function __construct()
  {
    $this->routes = array();
  }
  public function addRoute($route)
  {
    $this->routes [] = $route;
  }
  public function redirect($url)
  {
    $path = explode('/', trim($url, '/'));

    foreach ($this->routes as $route) {
      if(strcasecmp(str_replace('Controller', '', get_class($route)), $path[0]) == 0)
      {
        unset($path[0]);
        $route->handleRoute($path);
      }
    }
  }
}


 ?>
