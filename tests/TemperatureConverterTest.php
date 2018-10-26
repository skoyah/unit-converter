<?php

use PHPUnit\Framework\TestCase;
use Skoyah\Converter\Temperature;

class TemperatureConverterTest extends TestCase
{
    /** @test */
    public function it_converts_from_kelvin_to_different_temperature_units()
    {
        $temperature = new Temperature(100, 'k');

        $this->assertEquals(100, $temperature->toKelvin());
        $this->assertEquals(-173.15, $temperature->toCelsius());
        $this->assertEquals(-279.67, $temperature->toFahrenheit());

        $this->assertEquals(100, $temperature->convertTo('k'));
        $this->assertEquals(-173.15, $temperature->convertTo('c'));
        $this->assertEquals(-279.67, $temperature->convertTo('f'));
    }
}
