<?php

//!Fetch Function
require("./core/model.php");

$movie_id = $_GET['id'];
$user_id = 2;
//!get Movie Id
//!Movie
$movie = $fetcher->fetchData("SELECT id,user_id,image_path,title,description,series FROM `tbl_movie` WHERE id=?", [$movie_id], "fetch");

if (!$movie) {
  abort();
}
if ($user_id !== $movie['user_id']) {
  abort(403);
}

//!add Movie
if (isset($_POST['title'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $_POST['image-url'];
  $type = $_POST['type'];

  //!instantiate Validate
  $validate = new Validate();

  //!Validate Form
  $errors = $validate->validateEdit($title, $description, $image);

  if (empty($errors)) {
    $movie = $fetcher->setData('UPDATE `tbl_movie` SET `title` =?,`description`=?,`image_path`=?,`series` =? WHERE `id` =?', [$title, $description, $image, $type, $movie_id]);

    //!redirect
    $message = 'successfully Update movie';
    redirect("edit?id=$movie_id", $message);
  }
}

require("./views/admin-edit_view.php");
