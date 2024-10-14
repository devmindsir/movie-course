<?php

namespace App\Http\controllers\actors;

use App\Core\Router;
use App\Models\Actor;
use App\Models\Movie;

class ActorControllers
{

  public function index()
  {
    $actors = (new Actor)->all();

    view('actors/index', ['actors' => $actors]);
  }

  public function show()
  {
    //!Get Id
    $id = $_GET['id'];

    $router = new Router();

    //!Get Actor
    $actor = (new Actor)->find($id);

    if (!$actor) {
      $router->abort();
    }

    //!Movie Actors
    $movies = (new Movie)->actor($id);

    //!View
    view('actors/show', ['actor' => $actor, 'movies' => $movies]);
  }
}
