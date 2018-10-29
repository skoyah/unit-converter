<?php

return [

    'aliases' => [

        'kelvin' => 'k',
        'celsius' => 'c',
        'fahrenheit' => 'f',

    ],

    'formulas' => [

        'k' => 1,
        'c' => function ($value, $toBaseUnit = false) {
            return $toBaseUnit ? $value + 273.15
                : $value - 273.15;
        },
        'f' => function ($value, $toBaseUnit = false) {
            return $toBaseUnit ? ($value + 459.67) * 5 / 9
                : ($value * 9 / 5) - 459.67;
        },

    ],

];
