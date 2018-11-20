<?php

use PHPUnit\Framework\TestCase;
use Skoyah\Converter\Units\Length;

class LenghtConvertionTest extends TestCase
{
    protected $length;

    public function setUp()
    {
        parent::setUp();

        $this->length = new Length(1, 'm');
    }

    /** @test */
    public function it_calculates_base_length_unit_when_instantiated()
    {
        $length = new Length(1, 'km');

        $this->assertEquals('meters', $length->base());
    }

    /** @test */
    public function it_converts_meters_to_millimeters()
    {
        $this->assertEquals(1000, $this->length->to('millimeters'));
        $this->assertEquals(1000, $this->length->to('mm'));
        $this->assertEquals(1000, $this->length->toMillimeters());
    }

    /** @test */
    public function it_converts_meters_to_centimeters()
    {
        $this->assertEquals(100, $this->length->to('centimeters'));
        $this->assertEquals(100, $this->length->to('cm'));
        $this->assertEquals(100, $this->length->toCentimeters());
    }

    /** @test */
    public function it_converts_meters_to_decimeters()
    {
        $this->assertEquals(10, $this->length->to('decimeters'));
        $this->assertEquals(10, $this->length->to('dm'));
        $this->assertEquals(10, $this->length->toDecimeters());
    }

    /** @test */
    public function it_converts_meters_to_meters()
    {
        $this->assertEquals(1, $this->length->to('meters'));
        $this->assertEquals(1, $this->length->to('m'));
        $this->assertEquals(1, $this->length->toMeters());
    }

    /** @test */
    public function it_converts_meters_to_kilometers()
    {
        $this->assertEquals(0.001, $this->length->to('kilometers'));
        $this->assertEquals(0.001, $this->length->to('km'));
        $this->assertEquals(0.001, $this->length->toKilometers());
    }

    /** @test */
    public function it_converts_meters_to_inches()
    {
        $this->assertEquals(39.37, $this->length->withDecimals(2)->to('inches'));
        $this->assertEquals(39.37, $this->length->withDecimals(2)->to('in'));
        $this->assertEquals(39.37, $this->length->withDecimals(2)->toInches());
    }

    /** @test */
    public function it_converts_meters_to_feet()
    {
        $this->assertEquals(3.28, $this->length->withDecimals(2)->to('feet'));
        $this->assertEquals(3.28, $this->length->withDecimals(2)->to('ft'));
        $this->assertEquals(3.28, $this->length->withDecimals(2)->toFeet());
    }

    /** @test */
    public function it_converts_meters_to_yards()
    {
        $this->assertEquals(1.09, $this->length->withDecimals(2)->to('yards'));
        $this->assertEquals(1.09, $this->length->withDecimals(2)->to('yd'));
        $this->assertEquals(1.09, $this->length->withDecimals(2)->toYards());
    }

    /** @test */
    public function it_converts_meters_to_miles()
    {
        $this->assertEquals(0.0006, $this->length->withDecimals(4)->to('miles'));
        $this->assertEquals(0.0006, $this->length->withDecimals(4)->to('mi'));
        $this->assertEquals(0.0006, $this->length->withDecimals(4)->toMiles());
    }

    /** @test */
    public function it_converts_meters_to_nautical_miles()
    {
        $this->assertEquals(0.0005, $this->length->withDecimals(4)->to('nautical miles'));
        $this->assertEquals(0.0005, $this->length->withDecimals(4)->to('nmi'));
        $this->assertEquals(0.0005, $this->length->withDecimals(4)->toNauticalMiles());
    }
}
