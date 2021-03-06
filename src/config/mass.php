<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Pressure Aliases
    |--------------------------------------------------------------------------
    |
    | Each unit and its associated abbreviation.
    |
    */

    'aliases' => [
        'tonnes' => 't',
        'kilograms' => 'kg',
        'grams' => 'g',
        'milligrams' => 'mg',
        'pounds' => 'lbs',
        'ounces' => 'oz',
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
        't' => 1000,
        'kg' => 1, // SI Unit
        'g' => 0.001,
        'mg' => 0.000001,
        'lbs' => 0.45359237,
        'oz' => 0.0283495231,
    ],
];
