<?php

use PHPUnit\Framework\TestCase;
use Skoyah\Converter\Units\Temperature;

class TemperatureConvertionTest extends TestCase
{
    protected $temperature;

    public function setUp()
    {
        parent::setUp();

        $this->temperature = new Temperature(100, 'k');
    }

    /** @test */
    public function it_calculates_base_temperature_unit_when_instantiated()
    {
        $temperature = new Temperature(1, 'c');

        $this->assertEquals('kelvin', $temperature->base());
    }

    /** @test */
    public function it_converts_from_kelvin_to_kelvin()
    {
        $this->assertEquals(100, $this->temperature->to('kelvin'));
        $this->assertEquals(100, $this->temperature->to('k'));
        $this->assertEquals(100, $this->temperature->toKelvin());
    }

    /** @test */
    public function it_converts_from_kelvin_to_celsius()
    {
        $this->assertEquals(-173.15, $this->temperature->withDecimals(2)->to('celsius'));
        $this->assertEquals(-173.15, $this->temperature->withDecimals(2)->to('c'));
        $this->assertEquals(-173.15, $this->temperature->withDecimals(2)->toCelsius());
    }

    /** @test */
    public function it_converts_from_kelvin_to_fahrenheit()
    {
        $this->assertEquals(-279.67, $this->temperature->withDecimals(2)->to('fahrenheit'));
        $this->assertEquals(-279.67, $this->temperature->withDecimals(2)->to('f'));
        $this->assertEquals(-279.67, $this->temperature->withDecimals(2)->toFahrenheit());
    }
}
