<?php

//!Fetch Function
require("./core/model.php");

//!Movie
$movies=fetchData("SELECT id,image_path,rate,title,date_publish FROM `tbl_movie` WHERE series=?",[0]);


require("./views/movies_view.php");
?>