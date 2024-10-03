<?php


//!ROOT
$router->get('/', 'controllers/index.php');

//!MOVIE
$router->get('/movies', 'controllers/movies/index.php');
$router->get('/movies/show', 'controllers/movies/show.php');

//!SERIES
$router->get('/series', 'controllers/series/index.php');

//!ACTOR
$router->get('/actors', 'controllers/actors/index.php');
$router->get('/actors/show', 'controllers/actors/show.php');

//!ADMIN
$router->get('/admin', 'controllers/admin/movies/index.php');


//   //!ADMIN
//   '/admin/create' => BASE_PATH . "controllers/admin/movies/create.php",
//   '/admin/edit' => BASE_PATH . "controllers/admin/movies/edit.php",
//   '/admin/destroy' => BASE_PATH . "controllers/admin/movies/destroy.php",
