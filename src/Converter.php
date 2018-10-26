<?php

namespace Skoyah\Converter;

use Skoyah\Converter\Exceptions\InvalidUnitException;
use Skoyah\Converter\Exceptions\NotFoundException;

abstract class Converter
{
    protected $conversionLookup;
    protected $abbreviations;
    protected $decimals = 6;
    protected $quantity;
    protected $unit;
    protected $pivot;

    public function __construct($quantity, $unit)
    {
        $this->quantity = $quantity;
        $this->loadConfig();
        $this->formatUnit($unit);
        $this->createPivot();
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
        if (! array_key_exists($unit, $this->conversionLookup)) {
            throw new InvalidUnitException(sprintf('The [%s] unit is not valid.', $unit));
        }
        $this->unit = strtolower($unit);
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
        $configArray = require('config/units.php');

        if (! array_key_exists($this->configKey, $configArray)) {
            throw new NotFoundException("The [{$this->config}] key does not exist in the config file.");
        }

        $this->conversionLookup =  $configArray[$this->configKey];

        $this->abbreviations = $this->loadAbbreviations();
    }

    protected function loadAbbreviations()
    {
        $abbreviations = require('config/abbreviations.php');

        if (! array_key_exists($this->configKey, $abbreviations)) {
            throw new InvalidUnitException(sprintf('The %s key does not exist in the abbreviations file.', $this->configKey));
        };
        return $abbreviations[$this->configKey];
    }

    public function convertTo($unit)
    {
        if (! array_key_exists($unit, $this->conversionLookup)) {
            throw new InvalidUnitException("The [{$unit}] measuring unit does not exist.");
        }

        if (is_callable($this->conversionLookup[$unit])) {

            return $this->conversionLookup[$unit]($this->pivot);
        }

        return round($this->pivot / $this->conversionLookup[$unit], $this->decimals);
    }

    private function createPivot()
    {
        if (is_callable($this->conversionLookup[$this->unit])) {
            return $this->pivot = $this->conversionLookup[$this->unit]($this->quantity, true);
        }

        return $this->pivot = $this->quantity * $this->conversionLookup[$this->unit];
    }
}
