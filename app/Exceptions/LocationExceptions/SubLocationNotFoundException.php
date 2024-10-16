<?php

namespace App\Exceptions\LocationExceptions;

use App\Constants\CommonConstants\StatusCodeConstant;
use Exception;

class SubLocationNotFoundException extends Exception
{
    protected $message = "sub location not found!";
    protected $code = StatusCodeConstant::NOT_FOUND;
}
