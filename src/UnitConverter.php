<?php

namespace Skoyah\Converter;

use Skoyah\Converter\Exceptions\InvalidUnitException;
use Skoyah\Converter\Exceptions\NotFoundException;

abstract class UnitConverter
{
    protected $lookup;
    protected $quantity;
    protected $unit;
    protected $decimals = 3;
    protected $pivot;

    public function __construct($quantity, $unit)
    {
        $this->quantity = $quantity;
        $this->lookup = $this->loadConfig();
        $this->unit = $this->formatUnit($unit);
        $this->pivot = $this->createPivot();
    }

    protected function formatUnit($unit)
    {
        if (! array_key_exists($unit, $this->lookup)) {
            throw new InvalidUnitException("The [{$this->unit}] measuring unit does not exist.");
        }
        return $this->unit = strtolower($unit);
    }

    public function setDecimals($decimals)
    {
        return $this->decimals = $decimals;
    }

    public function getDecimals()
    {
        return $this->decimals;
    }

    protected function loadConfig()
    {
        $filePath = require('config/units.php');

        if (! array_key_exists($this->config, $filePath)) {
            throw new NotFoundException("The [{$this->config}] key does not exist in the config file.");
        }

        return $filePath[$this->config]; // mass[]
    }

    public function convertTo($intended)
    {
        if (! array_key_exists($intended, $this->lookup)) {
            throw new InvalidUnitException("The [{$intended}] measuring unit does not exist.");
        }

        if ($intended == 'kg') {
            return round($this->quantity * $this->lookup[$this->unit], $this->decimals);
        }

        return round($this->pivot / $this->lookup[$intended], $this->decimals);
    }

    private function createPivot()
    {
        return $this->quantity * $this->lookup[$this->unit];

    }
}
