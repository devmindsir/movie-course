<?php

namespace App\Http\controllers\movies;

use App\Core\Router;
use App\Models\Movie;

class MovieController
{

  public function index()
  {

    $movies = (new Movie)->getMovie();
    view('movies/index', ['movies' => $movies]);
  }

  public function show()
  {
    //!Movie
    $movieId = $_GET['id'];

    $router = new Router();
    $details = (new Movie)->getDetails($movieId);
    $movie = $details[0];
    $actor_images = $details[1];
    $genre_titles = $details[2];

    if (!$movie->id) {
      $router->abort();
    }

    view('movies/show', ['movie' => $movie, 'actor_images' => $actor_images, 'genre_titles' => $genre_titles]);
  }
}
