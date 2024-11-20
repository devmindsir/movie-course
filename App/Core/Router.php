<?php

namespace  App\Core;

use  App\Core\Middlewares\Middleware;
use App\Http\IndexController;

interface RouterInterface
{
  public function get($url, $controller);
  public function post($url, $controller);
  public function put($url, $controller);
  public function patch($url, $controller);
  public function delete($url, $controller);
  public function checkRoute($url, $method);
  public function abort($code);
  public function auth($auth);
}


class Router implements RouterInterface
{
  public $routes = [];
  public function auth($auth)
  {
    $this->routes[array_key_last($this->routes)]['auth'] = $auth;
  }
  public function get($url, $controller)
  {
    return $this->addRoute($url, $controller, 'GET');
  }
  public function post($url, $controller)
  {
    return $this->addRoute($url, $controller, 'POST');
  }
  public function put($url, $controller)
  {
    return $this->addRoute($url, $controller, 'PUT');
  }
  public function patch($url, $controller)
  {
    return $this->addRoute($url, $controller, 'PATCH');
  }
  public function delete($url, $controller)
  {
    return $this->addRoute($url, $controller, 'DELETE');
  }
  private function addRoute($url, $controller, $method)
  {
    $this->routes[] = [
      'url' => $url,
      'controller' => $controller,
      'method' => $method,
      'auth' => null,
    ];

    return $this;
  }
  public function checkRoute($url, $method)
  {

    foreach ($this->routes as $route) {
      $pattern = preg_replace('/{(\w+)}/', '([^\/]+)', $route['url']);

      if (preg_match('#^' . $pattern . '$#u', $url, $matches) && $method === $route['method']) {

        //!Middleware
        Middleware::handle($route['auth']);

        //!Controller
        $nameController = $route['controller'][0];
        $methodController = $route['controller'][1];

        return (new $nameController)->$methodController(...array_slice($matches, 1));
      }
    }
    $this->abort();
  }

  public function abort($code = 404,$message='')
  {
    http_response_code($code);
   view("errors/$code",['message'=>$message]);
    die();
  }
}
