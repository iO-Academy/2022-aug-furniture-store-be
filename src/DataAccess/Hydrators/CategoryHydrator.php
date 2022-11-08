<?php

namespace Fsbe\DataAccess\Hydrators;

use Fsbe\DataAccess\Database;
use Fsbe\Entities\Category;
// TO DO: ensure namespaces, uses are correct

class                           CategoryHydrator
{
    public static function hydrateFromDb(Database $db, int $id): Category
    {
        $sql = 'SELECT `id`, `name`, `products` '
            . 'FROM `categories` '
            . 'WHERE `id` = :id; ';
        $values = [':id' => $id];

        $stmt = $db->getConnection()->prepare($sql);

        $stmt->setFetchMode(\PDO::FETCH_CLASS, Category::class);

        $stmt->execute($values);

        $category = $stmt->fetch();

        if (!$category) {
            throw new \InvalidArgumentException('Invalid id');
        }

        return $category;
    }
