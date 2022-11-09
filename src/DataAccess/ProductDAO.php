<?php

namespace Fsbe\DataAccess;

use Fsbe\DataAccess\Hydrators\ProductsHydrator;
use Fsbe\Entities\Product;

class ProductDAO
{
    public static function fetch(Database $db, int $id): Product
    {
        return ProductsHydrator::hydrateFromDb($db, $id);
    }
}