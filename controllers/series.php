<?php
//!Connect To DB
require("./core/Database.php");
//!Fetch Function
require("./core/model.php");

//!Movie
$series=fetchData($connect,"SELECT id,image_path,rate,title,date_publish FROM `tbl_movie` WHERE series=?",[1]);

require("./views/series_view.php");
?>