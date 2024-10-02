<?php

//!Fetch Function
require(BASE_PATH . "core/model.php");

//!SLIDER
$sliders = $fetcher->fetchData("SELECT * FROM `tbl_slider`");

//!New Movie
$newMovies = $fetcher->fetchData("SELECT id,title,rate,image_path FROM `tbl_movie` ORDER BY id DESC LIMIT 8");

//!Popular Movie
$popularMovies = $fetcher->fetchData("SELECT id,title,rate,image_path FROM `tbl_movie` ORDER BY view DESC LIMIT 8");



require(BASE_PATH . "views/index_view.php");
