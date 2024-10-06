<?php

//!Fetch Function

use core\Session;

require(BASE_PATH . "core/model.php");

//!Movie
$user_id = Session::get('user_id');


$movies = $fetcher->fetchData("SELECT id,image_path,title,series FROM `tbl_movie` WHERE user_id=? ORDER BY id DESC", [$user_id]);

require(BASE_PATH . "views/admin/movies/index_view.php");
