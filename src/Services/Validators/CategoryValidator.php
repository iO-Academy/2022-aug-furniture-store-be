<?php

namespace Fsbe\Services\Validators;

use Fsbe\Entities\Categories;
use Fsbe\Services\CategoryService;

class CategoryValidator
{
    public static function validateCategory(int $catId): bool
    {
        $categories = new Categories();
        $categoryService = new CategoryService();
        $categories = $categoryService->getCategories($categories);
        $categoriesArray = $categories->getCategories();
        $categoryIds = array_map(function($category) {
        return $category->getId();
         }, $categoriesArray);

        return in_array($catId, $categoryIds);
    }
}