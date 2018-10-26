<?php

use PHPUnit\Framework\TestCase;
use Skoyah\Converter\Mass;
use Skoyah\Converter\Exceptions\InvalidUnitException;

class MassConverterTest extends TestCase
{
    /** @test */
    public function it_converts_from_kilograms_to_different_mass_units()
    {
        $mass = new Mass(10, 'kg');

        $this->assertEquals(0.01, $mass->toTonnes());
        $this->assertEquals(10, $mass->toKilograms());
        $this->assertEquals(10000, $mass->toGrams());
        $this->assertEquals(10000000, $mass->toMilligrams());
        $this->assertEquals(
            round(22.046226218, $mass->getDecimals()),
            $mass->toPounds()
        );
        $this->assertEquals(
            round(352.7396195, $mass->getDecimals()),
            $mass->toOunces()
        );
    }

    /** @test */
    public function it_converts_from_different_mass_units_to_kilograms()
    {
        $milligram = new Mass(1, 'mg');
        $gram = new Mass(1, 'g');
        $ton = new Mass(1, 't');
        $pound = new Mass(1, 'lbs');
        $ounce = new Mass(1, 'oz');

        $this->assertEquals(0.000001, $milligram->toKilograms());
        $this->assertEquals(0.001, $gram->toKilograms());
        $this->assertEquals(1000, $ton->toKilograms());
        $this->assertEquals(
            round(0.45359237, $pound->getDecimals()),
            $pound->toKilograms()
        );
        $this->assertEquals(
            round(0.02834952, $ounce->getDecimals()),
            $ounce->toKilograms()
        );
    }

}
