<small>Phine\Country\Exception</small>

XmlException
============

Exception thrown for XML related errors.

Signature
---------

- It is a(n) **class**.
- It is a subclass of `Phine\Exception\Exception`.

Methods
-------

The class defines the following methods:

- [`createUsingErrors()`](#createUsingErrors) &mdash; Creates a new exception using an array of `libXMLError` instances.

### `createUsingErrors()` <a name="createUsingErrors"></a>

Creates a new exception using an array of `libXMLError` instances.

#### Signature

- It is a **public static** method.
- It accepts the following parameter(s):
    - `$errors` (`array`) &mdash; A list of errors.
- _Returns:_ A new exception.
    - [`XmlException`](../../../Phine/Country/Exception/XmlException.md)

