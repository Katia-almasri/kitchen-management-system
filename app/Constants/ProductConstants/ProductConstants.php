<?php

namespace App\Constants\ProductConstants;

use App\Interfaces\ConstantsInterface\BaseConstants;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

/**
 * THIS CLASS IS TO DEFINE THE COMMON CONSTANTS OF THE STATUS CODE RETURNED AS A RESPOSNE
 */
class ProductConstants
{
    public const PRODUCT_QUANTITY_EXCEEDED = "PRODUCT_ERR_10001";
}
