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
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getProducts(): int
    {
        return $this->products;
    }

    /**
     * @param int $products
     */
    public function setProducts(int $products): void
    {
        $this->products = $products;
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