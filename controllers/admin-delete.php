<?php

//!Fetch Function
require("./core/model.php");

$id = $_GET['id'];
$user_id = 2;
//!getMovie
$movie = $fetcher->fetchData("SELECT user_id FROM `tbl_movie` WHERE id=?", [$id], "fetch");

if ($user_id !== $movie['user_id']) {
  abort(403);
}

//!DeleteMovie
$movie = $fetcher->setData('DELETE FROM `tbl_movie` WHERE id=?', [$id]);

//!redirect
$message = 'successfully Delete movie';
redirect("admin", $message);
