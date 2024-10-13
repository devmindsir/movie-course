<?php

//!use Class
use App\Http\Requests\AddMovieRequest;
use App\Core\Session;
use App\Core\Validate;

require(model());

//!add Movie
if (isset($_POST['title'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $genre = $_POST['genre'];
  $actor = $_POST['actor'];
  $image = $_POST['image-url'];
  $type = $_POST['type'];
  $user_id = Session::get('user_id');



  //!instantiate Validate
  $validate = new Validate();

  //!VALIDATE
  $errors = (new AddMovieRequest)->validate($title, $description, $image, $genre, $actor)->getError();

  if (empty($errors)) {
    $movie = $fetcher->setData("INSERT INTO tbl_movie (user_id,title,description,genres,actors,image_path,series) VALUES(?,?,?,?,?,?,?)", [$user_id, $title, $description, $genre, $actor, $image, $type]);

    //!redirect
    $message = 'successfully add movie';
    redirect("admin", $message);
  }
  //!Session Set
  Session::setFlash('old', $_POST);
  Session::setFlash('errors', $errors);

  //!redirect
  redirect('admin/create');
}
