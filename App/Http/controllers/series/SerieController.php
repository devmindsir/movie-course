<?php

namespace App\Http\controllers\series;

use App\Models\Movie;

class SerieController
{
  public function index()
  {
    $series = (new Movie)->getSeries();
    view('series/index', ['series' => $series]);
  }
}
