<?php
//!Connect To DB
require("./core/Database.php");
//!Fetch Function
require("./core/model.php");

//!actors
$actors=fetchData($connect,"SELECT id,name,family,image FROM `tbl_actors`");

require("./views/actors_view.php");
?>