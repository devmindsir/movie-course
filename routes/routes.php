<?php

//!ROOT
$router->get('/', 'index.php');

//!MOVIE
$router->get('/movies', 'movies/index.php');
$router->get('/movies/show', 'movies/show.php');

//!SERIES
$router->get('/series', 'series/index.php');

//!ACTOR
$router->get('/actors', 'actors/index.php');
$router->get('/actors/show', 'actors/show.php');

//!ADMIN
$router->get('/admin', 'admin/movies/index.php')->auth('login');
$router->delete('/admin', 'admin/movies/destroy.php')->auth('login');
$router->post('/admin', 'admin/movies/store.php')->auth('login');
$router->patch('/admin', 'admin/movies/update.php')->auth('login');

$router->get('/admin/create', 'admin/movies/create.php')->auth('login');
$router->get('/admin/edit', 'admin/movies/edit.php')->auth('login');

//!REGISTER
$router->get('/register', 'register/create.php')->auth('guest');
$router->post('/register', 'register/store.php')->auth('guest');

//!LOGIN
$router->get('/login', 'login/create.php')->auth('guest');
$router->post('/login', 'login/show.php')->auth('guest');

//!LOGOUT
$router->delete('/login', 'login/destroy.php')->auth('login');
