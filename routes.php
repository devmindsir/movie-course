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
$router->get('/admin', 'controllers/admin/movies/index.php')->auth('login');
$router->delete('/admin', 'controllers/admin/movies/destroy.php')->auth('login');
$router->post('/admin', 'controllers/admin/movies/store.php')->auth('login');
$router->patch('/admin', 'controllers/admin/movies/update.php')->auth('login');

$router->get('/admin/create', 'controllers/admin/movies/create.php')->auth('login');
$router->get('/admin/edit', 'controllers/admin/movies/edit.php')->auth('login');

//!REGISTER
$router->get('/register', 'controllers/register/create.php')->auth('guest');
$router->post('/register', 'controllers/register/store.php')->auth('guest');

//!LOGIN
$router->get('/login', 'controllers/login/create.php')->auth('guest');
$router->post('/login', 'controllers/login/show.php')->auth('guest');

//!LOGOUT
$router->delete('/login', 'controllers/login/destroy.php')->auth('login');
