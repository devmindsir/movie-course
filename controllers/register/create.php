<?php

use core\Session;

require(BASE_PATH . "core/model.php");

$errors = Session::getFlash('errors');

require(BASE_PATH . "views/register/create_view.php");
