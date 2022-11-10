<?php

namespace Fsbe\DataAccess\Hydrators;

use Fsbe\DataAccess\Database;
use Fsbe\Entities\Product;

class ProductHydrator
{
    public static function hydrateFromDb(Database $db,int $productID, Product $product): Product
    {
        $sql = 'SELECT `products`.`id`, `categories`.`name`, `category_id`, `width`, `height`, `depth`, `price`, `stock`, `related`, `color` '
            . 'FROM `products` '
            . 'JOIN `categories` ON `categories`.`id` = `products`.`category_id` '
            . 'WHERE `products`.`id` = :id;';

        $stmt = $db->getConnection()->prepare($sql);
        $stmt->bindParam(':id', $productID);
        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_CLASS, Product::class);

        $result = $stmt->fetchAll();

        $resultObject = $result[0];

        $product->setId($resultObject->getId());
        $product->setName($resultObject->getName());
        $product->setCategory_id($resultObject->getCategory_id());
        $product->setWidth($resultObject->getWidth());
        $product->setHeight($resultObject->getHeight());
        $product->setDepth($resultObject->getDepth());
        $product->setPrice($resultObject->getPrice());
        $product->setStock($resultObject->getStock());
        $product->setRelated($resultObject->getRelated());
        $product->setColor($resultObject->getColor());

        return $product;
    }
}
