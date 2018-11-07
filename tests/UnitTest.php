<?php

use Skoyah\Converter\Mass;
use PHPUnit\Framework\TestCase;
use Skoyah\Converter\Unit as Model;
use Skoyah\Converter\Exceptions\InvalidUnitException;
use Skoyah\Converter\Exceptions\FileNotFoundException;

class UnitTest extends TestCase
{
    /** @test */
    public function it_throws_an_exception_when_assigning_an_undefined_configKey()
    {
        $this->expectException(FileNotFoundException::class);

        $unit = new Unit(1, 'kg');
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

class Unit extends Model
{
    protected $configKey ='foo';
}
