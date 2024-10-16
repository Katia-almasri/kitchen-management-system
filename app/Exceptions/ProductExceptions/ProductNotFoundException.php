<?php

namespace App\Exceptions\ProductExceptions;

use App\Constants\CommonConstants\StatusCodeConstant;
use Exception;

class ProductNotFoundException extends Exception
{
    protected $message = "product no found!";
    protected $code = StatusCodeConstant::NOT_FOUND;
}
