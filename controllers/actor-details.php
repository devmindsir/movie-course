<?php

//!Fetch Function
require("./core/model.php");

//!actors
$id=$_GET['id'];
$actor=$fetcher->fetchData("SELECT * FROM `tbl_actors` WHERE id=?",[$id],"fetch");

//!Movie Actors
$movies=$fetcher->fetchData("SELECT image_path,title
 FROM tbl_movie
 WHERE FIND_IN_SET(?,actors)",[$id]);

require("./views/actor-details_view.php");
?>