<?php


//!Fetch Function

use App\Models\Movie;
use App\Models\Slider;

//!SLIDER
$sliders = (new Slider)->all();

//!New Movie
$movie = new Movie();
$newMovies = $movie->new();
//!Popular Movie
$popularMovies = $movie->popular();

view(
  'index',
  [
    'sliders' => $sliders,
    'newMovies' => $newMovies,
    'popularMovies' => $popularMovies
  ]
);
