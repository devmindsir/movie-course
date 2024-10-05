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
$router->delete('/admin', 'controllers/admin/movies/destroy.php');
$router->post('/admin', 'controllers/admin/movies/store.php');
$router->patch('/admin', 'controllers/admin/movies/update.php');

$router->get('/admin/create', 'controllers/admin/movies/create.php');
$router->get('/admin/edit', 'controllers/admin/movies/edit.php');

//!LOGIN
$router->get('/login', 'controllers/login/create.php');
//!REGISTER
$router->get('/register', 'controllers/register/create.php');
