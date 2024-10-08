<?php

//!use Class
use core\Router;

//!Fetch Function
require(BASE_PATH . "core/model.php");
$router = new Router();

//!actors
$id = $_GET['id'];
$actor = $fetcher->fetchData("SELECT * FROM `tbl_actors` WHERE id=?", [$id], "fetch");

if (!$actor) {
  $router->abort();
}

//!Movie Actors
$movies = $fetcher->fetchData("SELECT image_path,title
 FROM tbl_movie
 WHERE FIND_IN_SET(?,actors)", [$id]);

view('actors/show', ['actor' => $actor, 'movies' => $movies]);
