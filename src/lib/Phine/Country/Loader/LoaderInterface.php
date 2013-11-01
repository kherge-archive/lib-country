<?php

namespace Phine\Country\Loader;

use Phine\Country\Country;
use Phine\Country\Subdivision;

/**
 * Defines how a country and subdivision loader class will be implemented.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
interface LoaderInterface
{
    /**
     * Loads all available countries.
     *
     * The list returned is an associative array. The key is the ISO 3166-1
     * alpha-2 code for the country, and the value is an instance of `Country`.
     *
     * @return Country[] A list of countries.
     */
    public function loadCountries();

    /**
     * Loads a country with the ISO 3166-1 alpha-2 code.
     *
     * @param string $code The alpha-2 code.
     *
     * @return Country If a country is found, an instance of `Country` is
     *                 returned. If no country is found, `null` is returned.
     */
    public function loadCountry($code);

    /**
     * Loads a subdivision with the ISO 3166-2 code.
     *
     * The list returned is an associative array. The key is the ISO 3166-2
     * code for the subdivision, and the value is an instance of `Subdivision`.
     *
     * @param string $code The ISO 3166-2 code.
     *
     * @return Subdivision If a subdivision is found, an instance of
     *                     `Subdivision` is returned. If no subdivision
     *                     is found, `null` is returned.
     */
    public function loadSubdivision($code);

    /**
     * Loads all available subdivisions.
     *
     * If an ISO 3166-1 alpha-2 code is provided, only subdivisions for that
     * country will be returned.
     *
     * @param string $code The ISO 3166-1 alpha-2 code to limit to.
     *
     * @return Subdivision[] A list of subdivisions. If an ISO 3166-1 alpha-2
     *                       code is provided and no subdivisions were found,
     *                       an empty array is returned.
     */
    public function loadSubdivisions($code = null);
}
