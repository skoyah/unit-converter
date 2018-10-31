<?php

use PHPUnit\Framework\TestCase;
use Skoyah\Converter\Mass;

class MassConvertionTest extends TestCase
{
    /** @test */
    public function it_converts_from_kilograms_to_different_mass_units()
    {
        $mass = new Mass(10, 'kg');

        $this->assertEquals(0.01, $mass->to('tonnes'));
        $this->assertEquals(10, $mass->to('kilograms'));
        $this->assertEquals(10000, $mass->to('grams'));
        $this->assertEquals(10000000, $mass->to('milligrams'));
        $this->assertEquals(22.05, $mass->to('pounds', 2));
        $this->assertEquals(352.74, $mass->to('ounces', 2));
    }

    /** @test */
    public function it_converts_from_different_mass_units_to_kilograms()
    {
        $milligram = new Mass(1, 'mg');
        $gram = new Mass(1, 'g');
        $ton = new Mass(1, 't');
        $pound = new Mass(1, 'lbs');
        $ounce = new Mass(1, 'oz');

        $this->assertEquals(0.000001, $milligram->to('kilograms'));
        $this->assertEquals(0.001, $gram->to('kilograms'));
        $this->assertEquals(1000, $ton->to('kilograms'));
        $this->assertEquals(0.45, $pound->to('kilograms', 2));
        $this->assertEquals(0.028, $ounce->to('kilograms', 3));
    }

}
