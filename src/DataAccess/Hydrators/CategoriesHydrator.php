<?php

namespace Fsbe\DataAccess\Hydrators;

use Fsbe\DataAccess\Database;
use Fsbe\Entities\Category;
use Fsbe\Entities\Categories;

class CategoriesHydrator
{
    public static function hydrateFromDb(Database $db): Categories
    {
        $sql = 'SELECT `products`.`category_id` As `id`, `categories`.`name`, COUNT(`category_id`) AS `products` '
               . 'FROM `products` '
               . 'JOIN `categories` '
               . 'WHERE `products`.`category_id` = `categories`.`id` '
               . 'GROUP BY 1;';

        $statement = $db->getConnection()->prepare($sql);

        $statement->execute();

        $statement->setFetchMode(\PDO::FETCH_CLASS, Category::class);

        $result = $statement->fetchAll();

        $categories = new Categories();

        $categories->setCategories($result);

        return $categories;
    }
}