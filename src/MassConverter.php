<?php

namespace Skoyah\Converter;

class MassConverter extends UnitConverter
{
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

    protected function convertTo($intended)
    {
        if (array_key_exists($this->unit, $this->lookup)) {
            return round($this->quantity * $this->lookup[$this->unit][$intended], $this->decimals);
        }
    }
}
