<?php
//!GET URL
function getUrl($url){
  return substr($_SERVER["REQUEST_URI"],strlen("/movie"))==$url;
}
?>