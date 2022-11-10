<?php

namespace Fsbe\DataAccess\Hydrators;

use Fsbe\DataAccess\Database;
use Fsbe\Entities\Product;
use Fsbe\Entities\Products;

class AllProductsHydrator
{
    public static function hydrateFromDb(Database $db, Products $products): Products
    {
        $sql = 'SELECT `products`.`id` AS `id`, `category_id`, `width`, `height`, `depth`, `price`, `stock`, `related`, `color`, `categories`.`name` '
            . 'FROM `products`'
            . 'LEFT JOIN `categories` ON `categories`.`id` = `products`.`category_id`';

        $stmt = $db->getConnection()->prepare($sql);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_CLASS, Product::class);

        $result = $stmt->fetchAll();

        $products->setProducts($result);

        return $products;
    }
}