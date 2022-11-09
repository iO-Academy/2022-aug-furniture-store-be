<?php

namespace Fsbe\Services;

use Fsbe\DataAccess\CategoriesDAO;
use Fsbe\DataAccess\Database;
use Fsbe\DataAccess\CategoryDAO;
use Fsbe\Entities\Category;
use Fsbe\Entities\Categories;

class CategoryService
{
    private Database $db;

    /**
     * @param Database $db
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    /**
     * @param int $id
     * @return Category
     */
    public function getCategory(int $id): Category
    {
        return CategoryDAO::fetch($this->db, $id);
    }

    /**
     * @return Categories
     */
    public function getCategories(Categories $categories): Categories
    {
        return CategoriesDAO::fetch($this->db, $categories);
    }
}