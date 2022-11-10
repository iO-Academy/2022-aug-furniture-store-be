<?php

namespace Fsbe\Services\Validators;

use Fsbe\Entities\Product;
use PHPUnit\Framework\TestCase;

class ProductValidatorTest extends TestCase
{

    public function testValidateProduct_GivenProductId1ReturnsTrue()
    {
        $mockProductOne = $this->createMock(Product::class);
        $mockProductOne->expects($this->once())
            ->method('getId')
            ->willReturn(1);
        $Products = [$mockProductOne];

        $actual = \Fsbe\Services\Validators\ProductValidator::validateProduct(1, $Products);

        $this->assertEquals(true, $actual);
    }

    public function testValidateProduct_GivenProductId2ReturnsFalse()
    {
        $mockProductOne = $this->createMock(Product::class);
        $mockProductOne->expects($this->once())
            ->method('getId')
            ->willReturn(1);
        $Products = [$mockProductOne];
        $actual = \Fsbe\Services\Validators\ProductValidator::validateProduct(2, $Products);

        $this->assertEquals(false, $actual);
    }
}