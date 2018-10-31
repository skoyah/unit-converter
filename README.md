# Unit Converter

Unit Converter is a PHP library that makes unit converting a fairly simple an intuitive process.

<a href="https://travis-ci.org/skoyah/unit-converter"><img src="https://travis-ci.org/skoyah/unit-converter.svg" alt="Build Status"></a>
[![Latest Stable Version](https://poser.pugx.org/skoyah/unit-converter/v/stable)](https://packagist.org/packages/skoyah/unit-converter)
[![License](https://poser.pugx.org/skoyah/unit-converter/license)](https://packagist.org/packages/skoyah/unit-converter)
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

First, create a new instance of the desired type and import the related class, and then use ```to()```method to convert to a specific unit.
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


## Support
Currently, the Unit Converter supports the following types:
<ul>
    <li>Mass</li>
    <li>Length - <em><strong>New</strong></em></li>
    <li>Temperature</li>
</ul>

## License
Unit Converter is released under the MIT Licence. Read the LICENSE.md file for more details.
