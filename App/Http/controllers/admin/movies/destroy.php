<?php

//!use Class
use App\Core\Router;
use App\Core\Session;


$router = new Router();

$id = $_GET['id'];
$user_id = Session::get('user_id');

//!getMovie
$movie = $fetcher->fetchData("SELECT user_id FROM `tbl_movie` WHERE id=?", [$id], "fetch");

if ($user_id !== $movie['user_id']) {
  $router->abort(403);
}

//!DeleteMovie
$movie = $fetcher->setData('DELETE FROM `tbl_movie` WHERE id=?', [$id]);

//!redirect
$message = 'successfully Delete movie';
redirect("admin", $message);
