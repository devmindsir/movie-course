<?php

//!Fetch Function
require(BASE_PATH . "core/model.php");

//!Movie
$series = $fetcher->fetchData("SELECT id,image_path,rate,title,date_publish FROM `tbl_movie` WHERE series=?", [1]);

view('series/index', ['series' => $series]);
