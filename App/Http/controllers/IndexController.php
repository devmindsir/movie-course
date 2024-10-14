<?php

namespace App\Http\controllers;

use App\Models\Movie;
use App\Models\Slider;

class IndexController
{

  public function index()
  {
    $data = $this->loadData();
    view('index', $data);
  }

  private function loadData()
  {
    //!SLIDER
    $sliders = (new Slider)->all();

    //!New Movie
    $movie = new Movie();
    $newMovies = $movie->new();
    //!Popular Movie
    $popularMovies = $movie->popular();

    return [
      'sliders' => $sliders,
      'newMovies' => $newMovies,
      'popularMovies' => $popularMovies
    ];
  }
}
