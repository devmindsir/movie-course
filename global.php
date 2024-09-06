<?php

//Current URL
function currentUrl(){
  return substr(parse_url($_SERVER["REQUEST_URI"])['path'],strlen("/movie"));
}
//!GET URL
function getUrl($url){
  return currentUrl()==$url;
}
?>