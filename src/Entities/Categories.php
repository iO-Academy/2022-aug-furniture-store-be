<?php

namespace Fsbe\Entities;

use JsonSerializable;

class Categories implements JsonSerializable
{
    private array $categories;

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     */
    public function setCategories(array $categories): void
    {
        foreach ($categories as $category) {
            $this->categories[] = $category;
        }
    }

    public function jsonSerialize(): array
    {
        return $this->categories;
    }
}