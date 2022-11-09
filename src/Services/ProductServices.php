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

    public function getProducts(): Products
    {
        return ProductsDAO::fetch($this->db);
    }
}