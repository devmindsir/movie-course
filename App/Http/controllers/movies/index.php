<?php

//!Movie

use App\Models\Movie;

$movies = (new Movie)->getMovie();


view('movies/index', ['movies' => $movies]);
