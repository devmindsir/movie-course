<?php
require(BASE_PATH . "core/model.php");

//!add Movie
if (isset($_POST['title'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $_POST['image-url'];
  $type = $_POST['type'];

  $movie_id = $_GET['id'];
  $user_id = 2;

  //!instantiate Validate
  $validate = new core\Validate();

  //!Validate Form
  $errors = $validate->validateEdit($title, $description, $image);

  if (empty($errors)) {
    $movie = $fetcher->setData('UPDATE `tbl_movie` SET `title` =?,`description`=?,`image_path`=?,`series` =? WHERE `id` =?', [$title, $description, $image, $type, $movie_id]);

    //!redirect
    $message = 'successfully Update movie';
    redirect("admin/edit?id=$movie_id", $message);
  }
  redirect('admin/edit?id=' . $movie_id);
}
