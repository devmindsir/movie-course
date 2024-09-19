<?php

//!Fetch Function
require("./core/model.php");

//!actors
$actors=$fetcher->fetchData("SELECT id,name,family,image FROM `tbl_actors`");

require("./views/actors_view.php");
?>