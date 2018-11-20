<?php

use Skoyah\Converter\BaseUnit;
use PHPUnit\Framework\TestCase;
use Skoyah\Converter\Units\Mass;

class ExceptionsTest extends TestCase
{
    /** @test */
    public function it_throws_an_exception_when_instantiating_a_unit_with_an_invalid_configKey()
    {
        $this->expectException(Exception::class);
        $unit = new Unit(1, 'kg');
    }

    /** @test */
    public function it_throws_an_exception_when_instantiating_with_an_invalid_unit_type()
    {
        $this->expectException(Exception::class);
        $mass = new Mass(1, 'baz');
    }

    /** @test */
    public function it_throws_an_exception_when_using_a_non_numeric_string_as_quantity()
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

    /** @test */
    public function it_throws_an_exception_when_converting_with_negative_decimals()
    {
        $this->expectException(InvalidArgumentException::class);
        $mass = new Mass(1030, 'g');
        $mass->withDecimals(-2)->toKilograms();
    }

    /** @test */
    public function it_throws_an_exception_when_converting_with_float_decimals()
    {
        $this->expectException(InvalidArgumentException::class);
        $mass = new Mass(1030, 'g');
        $mass->withDecimals(1.2)->toKilograms();
    }

    /** @test */
    public function it_throws_an_exception_when_converting_with_a_non_numeric_string_decimals()
    {
        $this->expectException(InvalidArgumentException::class);
        $mass = new Mass(1030, 'g');
        $mass->withDecimals('three')->toKilograms();
    }
}

class Unit extends BaseUnit
{
    protected $configKey = 'foo';
}
