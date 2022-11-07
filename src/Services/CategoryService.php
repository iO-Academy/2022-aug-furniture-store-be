<?php
namespace Fsbe\Services;

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

    public function getCategory(int $id): Category
    {
        return CategoryDAO::fetch($this->db, $id);
    }

    public function getCategories(): Categories
    {
        return CategoriesDAO::fetch($this->db);
    }
}