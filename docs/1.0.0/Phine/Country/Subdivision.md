<small>Phine\Country</small>

Subdivision
===========

Manages the data for an individual subdivision.

Signature
---------

- It is a(n) **class**.
- It implements the [`SubdivisionInterface`](../../Phine/Country/SubdivisionInterface.md) interface.

Methods
-------

The class defines the following methods:

- [`__construct()`](#__construct) &mdash; Sets the attributes of this subdivision.
- [`getCode()`](#getCode) &mdash; Returns the ISO 3166-2 code.
- [`getName()`](#getName) &mdash; Returns the ISO 3166-2 name.

### `__construct()` <a name="__construct"></a>

Sets the attributes of this subdivision.

#### Signature

- It is a **public** method.
- It accepts the following parameter(s):
    - `$code` (`string`) &mdash; The ISO 3166-2 code.
    - `$name` (`string`) &mdash; The ISO 3166-2 name.
- It does not return anything.

### `getCode()` <a name="getCode"></a>

Returns the ISO 3166-2 code.

#### Signature

- It is a **public** method.
- _Returns:_ The ISO 3166-2 code.
    - `string`

### `getName()` <a name="getName"></a>

Returns the ISO 3166-2 name.

#### Signature

- It is a **public** method.
- _Returns:_ The short name.
    - `string`

