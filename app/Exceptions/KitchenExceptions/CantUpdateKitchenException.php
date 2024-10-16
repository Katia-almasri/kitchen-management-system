<?php

namespace App\Exceptions\KitchenExceptions;

use App\Constants\CommonConstants\StatusCodeConstant;
use Exception;

class CantUpdateKitchenException extends Exception
{
    protected $message = "can`t update kitchen data!";
    protected $code = StatusCodeConstant::VALIDATION_ERROR;
}
