<?php

namespace App\Http\controllers\series;

use App\Core\Controller;
use App\Models\Movie;

class SerieController extends Controller
{
  public function index()
  {
    $series = (new Movie)->getSeries();
    $this->view('series.index', ['series' => $series]);
  }
}
