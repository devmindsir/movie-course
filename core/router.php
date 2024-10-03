<?php

namespace core;

interface RouterInterface
{
  public function get($url, $controller);
  public function post($url, $controller);
  public function put($url, $controller);
  public function patch($url, $controller);
  public function delete($url, $controller);
  public function checkRoute($url);
  public function abort($code);
}


class Router implements RouterInterface
{
  public $routes = [];
  public function get($url, $controller)
  {
    $this->addRoute($url, $controller, 'GET');
  }
  public function post($url, $controller)
  {
    $this->addRoute($url, $controller, 'POST');
  }
  public function put($url, $controller)
  {
    $this->addRoute($url, $controller, 'PUT');
  }
  public function patch($url, $controller)
  {
    $this->addRoute($url, $controller, 'PATCH');
  }
  public function delete($url, $controller)
  {
    $this->addRoute($url, $controller, 'DELETE');
  }
  private function addRoute($url, $controller, $method)
  {
    $this->routes[] = [
      'url' => $url,
      'controller' => $controller,
      'method' => $method
    ];
  }
  public function checkRoute($url)
  {
    foreach ($this->routes as $route) {
      if ($route['url'] === $url) {
        return require(BASE_PATH . $route['controller']);
      }
    }
    $this->abort();
  }

  public function abort($code = 404)
  {
    http_response_code($code);
    require(BASE_PATH . "views/errors/{$code}_view.php");
    die();
  }
}
