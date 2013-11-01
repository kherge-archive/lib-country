<small>Phine\Country\Loader</small>

Loader
======

Default loader for countries and subdivisions.

Signature
---------

- It is a(n) **class**.
- It implements the [`LoaderInterface`](../../../Phine/Country/Loader/LoaderInterface.md) interface.

Constants
---------

This class defines the following constants:

- [`COUNTRY_ALL`](#COUNTRY_ALL) &mdash; The XPath query for all countries.
- [`COUNTRY_SPECIFIC`](#COUNTRY_SPECIFIC) &mdash; The XPath query for a specific country.
- [`SUBDIVISION_ALL`](#SUBDIVISION_ALL) &mdash; The XPath query for all subdivisions.
- [`SUBDIVISION_COUNTRY_SPECIFIC`](#SUBDIVISION_COUNTRY_SPECIFIC) &mdash; The XPath query for all subdivisions of a specific country.
- [`SUBDIVISION_SPECIFIC`](#SUBDIVISION_SPECIFIC) &mdash; The XPath query for a specific subdivision.

Methods
-------

The class defines the following methods:

- [`__construct()`](#__construct) &mdash; Sets the country and subdivision file path.
- [`loadCountries()`](#loadCountries) &mdash; Loads all available countries.
- [`loadCountry()`](#loadCountry) &mdash; Loads a country with the ISO 3166-1 alpha-2 code.
- [`loadSubdivision()`](#loadSubdivision) &mdash; Loads a subdivision with the ISO 3166-2 code.
- [`loadSubdivisions()`](#loadSubdivisions) &mdash; Loads all available subdivisions.

### `__construct()` <a name="__construct"></a>

Sets the country and subdivision file path.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$countryFile` (`string`) &mdash; The country XML file path.
    - `$subdivisionFile` (`string`) &mdash; The subdivision XML file path.
- It does not return anything.

### `loadCountries()` <a name="loadCountries"></a>

Loads all available countries.

#### Description

The list returned is an associative array. The key is the ISO 3166-1
alpha-2 code for the country, and the value is an instance of `Country`.

#### Signature

- It is a **public** method.
- _Returns:_ A list of countries.
    - [`Country[]`](../../../Phine/Country/Country.md)

### `loadCountry()` <a name="loadCountry"></a>

Loads a country with the ISO 3166-1 alpha-2 code.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$code` (`string`) &mdash; The alpha-2 code.
- _Returns:_ If a country is found, an instance of `Country` is returned. If no country is found, `null` is returned.
    - [`Country`](../../../Phine/Country/Country.md)

### `loadSubdivision()` <a name="loadSubdivision"></a>

Loads a subdivision with the ISO 3166-2 code.

#### Description

The list returned is an associative array. The key is the ISO 3166-2
code for the subdivision, and the value is an instance of `Subdivision`.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$code` (`string`) &mdash; The ISO 3166-2 code.
- _Returns:_ If a subdivision is found, an instance of `Subdivision` is returned. If no subdivision is found, `null` is returned.
    - [`Subdivision`](../../../Phine/Country/Subdivision.md)

### `loadSubdivisions()` <a name="loadSubdivisions"></a>

Loads all available subdivisions.

#### Description

If an ISO 3166-1 alpha-2 code is provided, only subdivisions for that
country will be returned.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$code` (`string`) &mdash; The ISO 3166-1 alpha-2 code to limit to.
- _Returns:_ A list of subdivisions. If an ISO 3166-1 alpha-2 code is provided and no subdivisions were found, an empty array is returned.
    - [`Subdivision[]`](../../../Phine/Country/Subdivision.md)

