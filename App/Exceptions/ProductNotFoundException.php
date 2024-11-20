<?php

namespace App\Exceptions;

use Exception;
use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class ProductNotFoundException extends Exception
{
public function __construct(int $product_id,string $message = "", int $code = 404)
{
    parent::__construct("Product ID $product_id :".$message, $code);
}
}