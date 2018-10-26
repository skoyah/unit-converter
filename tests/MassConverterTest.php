<?php

use PHPUnit\Framework\TestCase;
use Skoyah\Converter\Mass;
use Skoyah\Converter\Exceptions\InvalidUnitException;

class MassConverterTest extends TestCase
{
    /** @test */
    public function it_can_convert_kilograms_to_pounds()
    {
        $quantity = new Mass(1, 'kg');

        $this->assertEquals(2.205, $quantity->toPounds());
    }

    /** @test */
    public function it_can_convert_pounds_to_kilograms()
    {
        $quantity = new Mass(1, 'lbs');

        $this->assertEquals(
            round(0.45359237, $quantity->getDecimals()),
            $quantity->toKilograms()
        );
    }

    /** @test */
    public function it_can_convert_units_with_defined_decimal_values()
    {
        $quantity = new Mass(1, 'lbs');
        $quantity->setDecimals(2);

        $this->assertEquals(0.45, $quantity->toKilograms());
    }

    /** @test */
    public function it_can_convert_pounds_to_ounces()
    {
        $quantity = new Mass(1, 'lbs');

        $this->assertEquals(16, $quantity->toOunces());
    }

    /** @test */
    public function it_can_convert_kilograms_to_ounces()
    {
        $quantity = new Mass(1, 'kg');

        $this->assertEquals(round(35.2739619, 3), $quantity->toOunces());
    }

    /** @test */
    public function it_can_convert_grams_to_pounds_with_four_decimal_numbers()
    {
        $quantity = new Mass(5, 'g');
        $quantity->setDecimals(4);

        $this->assertEquals(0.0110, $quantity->toPounds());
    }

    /** @test */
    public function it_throws_an_exception_when_trying_to_instantiate_with_an_unknow_unit()
    {
        $this->expectException(InvalidUnitException::class);
        $quantity = new Mass(5, 'foo');
    }

    /** @test */
    public function it_throws_an_exception_when_trying_to_convert_to_an_unknow_unit()
    {
        $this->expectException(InvalidUnitException::class);
        $quantity = new Mass(5, 'kg');
        $quantity->toFoo();
    }
}
