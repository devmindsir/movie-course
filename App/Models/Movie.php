<?php

namespace App\Models;


use App\Core\Model;

class Movie extends Model
{
  protected $table = 'tbl_movie';

  public function __construct()
  {
    parent::__construct();
  }
  public function new()
  {

    return $this->db->doSelect("SELECT id,title,rate,image_path FROM `tbl_movie` ORDER BY id DESC LIMIT 8");
  }
  public function popular()
  {
    return $this->db->doSelect("SELECT id,title,rate,image_path FROM `tbl_movie` ORDER BY view DESC LIMIT 8");
  }

  public function actor($id)
  {
    return $this->db->doSelect("SELECT image_path,title
    FROM tbl_movie
    WHERE FIND_IN_SET(?,actors)", [$id]);
  }

  public function getMovie()
  {
    return $this->db->doSelect("SELECT id,image_path,rate,title,date_publish FROM `tbl_movie` WHERE series=?", [0]);
  }
  public function getSeries()
  {
    return $this->db->doSelect("SELECT id,image_path,rate,title,date_publish FROM `tbl_movie` WHERE series=?", [1]);
  }
  public function getDetails($movieId)
  {
    $movie = $this->db->doFetch("
    SELECT 
    m.*,
    GROUP_CONCAT(DISTINCT a.image) AS actor_image,
    GROUP_CONCAT(DISTINCT g.title) AS genre_title
    FROM
    tbl_movie m
    JOIN
    tbl_actors a
    ON FIND_IN_SET(a.id,m.actors)
    JOIN
    tbl_genres g
    ON FIND_IN_SET(g.id,m.genres)
    WHERE m.id=?", [$movieId]);

    $actor_images = explode(",", $movie->actor_image);
    $genre_titles = explode(",", $movie->genre_title);

    return [$movie, $actor_images, $genre_titles];
  }
}
