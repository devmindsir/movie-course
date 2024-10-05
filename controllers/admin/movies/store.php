<?php
require(BASE_PATH . "core/model.php");

//!add Movie
if (isset($_POST['title'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $genre = $_POST['genre'];
  $actor = $_POST['actor'];
  $image = $_POST['image-url'];
  $type = $_POST['type'];
  $user_id = session_get('user_id');


  //!instantiate Validate
  $validate = new core\Validate();

  //!Validate Form
  $errors = $validate->validateAdd($title, $description, $image, $genre, $actor);

  if (empty($errors)) {
    $movie = $fetcher->setData("INSERT INTO tbl_movie (user_id,title,description,genres,actors,image_path,series) VALUES(?,?,?,?,?,?,?)", [$user_id, $title, $description, $genre, $actor, $image, $type]);

    //!redirect
    $message = 'successfully add movie';
    redirect("admin", $message);
  }
  redirect('admin/create');
}
