<?php

namespace Skoyah\Converter;

use Skoyah\Converter\Traits\Validator;

abstract class BaseUnit
{
    use Validator;

    /**
     * The configuration settings.
     *
     * @var array
     */
    protected $config;

    /**
     * The unit quantity.
     *
     * @var int
     */
    protected $quantity;

    /**
     * The type of unit defined upon instantiation.
     *
     * @var string
     */
    protected $unit;

    /**
     * The base unit value used for all conversions.
     *
     * @var int
     */
    protected $base;

    /**
     * Number of decimal units to be included on the converted result.
     *
     * @var int
     */
    protected $decimals;

    /**
     * Constants to specify the mode in which rounding occurs.
     */
    protected $roundMode = PHP_ROUND_HALF_UP;

    /**
     * Sets the core properties.
     *
     * @param int $quantity
     * @param string $unit
     */
    public function __construct($quantity, $unit)
    {
        $this->loadConfig();
        $this->quantity = $this->validateQuantity($quantity);
        $this->unit = $this->validateUnit($unit);
        $this->base = $this->calculateBaseUnit();
    }

    /**
     * Gets the configuration settings for the specified unit type.
     */
    private function loadConfig()
    {
        $config = require "config.php";

        if (! array_key_exists($this->configKey, $config)) {
            throw new \Exception("The \$configKey [{$this->configKey}] provided does not exist in the configuration file.");
        }

        $this->config = $config[$this->configKey];
    }

    /**
     * Sets the unit to be used for all conversions.
     *
     * @return int|float
     */
    private function calculateBaseUnit()
    {
        return is_callable($this->config['formulas'][$this->unit])
            ? $this->config['formulas'][$this->unit]($this->quantity, true)
            : $this->quantity * $this->config['formulas'][$this->unit];
    }

    /**
     * Executes the convertion.
     *
     * @param string $unit
     * @return int|float
     */
    public function to($unit)
    {
        $unit = strtolower($unit);

        $this->guardAgainstInvalidUnit($unit);

        return $this->isAlias($unit)
            ? $this->calculate($this->config['aliases'][$unit], $this->roundMode)
            : $this->calculate($unit, $this->roundMode);
    }

    /**
     * Calculates the convertion.
     *
     * @param string $unit
     * @param int|null $precision
     * @return int|float
     */
    private function calculate($unit, $mode)
    {
        if (is_callable($this->config['formulas'][$unit])) {
            if (isset($this->decimals)) {
                return round($this->config['formulas'][$unit]($this->base), $this->decimals, $mode);
            }
            return $this->config['formulas'][$unit]($this->base);
        }

        return isset($this->decimals)
            ? round($this->base / $this->config['formulas'][$unit], $this->decimals, $mode)
            : $this->base / $this->config['formulas'][$unit];
    }

    /**
     * Checks if the unit has an abbreviation.
     *
     * @param string $unit
     * @return boolean
     */
    private function isAlias($unit)
    {
        return array_key_exists($unit, $this->config['aliases']);
    }

    /**
     * Checks if unit has a conversion formula.
     *
     * @param [type] $unit
     * @return boolean
     */
    private function hasFormula($unit)
    {
        return array_key_exists($unit, $this->config['formulas']);
    }

    /**
     * Gets the base unit to be used on convertions for the current unit type.
     *
     * @return string
     */
    public function base()
    {
        return $this->config['base'];
    }

    /**
     * Checks if the provided unit exists in the configuration file.
     *
     * @param string $unit
     * @return void
     */
    private function guardAgainstInvalidUnit($unit)
    {
        if (! $this->isAlias($unit) && ! $this->hasFormula($unit)) {
            throw new \Exception("Unknown unit type: [{$unit}] in the configuration file.");
        }
    }

    /**
     * Sets the number of decimals to be included on the result.
     *
     * @param int $decimals
     * @return void
     */
    public function withDecimals($decimals)
    {
        $this->validateDecimals($decimals);

        $this->decimals = $decimals;

        return $this;
    }
}
