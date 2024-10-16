<?php

namespace App\Exceptions\ProductExceptions;

use App\Constants\ProductConstants\ProductConstants;
use Exception;

class CannotWithdrawQuantityMoreThanAvailableException extends Exception
{
    protected $message = "can`t withdraw quantity more than the quantity avalable for this product!";
    protected $code = ProductConstants::PRODUCT_QUANTITY_EXCEEDED;
}
