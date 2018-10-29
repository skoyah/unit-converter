<?php

namespace Skoyah\Converter;

use Skoyah\Converter\Exceptions\InvalidUnitException;
use Skoyah\Converter\Exceptions\FileNotFoundException;

abstract class Unit
{
    /**
     * Array of convertions.
     *
     * @var array $lookup
     */
    protected $formulas;

    /**
     * Array of units and its aliases.
     *
     * @var array $abbreviations
     */
    protected $aliases;

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
    protected $base;

    /**
     * Sets the core properties.
     *
     * @param integer $quantity
     * @param string $unit
     */
    public function __construct($quantity, $unit)
    {
        $this->quantity = $quantity;
        $this->loadAttributes();
        $this->unit = $this->validate($unit);
        $this->base = $this->calculateBaseUnit();
    }

    /**
     * Gets the configuration settings for the specified unit type.
     */
    private function loadAttributes()
    {
        if (! file_exists(__DIR__ . "/config/{$this->configKey}.php")) {
            throw new FileNotFoundException(sprintf('Uknown config file [%s.php].', $this->configKey));
        }

        $config = require "config/{$this->configKey}.php";

        $this->aliases = $config['aliases'];
        $this->formulas = $config['formulas'];
    }

    /**
     * Validates and formats the unit type provided during instantiation.
     *
     * @param string $unit
     * @return string
     */
    private function validate($unit)
    {
        if ($this->isAlias($unit)) {
            $unit = $this->aliases[$unit];
        }

        if (!array_key_exists($unit, $this->formulas)) {
            throw new InvalidUnitException(sprintf('The [%s] unit is not valid.', $unit));
        }
        return strtolower($unit);
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
     * @param string $unit
     * @return integer|float
     */
    public function convertTo($unit)
    {
        if ($this->isAlias($unit)) {
            $unit = $this->aliases[$unit];
        }

        if (!array_key_exists($unit, $this->formulas)) {
            throw new InvalidUnitException(sprintf('The %s measuring unit does not exist.'), $unit);
        }

        if (is_callable($this->formulas[$unit])) {
            return $this->formulas[$unit]($this->base);
        }

        return round($this->base / $this->formulas[$unit], $this->decimals);
    }

    /**
     * Sets the unit to be used for all conversions.
     *
     * @return integer|float
     */
    private function calculateBaseUnit()
    {
        if (is_callable($this->formulas[$this->unit])) {
            return $this->formulas[$this->unit]($this->quantity, true);
        }

        return $this->quantity * $this->formulas[$this->unit];
    }

    /**
     * Verifies if intended unit belongs has an abbreviation.
     *
     * @param string $unit
     * @return boolean
     */
    private function isAlias($unit)
    {
        return array_key_exists($unit, $this->aliases);
    }
}
