<?php

//!Fetch Function
require("./core/model.php");

$movie_id = $_GET['id'];
//!get Movie Id
//!Movie
$movie = $fetcher->fetchData("SELECT id,image_path,title,description,series FROM `tbl_movie` WHERE id=?", [$movie_id], "fetch");

//!add Movie
if (isset($_POST['title'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $_POST['image-url'];
  $type = $_POST['type'];
  $errors = [];
  if (trim(strlen($title)) < 2) {
    $errors['title'] = "the title filed is required";
  }
  if (trim(strlen($description)) < 2) {
    $errors['description'] = "the description filed is required";
  }
  if (trim(strlen($image)) < 2) {
    $errors['image'] = "the image filed is required";
  }

  if (empty($errors)) {
    $movie = $fetcher->setData('UPDATE `tbl_movie` SET `title` =?,`description`=?,`image_path`=?,`series` =? WHERE `id` =?', [$title, $description, $image, $type, $movie_id]);

    $message = 'successfully Update movie';
    header('location:' . URL . 'edit?id=' . $movie_id . '&message=' . $message);
  }
}

require("./views/admin-edit_view.php");
