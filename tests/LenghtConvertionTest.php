<?php

use Skoyah\Converter\Length;
use PHPUnit\Framework\TestCase;

class LenghtConvertionTest extends TestCase
{
    /** @test */
    public function it_converts_from_meters_to_different_length_units()
    {
        $lenght = new Length(1, 'm');

        $this->assertEquals(1000, $lenght->to('millimeters'));
        $this->assertEquals(100, $lenght->to('centimeters'));
        $this->assertEquals(10, $lenght->to('decimeters'));
        $this->assertEquals(1, $lenght->to('meters'));
        $this->assertEquals(0.001, $lenght->to('kilometers'));
        $this->assertEquals(39.37, $lenght->to('inches', 2));
        $this->assertEquals(3.28, $lenght->to('feet', 2));
        $this->assertEquals(1.09, $lenght->to('yards', 2));
        $this->assertEquals(0.0006, $lenght->to('miles', 4));
        $this->assertEquals(0.0005, $lenght->to('nautical miles', 4));
    }
}
