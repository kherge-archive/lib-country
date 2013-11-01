<?php

namespace Phine\Country\Loader;

use DOMDocument;
use DOMElement;
use DOMXPath;
use Phine\Country\Country;
use Phine\Country\Exception\XmlException;
use Phine\Country\Subdivision;

/**
 * Default loader for countries and subdivisions.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class Loader implements LoaderInterface
{
    /**
     * The XPath query for all countries.
     */
    const COUNTRY_ALL = '/iso_3166_entries/iso_3166_entry';

    /**
     * The XPath query for a specific country.
     */
    const COUNTRY_SPECIFIC = '/iso_3166_entries/iso_3166_entry[@alpha_2_code="%s"]';

    /**
     * The XPath query for all subdivisions.
     */
    const SUBDIVISION_ALL = '/iso_3166_2_entries/iso_3166_country/iso_3166_subset/iso_3166_2_entry[not(@parent)]';

    /**
     * The XPath query for all subdivisions of a specific country.
     */
    const SUBDIVISION_COUNTRY_SPECIFIC = '/iso_3166_2_entries/iso_3166_country[@code="%s"]/iso_3166_subset/iso_3166_2_entry[not(@parent)]';

    /**
     * The XPath query for a specific subdivision.
     */
    const SUBDIVISION_SPECIFIC = '/iso_3166_2_entries/iso_3166_country/iso_3166_subset/iso_3166_2_entry[not(@parent) and @code="%s"]';

    /**
     * The country XPath object.
     *
     * @var DOMXPath
     */
    private $country;

    /**
     * The country XML file path.
     *
     * @var string
     */
    private $countryFile;

    /**
     * The subdivision XPath object.
     *
     * @var DOMXPath
     */
    private $subdivision;

    /**
     * The subdivision XML file path.
     *
     * @var string
     */
    private $subdivisionFile;

    /**
     * Sets the country and subdivision file path.
     *
     * @param string $countryFile     The country XML file path.
     * @param string $subdivisionFile The subdivision XML file path.
     */
    public function __construct($countryFile = null, $subdivisionFile = null)
    {
        if (null === $countryFile) {
            $countryFile = realpath(__DIR__ . '/../../../../../data/iso-3166-1.xml');
        }

        if (null === $subdivisionFile) {
            $subdivisionFile = realpath(__DIR__ . '/../../../../../data/iso-3166-2.xml');
        }

        $this->countryFile = $countryFile;
        $this->subdivisionFile = $subdivisionFile;
    }

    /**
     * {@inheritDoc}
     */
    public function loadCountries()
    {
        $countries = array();
        $elements = $this->getCountry()->query(self::COUNTRY_ALL);

        for ($i = 0; $element = $elements->item($i); $i++) {
            /** @var DOMElement $element */
            $country = $this->createCountry($element);

            $countries[$country->getAlpha2Code()] = $country;
        }

        return $countries;
    }

    /**
     * {@inheritDoc}
     */
    public function loadCountry($code)
    {
        $elements = $this->getCountry()->query(
            sprintf(self::COUNTRY_SPECIFIC, $code)
        );

        if ($elements->length) {
            /** @noinspection PhpParamsInspection */
            return $this->createCountry($elements->item(0));
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function loadSubdivision($code)
    {
        $elements = $this->getSubdivision()->query(
            sprintf(self::SUBDIVISION_SPECIFIC, $code)
        );

        if ($elements->length) {
            /** @noinspection PhpParamsInspection */
            return $this->createSubdivision($elements->item(0));
        }

        return null;
    }

    /**
     * {@inheritDoc}
     */
    public function loadSubdivisions($code = null)
    {
        if ($code) {
            $xpath = sprintf(self::SUBDIVISION_COUNTRY_SPECIFIC, $code);
        } else {
            $xpath = self::SUBDIVISION_ALL;
        }

        $subdivisions = array();
        $elements = $this->getSubdivision()->query($xpath);

        for ($i = 0; $element = $elements->item($i); $i++) {
            /** @var DOMElement $element */
            $subdivision = $this->createSubdivision($element);

            $subdivisions[$subdivision->getCode()] = $subdivision;
        }

        return $subdivisions;
    }

    /**
     * Creates a new Country using an XML element.
     *
     * @param DOMElement $element An element.
     *
     * @return Country A new country.
     */
    private function createCountry(DOMElement $element)
    {
        return new Country(
            $element->getAttribute('alpha_2_code'),
            $element->getAttribute('alpha_3_code'),
            $element->getAttribute('official_name'),
            $element->getAttribute('numeric_code'),
            $element->getAttribute('name')
        );
    }

    /**
     * Creates a new Subdivision using an XML element.
     *
     * @param DOMElement $element An element.
     *
     * @return Subdivision A new subdivision.
     */
    private function createSubdivision(DOMElement $element)
    {
        return new Subdivision(
            $element->getAttribute('code'),
            $element->getAttribute('name')
        );
    }

    /**
     * Returns the country XPath object.
     *
     * @return DOMXPath The XPath object.
     */
    private function getCountry()
    {
        if (null === $this->country) {
            $this->country = $this->loadXml($this->countryFile);
        }

        return $this->country;
    }

    /**
     * Returns the subdivision XPath object.
     *
     * @return DOMXPath The XPath object.
     */
    private function getSubdivision()
    {
        if (null === $this->subdivision) {
            $this->subdivision = $this->loadXml($this->subdivisionFile);
        }

        return $this->subdivision;
    }

    /**
     * Loads and validates an XML document from a file for querying.
     *
     * @param string $file The file path.
     *
     * @return DOMXPath The XPath object for querying.
     *
     * @throws XmlException If the file could not be loaded.
     */
    private function loadXml($file)
    {
        $internal = libxml_use_internal_errors(true);

        $doc = new DOMDocument();
        $doc->preserveWhiteSpace = false;
        $doc->validateOnParse = true;

        if (!@$doc->load($file)) {
            $errors = libxml_get_errors();

            libxml_use_internal_errors($internal);

            throw XmlException::createUsingErrors($errors);
        }

        libxml_use_internal_errors($internal);

        return new DOMXPath($doc);
    }
}
