<?php

namespace Fsbe\DataAccess\Hydrators;

use Fsbe\DataAccess\Database;
use Fsbe\Entities\Product;
use Fsbe\Entities\Products;

class ProductsHydrator
{
    public static function hydrateFromDb(Database $db, int $category_id, Products $products): Products
    {
        $sql = 'SELECT * '
            . 'FROM `products`'
            . 'LEFT JOIN `categories` on `categories`.`id` = `products`.`category_id`'
            . 'WHERE `category_id` = :category_id; ';

        $stmt = $db->getConnection()->prepare($sql);

        $stmt->bindParam(':category_id', $category_id);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_CLASS, Product::class);

        $result = $stmt->fetchAll();

        $products->setProducts($result);

        return $products;
    }
}