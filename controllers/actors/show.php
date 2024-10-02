<?php

//!Fetch Function
require(BASE_PATH . "core/model.php");

//!actors
$id = $_GET['id'];
$actor = $fetcher->fetchData("SELECT * FROM `tbl_actors` WHERE id=?", [$id], "fetch");

if (!$actor) {
  abort();
}

//!Movie Actors
$movies = $fetcher->fetchData("SELECT image_path,title
 FROM tbl_movie
 WHERE FIND_IN_SET(?,actors)", [$id]);

require(BASE_PATH . "views/actors/show_view.php");
