<?php

namespace Fsbe\Services\Validators;

class CategoryValidator
{
    public static function validateCategory(int $catId, array $categoriesArray): bool
    {
        $categoryIds = array_map(function($category) {
        return $category->getId();
         }, $categoriesArray);

        return in_array($catId, $categoryIds);
    }
}