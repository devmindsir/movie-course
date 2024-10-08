<?php

//!use Class
use core\Router;

//!Fetch Function
require(BASE_PATH . "core/model.php");
$router = new Router();

//!Movie
$movieId = $_GET['id'];
$movie = $fetcher->fetchData("
SELECT 
m.*,
GROUP_CONCAT(DISTINCT a.image) AS actor_image,
GROUP_CONCAT(DISTINCT g.title) AS genre_title
FROM
tbl_movie m
JOIN
tbl_actors a
ON FIND_IN_SET(a.id,m.actors)
JOIN
tbl_genres g
ON FIND_IN_SET(g.id,m.genres)
WHERE m.id=?", [$movieId], "fetch");

if (!$movie['id']) {
  $router->abort();
}
$actor_images = explode(",", $movie['actor_image']);
$genre_titles = explode(",", $movie['genre_title']);

view('movies/show', ['movie' => $movie, 'actor_images' => $actor_images, 'genre_titles' => $genre_titles]);
