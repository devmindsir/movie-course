<?php

//!use Class
use App\Core\Session;

//!Fetch Function
require(model());
//!Movie
$user_id = Session::get('user_id');
$movies = $fetcher->fetchData("SELECT id,image_path,title,series FROM `tbl_movie` WHERE user_id=? ORDER BY id DESC", [$user_id]);

view('admin/movies/index', ['movies' => $movies]);
