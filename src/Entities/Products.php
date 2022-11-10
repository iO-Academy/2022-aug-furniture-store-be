<?php

namespace Fsbe\Entities;

use Fsbe\Entities\Product;

class Products implements \JsonSerializable
{
    private array $products;

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    public function jsonSerialize(): array
    {
        return $this->products;
    }
}