<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pressure Formulas
    |--------------------------------------------------------------------------
    |
    | These values represent the convertion of each unit and the base SI Unit.
    |
    */

    'aliases' => [
        'kelvin' => 'k',
        'celsius' => 'c',
        'fahrenheit' => 'f',
    ],

    /*
    |--------------------------------------------------------------------------
    | Pressure Formulas
    |--------------------------------------------------------------------------
    |
    | These values represent the convertion of each unit and the base SI Unit.
    |
    */

    'formulas' => [
        'k' => 1, // SI Unit
        'c' => function ($value, $toBaseUnit = false) {
            return $toBaseUnit ? $value + 273.15 : $value - 273.15;
        },
        'f' => function ($value, $toBaseUnit = false) {
            return $toBaseUnit ? ($value + 459.67) * 5 / 9 : ($value * 9 / 5) - 459.67;
        },
    ],
];
