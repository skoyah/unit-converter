<?php

use Skoyah\Converter\Area;
use PHPUnit\Framework\TestCase;

class AreaConvertionTest extends TestCase
{
    /** @test */
    public function it_sets_square_centimeters_as_base_unit()
    {
        $area = new Area(1, 'square millimeters');

        $this->assertEquals('square meters', $area->base());
    }

    /** @test */
    public function it_converts_from_square_meters_to_different_area_units()
    {
        $area = new Area(1, 'm2');

        $this->assertEquals(1000000, $area->to('mm2'));
        $this->assertEquals(10000 , $area->to('cm2'));
        $this->assertEquals(1 , $area->to('m2'));
        $this->assertEquals(0.000001 , $area->to('km2'));
        $this->assertEquals(1550.4 , $area->to('in2', 1));
        $this->assertEquals(10.764 , $area->to('ft2', 3));
        $this->assertEquals(1.19599 , $area->to('square yards', 5));
    }
}
