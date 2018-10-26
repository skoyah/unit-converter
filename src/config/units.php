<?php

return [
    'mass' => [
        't' => 1000,
        'kg' => 1,
        'g' => 0.001,
        'mg' => 0.000001,
        'lbs' => 0.45359237,
        'oz' => 0.0283495231
    ],
    'temperature' => [
        'k' => 1,
        'c' => function ($value, $toBaseUnit = false) {
            return $toBaseUnit ? $value + 273.15
                               : $value - 273.15;
        },
        'f' => function ($value, $toBaseUnit = false) {
            return $toBaseUnit ? ($value + 459.67) * 5 / 9
                               : ($value * 9 / 5) - 459.67 ;
        }
    ]
];
