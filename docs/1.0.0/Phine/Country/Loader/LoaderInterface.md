<small>Phine\Country\Loader</small>

LoaderInterface
===============

Defines how a country and subdivision loader class will be implemented.

Signature
---------

- It is a(n) **interface**.

Methods
-------

The interface defines the following methods:

- [`loadCountries()`](#loadCountries) &mdash; Loads all available countries.
- [`loadCountry()`](#loadCountry) &mdash; Loads a country with the ISO 3166-1 alpha-2 code.
- [`loadSubdivision()`](#loadSubdivision) &mdash; Loads a subdivision with the ISO 3166-2 code.
- [`loadSubdivisions()`](#loadSubdivisions) &mdash; Loads all available subdivisions.

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

