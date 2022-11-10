<?php

namespace Fsbe\DataAccess;

use Fsbe\DataAccess\Hydrators\ProductHydrator;
use Fsbe\Entities\Product;

class ProductDAO
{
    public static function fetchProduct(Database $db, int $product_id, Product $product): Product
    {
        return ProductHydrator::hydrateFromDb($db, $product_id, $product);
    }
}