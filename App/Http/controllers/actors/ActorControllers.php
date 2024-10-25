<?php

namespace App\Http\controllers\actors;

use App\Core\Controller;
use App\Core\Router;
use App\Models\Actor;
use App\Models\Movie;

class ActorControllers extends Controller
{

  public function index()
  {
    $actors = (new Actor)->all();
    $this->view('actors.index', ['actors' => $actors]);
  }

  public function show($id, $slug)
  {

    $router = new Router();

    //!Get Actor
    $actor = (new Actor)->find($id);
    $actorSlug = generateSlug($actor->name . ' ' . $actor->family);

    if (!$actor || $actorSlug !== $slug) {
      $router->abort();
    }

    //!Movie Actors
    $movies = (new Movie)->actor($id);

    //!View
    $this->view('actors.show', ['actor' => $actor, 'movies' => $movies], noNav: true);
  }
}
