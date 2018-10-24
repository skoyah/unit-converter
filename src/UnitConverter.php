<?php

namespace Skoyah\Converter;

class UnitConverter
{
    protected $lookup;
    protected $quantity;
    protected $unit;
    protected $decimals = 8;

    public function __construct($quantity, $unit)
    {
        $this->quantity = $quantity;
        $this->unit = $this->formatUnits($unit);
        $this->lookup = require('units.php');
    }

        protected function formatUnits($unit)
    {
        return $this->unit = strtolower($unit);
    }

    public function setDecimals($decimals)
    {
        return $this->decimals = $decimals;
    }
}
