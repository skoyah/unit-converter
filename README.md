# Unit Converter

Unit Converter is a PHP library that makes unit converting a fairly simple an intuitive process.

<a href="https://travis-ci.org/skoyah/unit-converter"><img src="https://travis-ci.org/skoyah/unit-converter.svg" alt="Build Status"></a>
___
## Table of Contents

1. [Installation](#installation)
2. [Basic Usage](#basic-usage)
3. [Support](#support)
4. [License](#license)

___
## Installation
```bash
$ composer require skoyah/unit-converter
```

## Basic Usage
Once you have loaded the Unit Converter library, converting from one unit of measurement to another is really simple.

First, create a new instance of the desired type and import the related class, and then use one of the available methods.

### Example conversion:
```php
use Skoyah\Converter\Mass;

$mass = new Mass(1, 'kg');
echo $mass->toPounds(); // '2.20462262'
```

Alternatively, you can convert using the ```convertTo()``` method by passing the unit as a parameter:

```php
echo $mass->convertTo('lbs'); // '2.20462262'
```


## Support
Currently, the Unit Converter supports the following types:
<ul>
    <li>Mass</li>
    <li>Temperature</li>
</ul>

## License
Unit Converter is released under the MIT Licence. Read the LICENSE.md file for details.
