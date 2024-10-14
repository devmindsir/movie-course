<?php

namespace App\Http\controllers\admin\movies;

use App\Core\Router;
use App\Core\Session;
use App\Http\Requests\AddMovieRequest;
use App\Http\Requests\EditMovieRequest;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;

class AdminMovieController
{
  public function index()
  {
    //!Movie
    $user_id = Session::get('user_id');
    $movies = (new Movie)->getMovieUser($user_id);
    view('admin/movies/index', ['movies' => $movies]);
  }

  public function destroy()
  {

    $router = new Router();

    $id = $_GET['id'];
    $user_id = Session::get('user_id');

    //!getMovie
    $movie = (new Movie)->find($id);

    if ($user_id !== $movie->user_id) {
      $router->abort(403);
    }

    //!DeleteMovie
    $movie = (new Movie)->deleteMovie($id);

    //!redirect
    $message = 'successfully Delete movie';
    redirect("admin", $message);
  }

  public function store()
  {
    //!add Movie
    if (isset($_POST['title'])) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $genre = $_POST['genre'];
      $actor = $_POST['actor'];
      $image = $_POST['image-url'];
      $type = $_POST['type'];


      $user_id = Session::get('user_id');

      //!VALIDATE
      $errors = (new AddMovieRequest)->validate($title, $description, $image, $genre, $actor)->getError();

      if (empty($errors)) {

        (new Movie)->setMovie($user_id, $title, $description, $genre, $actor, $image, $type);
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
  }

  public function update()
  {
    if (isset($_POST['title'])) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $image = $_POST['image-url'];
      $type = $_POST['type'];

      $movie_id = $_GET['id'];
      $user_id = Session::get('user_id');

      //!VALIDATE
      $errors = (new EditMovieRequest)->validate($title, $description, $image)->getError();

      if (empty($errors)) {;

        (new Movie)->updateMovie($title, $description, $image, $type, $movie_id);
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
  }

  public function create()
  {
    //!getActors
    $actors = (new Actor)->all();
    //!getGenres
    $genres = (new Genre)->all();

    view('admin/movies/create', ['actors' => $actors, 'genres' => $genres]);
  }

  public function edit()
  {
    $router = new Router();

    //!get Movie Id
    $movie_id = $_GET['id'];
    $user_id = Session::get('user_id');

    //!Movie
    $movie = (new Movie)->find($movie_id);

    if (!$movie) {
      $router->abort();
    }
    if ($user_id !== $movie->user_id) {
      $router->abort(403);
    }

    view('admin/movies/edit', ['movie' => $movie, 'movie_id' => $movie_id]);
  }
}
