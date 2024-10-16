<?php

namespace App\Exceptions\LocationExceptions;

use App\Constants\CommonConstants\StatusCodeConstant;
use Exception;

class LocationNotFoundException extends Exception
{
    protected $message = "location not found!";
    protected $code = StatusCodeConstant::NOT_FOUND;
}
