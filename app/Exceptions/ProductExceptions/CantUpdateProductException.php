<?php

namespace App\Exceptions\ProductExceptions;

use App\Constants\CommonConstants\StatusCodeConstant;
use Exception;

class CantUpdateProductException extends Exception
{
    protected $message = "can`t update the product data!";
    protected $code = StatusCodeConstant::VALIDATION_ERROR;
}
