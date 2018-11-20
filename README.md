# Unit Converter

Unit Converter is a PHP library that makes unit converting a fairly simple an intuitive process.

[![Build Status](https://travis-ci.org/skoyah/unit-converter.svg?branch=master)](https://travis-ci.org/skoyah/unit-converter)
[![Latest Stable Version](https://poser.pugx.org/skoyah/unit-converter/v/stable)](https://packagist.org/packages/skoyah/unit-converter)
[![License](https://poser.pugx.org/skoyah/unit-converter/license)](https://packagist.org/packages/skoyah/unit-converter)
[![StyleCI](https://github.styleci.io/repos/154382621/shield?branch=master)](https://github.styleci.io/repos/154382621)
___
## Table of Contents

1. [Installation](#installation)
2. [Basic Usage](#basic-usage)
3. [Support](#support)
4. [Configuration](#configuration)
5. [Code of Conduct](#code-of-conduct)
6. [License](#license)

___
## Installation
```bash
$ composer require skoyah/unit-converter
```

## Basic Usage
### Namespacing
The Unit Converter library is under ```Skoyah\Converter``` namespace.

Once you have installed the Unit Converter library, converting from one unit of measurement to another is really simple.

First, create a new instance of the desired type and import the related class.
The instance needs to accept two parameters -  1) a boolean for the quantity, and 2) a string for the unit of measurement.

Next, all you need is to call a ```to()``` method and pass in the parameter for the convertion.

### Example conversion:
```php
use Skoyah\Converter\Units\Mass;

$mass = new Mass(1, 'kg');
echo $mass->to('pounds'); // '2.20462262'
```

Alternatively, you can convert using the unit abbreviation as a parameter:

```php
echo $mass->to('lbs'); // '2.20462262'
```

The ```to()``` method has also an optional parameter tor defining how many decimal units should be displayed for the given convertion.

```php
echo $mass->to('lbs', 2); // '2.20'
```

## Support
Currently, the Unit Converter supports the following types:

* [Area](#area-units)
* [Length](#length-units)
* [Mass](#mass-units)
* [Pressure](#pressure-units)
* [Temperature](#temperature-units)


## Configuration
During instantiation or convertion, you have two options for defining the unit to be used.

There is a longform and a short-hand word available for each unit of measure.

For consistency, it is __recommended__ to use lowercase letters, but if you prefer you can use uppercase letters since during instantiation and/or convertion, the unit of measure will be parsed and formatted to lowercase characters.

### Area units
| long               | short   |
| :----------------  | :------ |
|*square kilometers* |    *km2*|
|*square meters*     |     *m2*|
|*square centimeters*|    *cm2*|
|*square millimeters*|    *mm2*|
|*square inches*     |    *in2*|
|*square feet*       |    *ft2*|
|*square yards*      |    *yd2*|

### Length units
| long           | short   |
| :------------- | :------ |
|*kilometers*    |     *km*|
|*meters*        |      *m*|
|*decimeters*    |     *dm*|
|*centimeters*   |     *cm*|
|*millimeters*   |     *mm*|
|*inches*        |     *in*|
|*feet*          |     *ft*|
|*yards*         |     *yd*|
|*miles*         |     *mi*|
|*nautical miles*|    *nmi*|

### Mass units
| long       | short   |
| :--------- | :------ |
|*tonnes*    |     *t* |
|*kilograms* |     *kg*|
|*grams*     |      *g*|
|*milligrams*|     *mg*|
|*pounds*    |    *lbs*|
|*onces*     |     *oz*|

### Pressure units
| long        | short   |
| :---------- | :------ |
|*bars*       |    *bar*|
|*millibars*  |   *mbar*|
|*kilopascals*|    *kpa*|
|*pascals*    |     *pa*|
|*atmospheres*|    *atm*|

### Temperature units
| long       | short   |
| :--------- | :------ |
|*kelvin*    |      *k*|
|*celsius*   |      *c*|
|*fahrenheit*|      *f*|

## Code of Conduct
In order to ensure that the community is welcoming to all, please review and abide by the [Code of Conduct](https://github.com/skoyah/unit-converter/blob/master/CODE_OF_CONDUCT.md).

## License
Unit Converter is released under the MIT Licence. Read the [license](https://github.com/skoyah/unit-converter/blob/master/LICENSE.md) file for more details.
