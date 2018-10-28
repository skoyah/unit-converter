<?php

namespace Skoyah\Converter;

use Skoyah\Converter\Exceptions\InvalidUnitException;

abstract class Unit
{
    /**
     * Array of convertions.
     *
     * @var array $lookup
     */
    protected $lookup;

    /**
     * Array of units and its abbreviations.
     *
     * @var array $abbreviations
     */
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

    /**
     * Sets the core properties.
     *
     * @param integer $quantity
     * @param string $unit
     */
    public function __construct($quantity, $unit)
    {
        $this->quantity = $quantity;
        $this->loadConfig();
        $this->validateUnit($unit);
        $this->createConverterUnit();
    }

    /**
     * Gets the configuration settings for the specified unit type.
     */
    private function loadConfig()
    {
        $config = require 'config/units.php';
        $abbreviations = require 'config/abbreviations.php';

        $this->lookup = $config[$this->configKey];
        $this->abbreviations = $abbreviations[$this->configKey];
    }

    /**
     * Validates and formats the unit type provided during instantiation.
     *
     * @param string $unit
     */
    private function validateUnit($unit)
    {
        if (! array_key_exists($unit, $this->lookup)) {
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

    /**
     * Executes the convertion.
     *
     * @param integer $unit
     * @return integer|float
     */
    public function convertTo($unit)
    {
        if ($this->isAlias($unit)) {
            $unit = $this->abbreviations[$unit];
        }

        if (! array_key_exists($unit, $this->lookup)) {
            throw new InvalidUnitException(sprintf('The %s measuring unit does not exist.'), $unit);
        }

        if (is_callable($this->lookup[$unit])) {
            return $this->lookup[$unit]($this->baseUnit);
        }

        return round($this->baseUnit / $this->lookup[$unit], $this->decimals);
    }

    /**
     * Sets the unit to be used for all conversions.
     *
     * @return integer|float
     */
    private function createConverterUnit()
    {
        if (is_callable($this->lookup[$this->unit])) {
            $this->baseUnit = $this->lookup[$this->unit]($this->quantity, true);
        }

        $this->baseUnit = $this->quantity * $this->lookup[$this->unit];
    }

    /**
     * Verifies if intended unit belongs has an abbreviation.
     *
     * @param string $unit
     * @return boolean
     */
    private function isAlias($unit)
    {
        return array_key_exists($unit, $this->abbreviations);
    }
}
