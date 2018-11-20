<?php

return [

    'area' => [
        'base' => 'square meters',
        'aliases' => [
            'square millimeters' => 'mm2',
            'square centimeters' => 'cm2',
            'square meters' => 'm2',
            'square kilometers' => 'km2',
            'square inches' => 'in2',
            'square feet' => 'ft2',
            'square yards' => 'yd2',
        ],
        'formulas' => [
            'mm2' => 0.000001,
            'cm2' => 0.0001,
            'm2' => 1,
            'km2' => 1000000,
            'in2' => 0.000645,
            'ft2' => 0.092903,
            'yd2' => 0.836127,
        ],
    ],

    'length' => [
        'base' => 'meters',
        'aliases' => [
            'millimeters' => 'mm',
            'centimeters' => 'cm',
            'decimeters' => 'dm',
            'meters' => 'm',
            'kilometers' => 'km',
            'inches' => 'in',
            'feet' => 'ft',
            'yards' => 'yd',
            'miles' => 'mi',
            'nautical miles' => 'nmi',
        ],
        'formulas' => [
            'mm' => 0.001,
            'cm' => 0.01,
            'dm' => 0.1,
            'm' => 1,
            'km' => 1000,
            'in' => 0.0254,
            'ft' => 0.3048,
            'yd' => 0.9144,
            'mi' => 1609.344,
            'nmi' => 1852,
        ],
    ],

    'mass' => [
        'base' => 'kilograms',
        'aliases' => [
            'tonnes' => 't',
            'grams' => 'g',
            'kilograms' => 'kg',
            'milligrams' => 'mg',
            'pounds' => 'lbs',
            'ounces' => 'oz',
        ],
        'formulas' => [
            't' => 1000,
            'kg' => 1,
            'g' => 0.001,
            'mg' => 0.000001,
            'lbs' => 0.45359237,
            'oz' => 0.0283495231,
        ],
    ],

    'pressure' => [
        'base' => 'pascals',
        'aliases' => [
            'bars' => 'bar',
            'pascals' => 'pa',
            'kilopascals' => 'kpa',
            'atmospheres' => 'atm',
            'millibars' => 'mbar',
        ],
        'formulas' => [
            'bar' => 100000,
            'pa' => 1,
            'kpa' => 0.001,
            'psi' => 6894.7572932,
            'ksi' => 6894757.2932,
            'atm' => 101325,
            'mbar' => 100,
            'mpa' => 0.001
        ],
    ],

    'temperature' => [
        'base' => 'kelvin',
        'aliases' => [
            'kelvin' => 'k',
            'celsius' => 'c',
            'fahrenheit' => 'f',
        ],
        'formulas' => [
            'k' => 1,
            'c' => function ($value, $toBaseUnit = false) {
                return $toBaseUnit ? $value + 273.15 : $value - 273.15;
            },
            'f' => function ($value, $toBaseUnit = false) {
                return $toBaseUnit ? ($value + 459.67) * 5 / 9 : ($value * 9 / 5) - 459.67;
            },
        ],
    ],

];
