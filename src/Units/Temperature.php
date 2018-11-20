<?php

namespace Skoyah\Converter\Units;

use Skoyah\Converter\BaseUnit;

class Temperature extends BaseUnit
{
    protected $configKey = 'temperature';

    public function toCelsius()
    {
        return $this->to('c');
    }

    public function toFahrenheit()
    {
        return $this->to('f');
    }

    public function toKelvin()
    {
        return $this->to('k');
    }
}
