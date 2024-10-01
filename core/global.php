<?php

//Current URL
function currentUrl()
{
  return substr(parse_url($_SERVER["REQUEST_URI"])['path'], strlen("/movie"));
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
}
