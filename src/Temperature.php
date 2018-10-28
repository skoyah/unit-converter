<?php

namespace Skoyah\Converter;

class Temperature extends Unit
{
    protected $configKey = 'temperature';

    public function toCelsius()
    {
        return $this->convertTo('celsius');
    }

    public function toFahrenheit()
    {
        return $this->convertTo('fahrenheit');
    }

    public function toKelvin()
    {
        return $this->convertTo('kelvin');
    }
}
