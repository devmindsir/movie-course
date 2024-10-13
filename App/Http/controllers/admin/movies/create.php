<?php




//!getActors
$actors = $fetcher->fetchData("SELECT id,name,family FROM `tbl_actors`");


//!getGenres
$genres = $fetcher->fetchData("SELECT id,title FROM `tbl_genres`");


view('admin/movies/create', ['actors' => $actors, 'genres' => $genres]);
