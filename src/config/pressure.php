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
        'bars' => 'bar',
        'pascals' => 'pa',
        'kilopascals' => 'kpa',
        'atmospheres' => 'atm',
        'millibars' => 'mbar',
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
        'bar' => 100000,
        'pa' => 1, // SI Unit
        'kpa' => 0.001,
        'psi' => 6894.7572932,
        'ksi' => 6894757.2932,
        'atm' => 101325,
        'mbar' => 100,
        'mpa' => 0.001
    ],

];
