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
5. [License](#license)

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
use Skoyah\Converter\Mass;

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
<ul>
    <li>Mass</li>
    <li>Temperature</li>
    <li>Length
    <li>Pressure
    <li>Area - <em><strong>New</strong></em></li>
</ul>

## Configuration
For each unit type [supported](#support) by the library, there are 2 files - a configuration file and a class file associated with that unit.

## License
Unit Converter is released under the MIT Licence. Read the LICENSE.md file for more details.
