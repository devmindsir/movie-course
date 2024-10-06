<?php


//!Fetch Function
require(BASE_PATH . "core/model.php");


//!getActors
$actors = $fetcher->fetchData("SELECT id,name,family FROM `tbl_actors`");


//!getGenres
$genres = $fetcher->fetchData("SELECT id,title FROM `tbl_genres`");



require(BASE_PATH . "views/admin/movies/create_view.php");
