<?php

//!Fetch Function
require("./core/model.php");

$id = $_GET['id'];

$movie = $fetcher->setData('DELETE FROM `tbl_movie` WHERE id=?', [$id]);

$message = 'successfully Delete movie';
header('location:' . URL . 'admin?message=' . $message);
