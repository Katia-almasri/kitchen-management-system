<?php

namespace App\Http\Middleware\ProductsMiddlewares;

use App\Exceptions\ProductExceptions\CannotWithdrawQuantityMoreThanAvailableException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanWithdrawQuantity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $product = $request->route('product');
            if ($request->updatedQuantity > $product->quantity) {
                throw new CannotWithdrawQuantityMoreThanAvailableException();
            }
            return $next($request);
        } catch (
            CannotWithdrawQuantityMoreThanAvailableException $ex
        ) {
        }
        $product = $request->route('product');
        return response()->json([
            'status' => $ex->getCode(),
            'message' => $ex->getMessage(),
            'data' => null
        ]);
    }
}
