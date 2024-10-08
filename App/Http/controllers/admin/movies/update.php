<?php
//!use Class
use App\Http\Requests\EditMovieRequest;
use core\Session;
use core\Validate;

require(BASE_PATH . "core/model.php");

//!add Movie
if (isset($_POST['title'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $image = $_POST['image-url'];
  $type = $_POST['type'];

  $movie_id = $_GET['id'];
  $user_id = Session::get('user_id');

  //!instantiate Validate
  $validate = new Validate();

  //!VALIDATE
  $errors = (new EditMovieRequest)->validate($title, $description, $image)->getError();


  if (empty($errors)) {
    $movie = $fetcher->setData('UPDATE `tbl_movie` SET `title` =?,`description`=?,`image_path`=?,`series` =? WHERE `id` =?', [$title, $description, $image, $type, $movie_id]);

    //!redirect
    $message = 'successfully Update movie';
    redirect("admin/edit?id=$movie_id", $message);
  }
  //!session Set
  Session::setFlash('old', $_POST);
  Session::setFlash('errors', $errors);

  //!redirect
  redirect('admin/edit?id=' . $movie_id);
}
