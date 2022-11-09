<?php

namespace Fsbe\Services\Validators;

use PHPUnit\Framework\TestCase;

class CategoryValidatorTest extends TestCase
{
    public function testValidateCategory_GivenCategoryId1ReturnsTrue()
    {
        $actual = \Fsbe\Services\Validators\CategoryValidator::validateCategory(1);

        $this->assertEquals(true, $actual);
    }

    public function testValidateCategory_GivenCategoryId99ReturnsFalse()
    {
        $actual = \Fsbe\Services\Validators\CategoryValidator::validateCategory(99);

        $this->assertEquals(false, $actual);
    }
}
