<?php

namespace App\Services;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class BaseService
{
    public function __construct() {
        $this->logger = new Logger('author_service');
        $this->logger->pushHandler(new StreamHandler(BASE_PATH . 'storage/log/errors.log', Logger::ERROR));
    }
}