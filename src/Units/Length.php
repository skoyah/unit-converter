<?php

namespace Skoyah\Converter\Units;

use Skoyah\Converter\BaseUnit;

class Length extends BaseUnit
{
    protected $configKey = 'length';

    public function toMillimeters()
    {
        return $this->to('mm');
    }

    public function toCentimeters()
    {
        return $this->to('cm');
    }

    public function toDecimeters()
    {
        return $this->to('dm');
    }

    public function toMeters()
    {
        return $this->to('m');
    }

    public function toKilometers()
    {
        return $this->to('km');
    }

    public function toInches()
    {
        return $this->to('in');
    }

    public function toFeet()
    {
        return $this->to('ft');
    }

    public function toYards()
    {
        return $this->to('yd');
    }

    public function toMiles()
    {
        return $this->to('mi');
    }

    public function toNauticalMiles()
    {
        return $this->to('nmi');
    }
}
