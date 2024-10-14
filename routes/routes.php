<?php


//!USE
use App\Http\controllers\actors\ActorControllers;
use App\Http\controllers\admin\movies\AdminMovieController;
use App\Http\controllers\IndexController;
use App\Http\controllers\login\LoginController;
use App\Http\controllers\movies\MovieController;
use App\Http\controllers\register\RegisterController;
use App\Http\controllers\series\SerieController;

//!ROOT
$router->get('/', [IndexController::class, 'index']);

//!MOVIE
$router->get('/movies', [MovieController::class, 'index']);
$router->get('/movies/show', [MovieController::class, 'show']);

//!SERIES
$router->get('/series', [SerieController::class, 'index']);

//!ACTOR
$router->get('/actors', [ActorControllers::class, 'index']);
$router->get('/actors/show', [ActorControllers::class, 'show']);

//!ADMIN
$router->get('/admin', [AdminMovieController::class, 'index'])->auth('login');
$router->delete('/admin', [AdminMovieController::class, 'destroy'])->auth('login');
$router->post('/admin', [AdminMovieController::class, 'store'])->auth('login');
$router->patch('/admin', [AdminMovieController::class, 'update'])->auth('login');

$router->get('/admin/create',  [AdminMovieController::class, 'create'])->auth('login');
$router->get('/admin/edit',  [AdminMovieController::class, 'edit'])->auth('login');

//!REGISTER
$router->get('/register', [RegisterController::class, 'index'])->auth('guest');
$router->post('/register', [RegisterController::class, 'store'])->auth('guest');

//!LOGIN
$router->get('/login', [LoginController::class, 'index'])->auth('guest');
$router->post('/login', [LoginController::class, 'login'])->auth('guest');

//!LOGOUT
$router->delete('/login', [LoginController::class, 'destroy'])->auth('login');
