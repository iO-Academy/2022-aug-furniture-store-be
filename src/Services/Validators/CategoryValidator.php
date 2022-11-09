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
        echo 'The id is valid';
        } else {
            echo 'The id is invalid';
        }

        return (bool)count($categoryIds);
    }
}