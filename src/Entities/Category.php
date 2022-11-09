<?php

namespace Fsbe\Entities;

class Category implements \JsonSerializable
{
    private int $id;
    private string $name;
    private int $products;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getProducts(): int
    {
        return $this->products;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'name'=> $this->getName(),
            'products' => $this->getProducts()
        ];
    }
}