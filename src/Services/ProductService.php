<?php

namespace Fsbe\Services;

use Fsbe\DataAccess\Database;
use Fsbe\DataAccess\ProductDAO;
use Fsbe\DataAccess\ProductsDAO;
use Fsbe\Entities\Product;
use Fsbe\Entities\Products;

class ProductService
{
    private Database $db;

    /**
     * @param Database $db
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getProduct(int $id): Product
    {
        return ProductDAO::fetch($this->db, $id);
    }

    public function getProducts(int $category_id, Products $products): array
    {
        $productsObj = ProductsDAO::fetch($this->db, $category_id, $products);

        $fullArray = $productsObj->getProducts();

        $finalArray = array_map(function($product) {
            return [
                "id" => $product->getId(),
                "price" => $product->getPrice(),
                "stock" => $product->getStock(),
                "color" => $product->getColor()
            ];
        }, $fullArray);

        return $finalArray;
    }
}