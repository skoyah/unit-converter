<?php

namespace Skoyah\Converter;

use Skoyah\Converter\Exceptions\InvalidUnitException;
use Skoyah\Converter\Exceptions\NotFoundException;

abstract class Unit
{
    protected $conversionLookup;
    protected $abbreviations;

    /**
     * Default decimal points.
     *
     * @var integer $decimals
     */
    protected $decimals = 6;

    /**
     * The unit quantity.
     *
     * @var int $quantity
     */
    protected $quantity;

    /**
     * The unit type defined upon instantiation.
     *
     * @var string $unit
     */
    protected $unit;

    /**
     * The base unit value used for all conversions.
     *
     * @var int $baseUnit
     */
    protected $baseUnit;

    public function __construct($quantity, $unit)
    {
        $this->quantity = $quantity;
        $this->loadConfig();
        $this->validateUnit($unit);
        $this->createBaseUnit();
    }

    /**
     * Handle calls to unit conversions.
     *
     * @param string $method
     * @param array $arguments
     * @return integer|float
     */
    public function __call($method, $arguments)
    {
        $key = strtolower(substr($method, 2));

        if (!array_key_exists($key, $this->abbreviations)) {
            throw new InvalidUnitException(sprintf('The %s measuring unit is not valid.', $key));
        }

        return $this->convertTo($this->abbreviations[$key]);
    }

    /**
     * Validates the unit of measurement provided during instantiation.
     *
     * @param string $unit
     */
    protected function validateUnit($unit)
    {
        if (!array_key_exists($unit, $this->conversionLookup)) {
            throw new InvalidUnitException(sprintf('The [%s] unit is not valid.', $unit));
        }
        $this->unit = strtolower($unit);
    }

    /**
     * Set the decimal points.
     *
     * @param integer $decimals
     * @return integer
     */
    public function setDecimals($decimals)
    {
        return $this->decimals = $decimals;
    }

    /**
     * Get the decimal points.
     *
     * @return integer
     */
    public function getDecimals()
    {
        return $this->decimals;
    }

    protected function loadConfig()
    {
        $configArray = require 'config/units.php';

        if (!array_key_exists($this->configKey, $configArray)) {
            throw new NotFoundException("The [{$this->config}] key does not exist in the config file.");
        }

        $this->conversionLookup = $configArray[$this->configKey];

        $this->abbreviations = $this->loadAbbreviations();
    }

    protected function loadAbbreviations()
    {
        $abbreviations = require 'config/abbreviations.php';

        if (!array_key_exists($this->configKey, $abbreviations)) {
            throw new InvalidUnitException(sprintf('The %s key does not exist in the abbreviations file.', $this->configKey));
        };
        return $abbreviations[$this->configKey];
    }

    public function convertTo($unit)
    {
        if (!array_key_exists($unit, $this->conversionLookup)) {
            throw new InvalidUnitException("The [{$unit}] measuring unit does not exist.");
        }

        if (is_callable($this->conversionLookup[$unit])) {
            return $this->conversionLookup[$unit]($this->baseUnit);
        }

        return round($this->baseUnit / $this->conversionLookup[$unit], $this->decimals);
    }

    private function createBaseUnit()
    {
        if (is_callable($this->conversionLookup[$this->unit])) {
            return $this->baseUnit = $this->conversionLookup[$this->unit]($this->quantity, true);
        }

        return $this->baseUnit = $this->quantity * $this->conversionLookup[$this->unit];
    }
}
