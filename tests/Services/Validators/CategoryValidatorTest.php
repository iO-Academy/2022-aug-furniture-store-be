<?php

namespace Fsbe\Services\Validators;

use PHPUnit\Framework\TestCase;

class CategoryValidatorTest extends TestCase
{
    // success tests
    public function testValidateCategory_GivenCategoryId1ReturnsTrue()
    {
        // Arrange
        // Act
        $actual = \Fsbe\Services\Validators\CategoryValidator::validateCategory(1);
        // Assert
        $this->assertEquals(true, $actual);
    }

    // Failure tests
    public function testValidateCategory_GivenCategoryId99ReturnsFalse()
    {
        // Arrange
        // Act
        $actual = \Fsbe\Services\Validators\CategoryValidator::validateCategory(99);
        // Assert
        $this->assertEquals(false, $actual);
    }
}
