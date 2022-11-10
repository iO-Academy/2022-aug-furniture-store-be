<?php

namespace Fsbe\Services\Validators;

use Fsbe\Entities\Category;
use PHPUnit\Framework\TestCase;

class CategoryValidatorTest extends TestCase
{

    public function testValidateCategory_GivenCategoryId1ReturnsTrue()
    {
        $mockCategoryOne = $this->createMock(Category::class);
        $mockCategoryOne->expects($this->once())
                        ->method('getId')
                        ->willReturn(1);
        $categories = [$mockCategoryOne];

        $actual = \Fsbe\Services\Validators\CategoryValidator::validateCategory(1, $categories);

        $this->assertEquals(true, $actual);
    }

    public function testValidateCategory_GivenCategoryId2ReturnsFalse()
    {
        $mockCategoryOne = $this->createMock(Category::class);
        $mockCategoryOne->expects($this->once())
            ->method('getId')
            ->willReturn(1);
        $categories = [$mockCategoryOne];
        $actual = \Fsbe\Services\Validators\CategoryValidator::validateCategory(2, $categories);

        $this->assertEquals(false, $actual);
    }

    public function testValidateCategory_GivenStringThrowsError()
    {
        $mockCategoryOne = $this->createMock(Category::class);
        $mockCategoryOne->method('getId')
            ->willReturn(1);
        $categories = [$mockCategoryOne];
        $this->expectException(\TypeError::class);
        $actual = \Fsbe\Services\Validators\CategoryValidator::validateCategory('HelloBath', $categories);

    }
}
