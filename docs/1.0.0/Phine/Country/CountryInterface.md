<small>Phine\Country</small>

CountryInterface
================

Defines how a country class must be implemented.

Signature
---------

- It is a(n) **interface**.

Methods
-------

The interface defines the following methods:

- [`getAlpha2Code()`](#getAlpha2Code) &mdash; Returns the ISO 3166-1 alpha-2 code.
- [`getAlpha3Code()`](#getAlpha3Code) &mdash; Returns the ISO 3166-1 alpha-3 code.
- [`getLongName()`](#getLongName) &mdash; Returns the ISO 3166-1 English long name.
- [`getNumericCode()`](#getNumericCode) &mdash; Returns the ISO 3166-1 numeric code.
- [`getShortName()`](#getShortName) &mdash; Returns the ISO 3166-1 English short name.

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

