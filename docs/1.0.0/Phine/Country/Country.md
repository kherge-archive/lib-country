<small>Phine\Country</small>

Country
=======

Manages the data of an individual country.

Signature
---------

- It is a(n) **class**.
- It implements the [`CountryInterface`](../../Phine/Country/CountryInterface.md) interface.

Methods
-------

The class defines the following methods:

- [`__construct()`](#__construct) &mdash; Sets the attributes of this country.
- [`getAlpha2Code()`](#getAlpha2Code) &mdash; Returns the ISO 3166-1 alpha-2 code.
- [`getAlpha3Code()`](#getAlpha3Code) &mdash; Returns the ISO 3166-1 alpha-3 code.
- [`getLongName()`](#getLongName) &mdash; Returns the ISO 3166-1 English long name.
- [`getNumericCode()`](#getNumericCode) &mdash; Returns the ISO 3166-1 numeric code.
- [`getShortName()`](#getShortName) &mdash; Returns the ISO 3166-1 English short name.

### `__construct()` <a name="__construct"></a>

Sets the attributes of this country.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$alpha2Code` (`string`) &mdash; The ISO 3166-1 alpha-2 code.
    - `$alpha3Code` (`string`) &mdash; The ISO 3166-1 alpha-3 code.
    - `$longName` (`string`) &mdash; The ISO 3166-1 English long name.
    - `$numericCode` (`integer`) &mdash; The ISO 3166-1 numeric code.
    - `$shortName` (`string`) &mdash; The ISO 3166-1 English short name.
- It does not return anything.

### `getAlpha2Code()` <a name="getAlpha2Code"></a>

Returns the ISO 3166-1 alpha-2 code.

#### Signature

- It is a **public** method.
- _Returns:_ The alpha-2 code.
    - `string`

### `getAlpha3Code()` <a name="getAlpha3Code"></a>

Returns the ISO 3166-1 alpha-3 code.

#### Signature

- It is a **public** method.
- _Returns:_ The alpha-3 code.
    - `string`

### `getLongName()` <a name="getLongName"></a>

Returns the ISO 3166-1 English long name.

#### Signature

- It is a **public** method.
- _Returns:_ If the long name is available, it is returned. If the long name is not available, nothing (`null`) is returned.
    - `string`

### `getNumericCode()` <a name="getNumericCode"></a>

Returns the ISO 3166-1 numeric code.

#### Signature

- It is a **public** method.
- _Returns:_ The numeric code.
    - `integer`

### `getShortName()` <a name="getShortName"></a>

Returns the ISO 3166-1 English short name.

#### Signature

- It is a **public** method.
- _Returns:_ The short name.
    - `string`

