<?php

namespace App\Http\controllers\admin\movies;

use App\Core\Controller;
use App\Core\Router;
use App\Core\Session;
use App\Http\Requests\AddMovieRequest;
use App\Http\Requests\EditMovieRequest;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;

class AdminMovieController extends Controller
{
  public function index()
  {
    //!Movie
    $user_id = Session::get('user_id');
    $movies = (new Movie)->getMovieUser($user_id);
    $this->view('admin.movies.index', ['movies' => $movies], noNav: true);
  }

  public function destroy($id)
  {

    $router = new Router();

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

  public function update($id)
  {
    if (isset($_POST['title'])) {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $image = $_POST['image-url'];
      $type = $_POST['type'];

      $user_id = Session::get('user_id');

      //!VALIDATE
      $errors = (new EditMovieRequest)->validate($title, $description, $image)->getError();

      if (empty($errors)) {

        (new Movie)->updateMovie($title, $description, $image, $type, $id);
        //!redirect
        $message = 'successfully Update movie';
        redirect("admin/edit/$id", $message);
      }
      //!session Set
      Session::setFlash('old', $_POST);
      Session::setFlash('errors', $errors);

      //!redirect
      redirect('admin/edit/' . $id);
    }
  }

  public function create()
  {
    //!getActors
    $actors = (new Actor)->all();
    //!getGenres
    $genres = (new Genre)->all();

    $this->view('admin.movies.create', ['actors' => $actors, 'genres' => $genres], noNav: true);
  }

  public function edit($id)
  {
    $router = new Router();

    //!get Movie Id
    $user_id = Session::get('user_id');

    //!Movie
    $movie = (new Movie)->find($id);

    if (!$movie) {
      $router->abort();
    }
    if ($user_id !== $movie->user_id) {
      $router->abort(403);
    }

    $this->view('admin.movies.edit', ['movie' => $movie, 'movie_id' => $id], noNav: true);
  }
}
