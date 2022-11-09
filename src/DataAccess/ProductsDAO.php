<?php

namespace Fsbe\DataAccess;

use Fsbe\DataAccess\Hydrators\ProductsHydrator;
use Fsbe\Entities\Products;

class ProductsDAO
{
    public static function fetch(Database $db, int $category_id, Products $products): Products
    {
        return ProductsHydrator::hydrateFromDb($db, $category_id, $products);
    }
}