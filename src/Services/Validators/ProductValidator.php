<?php

namespace Fsbe\Services\Validators;

class ProductValidator
{
    public static function validateProduct(int $productId, array $productsArray): bool
    {
        $productIds  = array_map(function($product) {
            return $product->getId();
        }, $productsArray);

        return in_array($productId, $productIds);
    }
}