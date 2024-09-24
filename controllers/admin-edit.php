<?php

//!Fetch Function
require("./core/model.php");

$movie_id = $_GET['id'];
$user_id = 2;
//!get Movie Id
//!Movie
$movie = $fetcher->fetchData("SELECT id,user_id,image_path,title,description,series FROM `tbl_movie` WHERE id=?", [$movie_id], "fetch");

if (!$movie) {
  http_response_code(404);
  require('./views/errors/404_view.php');
  die();
}
if ($user_id !== $movie['user_id']) {
  http_response_code(403);
  require('./views/errors/403_view.php');
  die();
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

    $message = 'successfully Update movie';
    header('location:' . URL . 'edit?id=' . $movie_id . '&message=' . $message);
  }
}

require("./views/admin-edit_view.php");
