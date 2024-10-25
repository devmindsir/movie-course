<?php

namespace App\Core;

use eftec\bladeone\BladeOne;

class Controller
{

  protected $blade;

  public function __construct()
  {
    $views = BASE_PATH . 'Resource/views';
    $cache = BASE_PATH . 'storage/cache';

    $this->blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
  }

  public function view($path, $data = [], $noHeader = null, $noNav = null, $noFooter = null)
  {
    $data = array_merge($data, [
      'noHeader' => $noHeader,
      'noNav' => $noNav,
      'noFooter' => $noFooter
    ]);
    echo $this->blade->run($path, $data);
  }
}
