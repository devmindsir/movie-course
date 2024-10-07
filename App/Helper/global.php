<?php

//Current URL

use core\Session;

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
function redirect($path = '', $message = '')
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

//!Old
function old($key)
{
  return Session::getFlash('old')[$key] ?? '';
}

//!Errors

function error($key)
{
  return Session::getFlash('errors')[$key] ?? '';
}

//!view
function view($path, $params = [])
{
  extract($params);
  require(BASE_PATH . "Resource/views/{$path}_view.php");
}
