<?php

//!Connect To DB
require("./core/Database.php");

//!Fetch Function
require("./core/model.php");

//!SLIDER
$sliders=fetchData($connect,"SELECT * FROM `tbl_slider`");

//!New Movie
$newMovies=fetchData($connect,"SELECT id,title,rate,image_path FROM `tbl_movie` ORDER BY id DESC LIMIT 8");

//!Popular Movie
$popularMovies=fetchData($connect,"SELECT id,title,rate,image_path FROM `tbl_movie` ORDER BY view DESC LIMIT 8");



require("./views/index_view.php");
?>