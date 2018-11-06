<?php

use PHPUnit\Framework\TestCase;
use Skoyah\Converter\Temperature;

class TemperatureConvertionTest extends TestCase
{
    /** @test */
    public function it_calculates_base_unit_when_instantiated()
    {
        $temperature = new Temperature(1, 'c');

        $this->assertEquals('kelvin', $temperature->base());
    }

    /** @test */
    public function it_converts_from_kelvin_to_different_temperature_units()
    {
        $temperature = new Temperature(100, 'k');

        $this->assertEquals(100, $temperature->to('kelvin'));
        $this->assertEquals(-173.15, $temperature->to('celsius'));
        $this->assertEquals(-279.67, $temperature->to('fahrenheit'));

        $this->assertEquals(100, $temperature->to('k'));
        $this->assertEquals(-173.15, $temperature->to('c'));
        $this->assertEquals(-279.67, $temperature->to('f'));
    }
}
