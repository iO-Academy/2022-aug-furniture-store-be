<?php

namespace Fsbe\Services\Validators;

use Fsbe\Services\CategoryService;

class CategoryValidator
{
    public static function validateCategory(int $catId): bool
    {
        $categoryService = new CategoryService();
        $categories = $categoryService->getCategories();

        $categoryIds = array_map(function($category) {
        return $category->getId();
         }, $categories);

        if (in_array($catId, $categoryIds)) {
            return true;
        } else {
            return false;
        }
    }
}