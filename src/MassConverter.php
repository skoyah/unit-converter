<?php

namespace Skoyah\Converter;

use Skoyah\Converter\Exceptions\InvalidUnitException;

class MassConverter extends UnitConverter
{
    protected $config = 'mass';

    public function toPounds()
    {
        return $this->convertTo('lbs');
    }

    public function toKilograms()
    {
        return $this->convertTo('kg');
    }

    public function toOunces()
    {
        return $this->convertTo('oz');
    }
}
