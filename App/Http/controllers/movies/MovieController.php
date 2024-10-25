<?php

namespace App\Http\controllers\movies;

use App\Core\Controller;
use App\Core\Router;
use App\Models\Movie;

class MovieController extends Controller
{

  public function index()
  {
    $movies = (new Movie)->getMovie();
    $this->view("movies.index", ['movies' => $movies]);
  }

  public function show($id, $slug)
  {
    $router = new Router();
    $details = (new Movie)->getDetails($id);
    $movie = $details[0];
    $actor_images = $details[1];
    $genre_titles = $details[2];
    $slugMovie = generateSlug($movie->title);
    if (!$movie->id || $slugMovie !== $slug) {
      $router->abort();
    }

    $this->view('movies.show', ['movie' => $movie, 'actor_images' => $actor_images, 'genre_titles' => $genre_titles], noNav: true);
  }
}
