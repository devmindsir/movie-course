<?php

//!use Class
use App\Core\Router;
use App\Models\Actor;
use App\Models\Movie;

$router = new Router();

//!actors
$id = $_GET['id'];
$actor = (new Actor)->find($id);

if (!$actor) {
  $router->abort();
}

//!Movie Actors
$movies = (new Movie)->actor($id);
view('actors/show', ['actor' => $actor, 'movies' => $movies]);
