<?php

//Current URL
function currentUrl(){
  return substr($_SERVER["REQUEST_URI"],strlen("/movie"));
}
//!GET URL
function getUrl($url){
  return currentUrl()==$url;
}
?>