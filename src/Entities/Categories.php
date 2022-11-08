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
        $this->categories = $categories;
    }

    public function jsonSerialize(): array
    {
        return $this->categories;
    }
}