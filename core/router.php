<?php
$url = currentUrl();

$routes = [
  //!ROOT
  '/' => BASE_PATH . "controllers/index.php",

  //!MOVIE
  '/movies' => BASE_PATH . "controllers/movies/index.php",
  '/movies/show' => BASE_PATH . "controllers/movies/show.php",

  //!SERIES
  '/series' => BASE_PATH . "controllers/series/index.php",

  //!ACTOR
  '/actors' => BASE_PATH . "controllers/actors/index.php",
  '/actors/show' => BASE_PATH . "controllers/actors/show.php",

  //!ADMIN
  '/admin' => BASE_PATH . "controllers/admin/movies/index.php",
  '/admin/create' => BASE_PATH . "controllers/admin/movies/create.php",
  '/admin/edit' => BASE_PATH . "controllers/admin/movies/edit.php",
  '/admin/destroy' => BASE_PATH . "controllers/admin/movies/destroy.php",
];


if (array_key_exists($url, $routes)) {
  require($routes[$url]);
} else {
  header("location:" . BASE_PATH);
}

function abort($code = 404)
{
  http_response_code($code);
  require(BASE_PATH . "views/errors/{$code}_view.php");
  die();
}
