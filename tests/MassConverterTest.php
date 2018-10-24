<?php

use PHPUnit\Framework\TestCase;
use Skoyah\Converter\MassConverter;

class MassConverterTest extends TestCase
{
    /** @test */
    public function it_can_convert_kilograms_to_pounds()
    {
        $quantity = new MassConverter(10, 'kg');

        $this->assertEquals(22.0462262, $quantity->toPounds());
    }

    /** @test */
    public function it_can_convert_pounds_to_kilograms()
    {
        $quantity = new MassConverter(1, 'lbs');

        $this->assertEquals(0.45359237, $quantity->toKilograms());
    }

    /** @test */
    public function it_can_convert_units_with_defined_decimal_values()
    {
        $quantity = new MassConverter(1, 'lbs');
        $quantity->setDecimals(2);

        $this->assertEquals(0.45, $quantity->toKilograms());
    }

    /** @test */
    public function it_can_convert_pounds_to_ounces()
    {
        $quantity = new MassConverter(1, 'lbs');

        $this->assertEquals(16, $quantity->toOunces());
    }

    /** @test */
    public function it_can_convert_kilograms_to_ounces()
    {
        $quantity = new MassConverter(1, 'kg');

        $this->assertEquals(35.2739619, $quantity->toOunces());
    }
}
