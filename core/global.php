<?php

//Current URL
function currentUrl()
{
  return parse_url($_SERVER["REQUEST_URI"])['path'];
}
//!GET URL
function getUrl($url)
{
  return currentUrl() == $url;
}
//!Redirect
function redirect($path, $message = '')
{
  $url = URL . $path;

  if (strpos($path, '?')) {
    $separator = '&';
  } else {
    $separator = '?';
  }

  if (!empty($message)) {
    $url .= $separator . "message=" . urlencode($message);
  }

  header('location:' . $url);
  die();
}
