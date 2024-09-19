<?php

//!Fetch Function
require("./core/model.php");


//!getActors
$actors = $fetcher->fetchData("SELECT id,name,family FROM `tbl_actors`");


//!getGenres
$genres = $fetcher->fetchData("SELECT id,title FROM `tbl_genres`");

//!add Movie
if (isset($_POST['title'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $genre = $_POST['genre'];
  $actor = $_POST['actor'];
  $image = $_POST['image-url'];
  $type = $_POST['type'];
  $user_id = 2;
  $errors = [];
  if (trim(strlen($title)) < 2) {
    $errors['title'] = "the title filed is required";;
  }
  if (trim(strlen($description)) < 2) {
    $errors['description'] = "the description filed is required";;
  }
  if (trim(strlen($image)) < 2) {
    $errors['image'] = "the image filed is required";;
  }
  if ($genre === "") {
    $errors['genre'] = "the genre filed is required";;
  }
  if ($actor === "") {
    $errors['actor'] = "the actor filed is required";;
  }
  if (empty($errors)) {
    $movie = $fetcher->setData("INSERT INTO tbl_movie (user_id,title,description,genres,actors,image_path,series) VALUES(?,?,?,?,?,?,?)", [$user_id, $title, $description, $genre, $actor, $image, $type]);

    $message = 'successfully add movie';
    header('location:' . URL . 'admin?message=' . $message);
  }
}

require("./views/admin-form_view.php");
