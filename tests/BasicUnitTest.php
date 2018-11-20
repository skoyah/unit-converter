<?php

use Skoyah\Converter\Units\Mass;
use PHPUnit\Framework\TestCase;

class BasicUnitTest extends TestCase
{
    /** @test */
    public function it_formats_the_unit_type_provided_by_the_user_during_instantiation()
    {
        $mass = new Mass(1, 'KiloGRamS');
        $this->assertEquals('kilograms', $mass->base());
    }

    /** @test */
    public function it_accepts_both_short_and_long_form_name_for_the_unit_type_during_instantiation()
    {
        $mass1 = new Mass(1, 'kilograms');
        $mass2 = new Mass(5, 'kg');

        $this->assertEquals('kilograms', $mass1->base());
        $this->assertEquals('kilograms', $mass2->base());
    }

    /** @test */
    public function it_converts_with_decimal_numbers()
    {
        $mass = new Mass(1.1, 'kg');

        $this->assertEquals(1100.00, $mass->withDecimals(2)->toGrams());
    }

    /** @test */
    public function it_converts_with_numeric_string_decimals()
    {
        $mass = new Mass(1.1, 'kg');

        $this->assertEquals(1100.00, $mass->withDecimals('2')->toGrams());
    }

    /** @test */
    public function it_converts_to_an_integer_if_the_decimals_are_set_to_zero()
    {
        $mass = new Mass(1020, 'g');

        $this->assertEquals(1, $mass->withDecimals(0)->toKilograms());
    }
}
