<?php

namespace Skoyah\Converter;

class Mass extends Unit
{
    protected $configKey = 'mass';

    public function toTonnes()
    {
        return $this->convertTo('tonnes');
    }

    public function toKilograms()
    {
        return $this->convertTo('kilograms');
    }

    public function toGrams()
    {
        return $this->convertTo('grams');
    }

    public function toMilligrams()
    {
        return $this->convertTo('milligrams');
    }

    public function toPounds()
    {
        return $this->convertTo('pounds');
    }

    public function toOunces()
    {
        return $this->convertTo('ounces');
    }
}
