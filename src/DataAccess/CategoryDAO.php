<?php

namespace Fsbe\DataAccess;

use Fsbe\DataAccess\Hydrators\CategoryHydrator;
use Fsbe\Entities\Category;

class CategoryDAO
{
    /**
     * @param Database $db
     * @param int $id
     * @return Category
     */
    public static function fetch(Database $db, int $id): Category
    {
        return CategoryHydrator::hydrateFromDb($db, $id);
    }
}