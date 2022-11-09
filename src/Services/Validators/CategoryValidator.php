<?php

namespace Fsbe\Services\Validators;

use Fsbe\Services\CategoryService;

class CategoryValidator
{
    public static function validateCategory(int $catId): bool
    {
        $categoryService = new CategoryService();
        $categories = $categoryService->getCategories();

        $categoryId = array_filter($categories, function($category) use ($catId) {
                return $category->getId() === $catId;
        });


        $categoryId = array_map(function)

        return (bool)count($categoryId);
    }
}