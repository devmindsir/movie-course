<?php

//!use Class
use App\Core\Router;
use App\Core\Session;

//!Fetch Function
require(model());

$router = new Router();

//!get Movie Id
$movie_id = $_GET['id'];
$user_id = Session::get('user_id');

//!Movie
$movie = $fetcher->fetchData("SELECT id,user_id,image_path,title,description,series FROM `tbl_movie` WHERE id=?", [$movie_id], "fetch");

if (!$movie) {
  $router->abort();
}
if ($user_id !== $movie['user_id']) {
  $router->abort(403);
}


view('admin/movies/edit', ['movie' => $movie, 'movie_id' => $movie_id]);
