<?php

use core\Session;

require(BASE_PATH . "core/model.php");

$errors = Session::getFlash('errors');

require(BASE_PATH . "views/login/create_view.php");
