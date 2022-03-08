<?php
/**
 * The Standard Internation Volume unit
 * @see https://www.nist.gov/pml/weights-and-measures/si-units-volume Volume units
 *
 * Volume is the measure of the 3-dimensional space occupied by matter, or enclosed by a surface, measured in cubic units. The SI unit of volume is the cubic meter (m3), which is a derived unit.
 *
 * @author Angelo Chillemi <info@angelochillemi.com>
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Volumne Formulas
    |--------------------------------------------------------------------------
    |
    | These values represent the convertion of each unit and the base SI Unit.
    |
    */

    'aliases' => [
        'cubic millimeters' => 'mm3',
        'cubic centimeter' => 'cm3',
        'cubic decimeter' => 'dm3',
        'cubic meter' => 'm3',
        'cubic dekameter' => 'dam3',
        'cubic hectometer' => 'hm3',
        'cubic kilometer' => 'km3',
    ],

    /*
    |--------------------------------------------------------------------------
    | Volume Formulas
    |--------------------------------------------------------------------------
    |
    | These values represent the convertion of each unit and the base SI Unit.
    |
    */

    'formulas' => [
        'mm3' => 0.000000001,
        'cm3' => 0.000001,
        'dm3' => 0.001,
        'm3' => 1, // SI Unit
        'dam3' => 1000,
        'hm3' => 1000000,
        'km3' => 1000000000,
    ],
];
