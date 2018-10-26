<?php

namespace Skoyah\Converter;

use Skoyah\Converter\Exceptions\InvalidUnitException;
use Skoyah\Converter\Exceptions\NotFoundException;

abstract class Converter
{
    protected $lookup;
    protected $quantity;
    protected $unit;
    protected $decimals = 3;
    protected $pivot;
    protected $abbreviations;

    public function __construct($quantity, $unit)
    {
        $this->quantity = $quantity;
        $this->lookup = $this->loadConfig();
        $this->abbreviations = $this->loadAbbreviations();
        $this->unit = $this->formatUnit($unit);
        $this->pivot = $this->createPivot();
    }

    public function __call($name, $arguments)
    {
        $action = substr($name, 0, 2);
        $key = strtolower(substr($name, 2));

        if (! array_key_exists($key, $this->abbreviations)) {
            throw new InvalidUnitException(sprintf('The %s measuring unit is not valid.', $key));
        }

        return $this->convertTo($this->abbreviations[$key]);
    }

    protected function formatUnit($unit)
    {
        if (! array_key_exists($unit, $this->lookup)) {
            throw new InvalidUnitException(sprintf('The [%s] unit is not valid.', $unit));
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
        $lookup = require('config/units.php');

        if (! array_key_exists($this->config, $lookup)) {
            throw new NotFoundException("The [{$this->config}] key does not exist in the config file.");
        }

        return $lookup[$this->config];
    }

    protected function loadAbbreviations()
    {
        $abbreviations = require('config/abbreviations.php');

        return $abbreviations[$this->config];
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
