<?php

//Current URL

use App\Core\Session;

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
function redirect($path = '', $message = '',$statusCode=302)
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
    http_response_code($statusCode);
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


//!SLUG
function generateSlug($string)
{
  $slug = trim($string);
  //!تبدیل به حروف کوچک

  $slug = strtolower($string);

  //!جایگزینی فاصله ها با -

  $slug = preg_replace('/\s+/', '-', $slug);

  //!حذف کاراکترهای غیر مجاز

    $slug = preg_replace('/[^a-z0-9\-آ-ی]/u', '', $slug);


    //!حذف - های اضافی

  $slug = preg_replace('/-+/', '-', $slug);


  $slug = trim($slug, '-');
  //!return
  return $slug;
}
function checkSlug(string $slug){
$slug_generate=generateSlug($slug);
return urlencode($slug_generate);
}

function dd($variable){
    echo '<pre>';
    print_r($variable);
    echo '<pre>';
    die();
}


