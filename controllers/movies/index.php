<?php

//!Fetch Function
require(BASE_PATH . "core/model.php");

//!Movie
$movies = $fetcher->fetchData("SELECT id,image_path,rate,title,date_publish FROM `tbl_movie` WHERE series=?", [0]);


require(BASE_PATH . "views/movies/index_view.php");
