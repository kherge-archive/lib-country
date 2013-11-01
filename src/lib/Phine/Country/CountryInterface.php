<?php

namespace Phine\Country;

/**
 * Defines how a country class must be implemented.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
interface CountryInterface
{
    /**
     * Returns the ISO 3166-1 alpha-2 code.
     *
     * @return string The alpha-2 code.
     */
    public function getAlpha2Code();

    /**
     * Returns the ISO 3166-1 alpha-3 code.
     *
     * @return string The alpha-3 code.
     */
    public function getAlpha3Code();

    /**
     * Returns the ISO 3166-1 English long name.
     *
     * @return string The long name.
     */
    public function getLongName();

    /**
     * Returns the ISO 3166-1 numeric code.
     *
     * @return integer The numeric code.
     */
    public function getNumericCode();

    /**
     * Returns the ISO 3166-1 English short name.
     *
     * @return string The short name.
     */
    public function getShortName();
}
