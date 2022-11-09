<?php

namespace Fsbe\DataAccess;

use Fsbe\DataAccess\Hydrators\ProductHydrator;
use Fsbe\Entities\Product;

class ProductDAO
{
    public static function fetch(Database $db, int $id): Product
    {
        return ProductHydrator::hydrateFromDb($db, $id);
    }
}