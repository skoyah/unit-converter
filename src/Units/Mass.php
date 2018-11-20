<?php

namespace Skoyah\Converter\Units;

use Skoyah\Converter\BaseUnit;

class Mass extends BaseUnit
{
    protected $configKey = 'mass';

    public function toGrams()
    {
        return $this->to('g');
    }

    public function toKilograms()
    {
        return $this->to('kg');
    }
}
