<?php

use Skoyah\Converter\Mass;
use PHPUnit\Framework\TestCase;
use Skoyah\Converter\Exceptions\InvalidUnitException;

class UnitTest extends TestCase
{
    /** @test */
    public function it_formats_the_unit_type_provided_by_the_user_during_instantiation()
    {
        $mass1 = new Mass(1, 'KiloGRamS');
        $mass2 = new Mass(5, 'KG');

        $this->assertEquals('kilograms', $mass1->base());
        $this->assertEquals('kilograms', $mass2->base());
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
    public function it_throws_an_exception_when_instantiating_with_an_unknow_unit_type()
    {
        $this->expectException(InvalidUnitException::class);
        $mass = new Mass(1, 'baz');
    }

    /** @test */
    public function it_throws_an_exception_when_trying_to_set_a_string_quantity()
    {
        $this->expectException(InvalidArgumentException::class);
        $mass = new Mass('foo', 'kg');
    }

    /** @test */
    public function it_throws_an_exception_when_trying_to_set_a_negative_quantity()
    {
        $this->expectException(InvalidArgumentException::class);
        $mass = new Mass(-1, 'kg');
    }
}
