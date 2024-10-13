<?php

//!use Class
use App\Core\Router;
use App\Models\Movie;

$router = new Router();

//!Movie
$movieId = $_GET['id'];

$details = (new Movie)->getDetails($movieId);
$movie = $details[0];
$actor_images = $details[1];
$genre_titles = $details[2];

if (!$movie->id) {
  $router->abort();
}

view('movies/show', ['movie' => $movie, 'actor_images' => $actor_images, 'genre_titles' => $genre_titles]);
