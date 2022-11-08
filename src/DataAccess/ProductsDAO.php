<?php

namespace Fsbe\DataAccess;

use Fsbe\DataAccess\Hydrators\ProductsHydrator;
use Fsbe\Entities\Products;

class ProductsDAO
{
    public static function fetch(Database $db, int $id): Products
    {
        return ProductsHydrator::hydrateFromDb($db, $id);
    }
}