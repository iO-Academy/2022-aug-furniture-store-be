<?php

namespace Fsbe\Entities;

class Product implements \JsonSerializable
{
    private int $id;
    private int $category_id;
    private string $name;
    private int $width;
    private int $height;
    private int $depth;
    private float $price;
    private int $stock;
    private int $related;
    private string $color;

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
     * @return int
     */
    public function getCategory_id(): int
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     */
    public function setCategory_id(int $category_id): void
    {
        $this->category_id = $category_id;
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
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     */
    public function setWidth(int $width): void
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     */
    public function setHeight(int $height): void
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getDepth(): int
    {
        return $this->depth;
    }

    /**
     * @param int $depth
     */
    public function setDepth(int $depth): void
    {
        $this->depth = $depth;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }

    /**
     * @param int $stock
     */
    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    /**
     * @return int
     */
    public function getRelated(): int
    {
        return $this->related;
    }

    /**
     * @param int $related
     */
    public function setRelated(int $related): void
    {
        $this->related = $related;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'category_id' => $this->getCategory_id(),
            'name' => $this->getName(),
            'width' => $this->getWidth(),
            'height' => $this->getHeight(),
            'depth' => $this->getDepth(),
            'price' => $this->getPrice(),
            'stock' => $this->getStock(),
            'related' => $this->getRelated(),
            'color' => $this->getColor()
        ];
    }
}