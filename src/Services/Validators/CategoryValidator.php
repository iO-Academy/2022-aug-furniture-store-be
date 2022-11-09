<?php

namespace Fsbe\Services\Validators;

use Fsbe\Services\CategoryService;

class CategoryValidator
{
    public static function validateCategory(int $catId): bool
    {
        $categoryService = new CategoryService();
        $categories = $categoryService->getCategories();
        $count = count($categories->getCategories()); // change to check for id, include try catch here

        $filtered = array_filter($categories, function($category) use ($catId) {
                return $category->getId() === $catId;
        });
        return (bool)count($filtered);
    }
}