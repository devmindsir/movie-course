<?php
require("./global.php");

$url=currentUrl();

$routes=[
'/'=>"./controllers/index.php",
'/movies'=>"./controllers/movies.php",
'/series'=>"./controllers/series.php",
'/actors'=>"./controllers/actors.php",
];

if(array_key_exists($url,$routes)){
  require($routes[$url]);
}else{
  header("location:./");
}


?>