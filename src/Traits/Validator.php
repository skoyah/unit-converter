<?php

namespace Skoyah\Converter\Traits;

trait Validator
{
    /**
     * Validates the quantity provided during instantiation.
     *
     * @param int|float
     * @return int $quantity
     */
    private function validateQuantity($quantity)
    {
        if (! is_numeric($quantity) || $quantity < 0) {
            throw new \InvalidArgumentException(
                sprintf('The quantity must be a positive number or a numeric string: %s given (%s).', gettype($quantity), $quantity)
            );
        }

        return $quantity;
    }

    /**
     * Validates and formats the unit type provided during instantiation.
     *
     * @param string $unit
     * @return string
     */

    private function validateUnit($unit)
    {
        $unit = strtolower($unit);

        $this->guardAgainstInvalidUnit($unit);

        if ($this->isAlias($unit)) {
            $unit = $this->config['aliases'][$unit];
        }

        return $unit;
    }

    /**
     * Validates the decimal units provided for conversion.
     *
     * @param int|float $decimals
     * @return void
     */
    private function validateDecimals($decimals)
    {
        if (!is_numeric($decimals) || $decimals < 0 || is_float($decimals)) {
            throw new \InvalidArgumentException('Decimals must be a positive integer or a positive numeric string');
        }
    }
}
