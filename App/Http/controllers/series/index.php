<?php

//!Movie

use App\Models\Movie;

$series = (new Movie)->getSeries();

view('series/index', ['series' => $series]);
