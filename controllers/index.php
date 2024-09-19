<?php

//!Fetch Function
require("./core/model.php");

//!SLIDER
$sliders=$fetcher->fetchData("SELECT * FROM `tbl_slider`");

//!New Movie
$newMovies=$fetcher->fetchData("SELECT id,title,rate,image_path FROM `tbl_movie` ORDER BY id DESC LIMIT 8");

//!Popular Movie
$popularMovies=$fetcher->fetchData("SELECT id,title,rate,image_path FROM `tbl_movie` ORDER BY view DESC LIMIT 8");



require("./views/index_view.php");
?>