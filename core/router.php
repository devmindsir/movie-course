<?php
$url = currentUrl();

$routes = [
  '/' => "./controllers/index.php",
  '/movies' => "./controllers/movies.php",
  '/series' => "./controllers/series.php",
  '/actors' => "./controllers/actors.php",
  '/actor-details' => "./controllers/actor-details.php",
  '/movie-details' => "./controllers/movie-details.php",
  '/admin' => "./controllers/admin.php",
  '/addmovie' => "./controllers/admin-form.php",
  '/edit' => "./controllers/admin-edit.php",
  '/delete' => "./controllers/admin-delete.php",

];


if (array_key_exists($url, $routes)) {
  require($routes[$url]);
} else {
  header("location:./");
}