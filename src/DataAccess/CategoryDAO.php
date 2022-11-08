<?php

namespace Fsbe\DataAccess;

use Fsbe\DataAccess\Hydrators\CategoryHydrator;
use Fsbe\Entities\Category;

class CategoryDAO
{
    public static function fetch(Database $db, int $id): Category
    {
        return CategoryHydrator::hydrateFromDb($db, $id);
    }
}