Country
=======

[![Build Status][]](https://travis-ci.org/phine/lib-country)
[![Coverage Status][]](https://coveralls.io/r/phine/lib-country)
[![Latest Stable Version][]](https://packagist.org/packages/phine/country)
[![Total Downloads][]](https://packagist.org/packages/phine/country)

A PHP library for country and subdivision data.

Usage
-----

```php
use Herrera\Country\Loader\Loader;

$loader = new Loader();

// returns data for "US"
$country = $loader->loadCountry('US');

echo $country->getAlpha2Code(); // "US"
echo $country->getAlpha3Code(); // "USA"
echo $country->getLongName(); // "United States of America"
echo $country->getNumericCode(); // "840"
echo $country->getShortName(); // "United States"

// returns all countries
$countries = $loader->loadCountries();

$country = $countries['US'];

// returns data for "US-CA"
$subdivision = $loader->loadSubdivision('US-CA');

echo $subdivision->getCode(); // "US-CA"
echo $subdivision->getName(); // "California"

// returns all subdivisions
$subdivisions = $loader->loadSubdivisions();

$subdivision = $subdivisions['US-CA'];

// returns all subdivisions for a specific country
$subdivisions = $loader->loadSubdivisions('US');
```

Requirement
-----------

- PHP >= 5.3.3
- [Phine Exception][] >= 1.0

Installation
------------

Via [Composer][]:

    $ composer require "phine/country=~1.0"

Documentation
-------------

You can find the documentation in the [`docs/`](docs/) directory.

License
-------

This library is available under the [MIT license](LICENSE).

[Build Status]: https://travis-ci.org/phine/lib-country.png?branch=master
[Coverage Status]: https://coveralls.io/repos/phine/lib-country/badge.png
[Latest Stable Version]: https://poser.pugx.org/phine/country/v/stable.png
[Total Downloads]: https://poser.pugx.org/phine/country/downloads.png
[Phine Exception]: https://github.com/phine/lib-exception
[Composer]: http://getcomposer.org/
