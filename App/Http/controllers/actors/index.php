<?php

//!Fetch Function
require(BASE_PATH . "core/model.php");

//!actors
$actors = $fetcher->fetchData("SELECT id,name,family,image FROM `tbl_actors`");

view('actors/index', ['actors' => $actors]);
