<?php

namespace Phine\Country;

/**
 * Manages the data of an individual country.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class Country implements CountryInterface
{
    /**
     * The ISO 3166-1 alpha-2 code.
     *
     * @var string
     */
    private $alpha2Code;

    /**
     * The ISO 3166-1 alpha-3 code.
     *
     * @var string
     */
    private $alpha3Code;

    /**
     * The ISO 3166-1 English long name.
     *
     * @var string
     */
    private $longName;

    /**
     * The ISO 3166-1 numeric code.
     *
     * @var integer
     */
    private $numericCode;

    /**
     * The ISO 3166-1 English short name.
     *
     * @var string
     */
    private $shortName;

    /**
     * Sets the attributes of this country.
     *
     * @param string  $alpha2Code  The ISO 3166-1 alpha-2 code.
     * @param string  $alpha3Code  The ISO 3166-1 alpha-3 code.
     * @param string  $longName    The ISO 3166-1 English long name.
     * @param integer $numericCode The ISO 3166-1 numeric code.
     * @param string  $shortName   The ISO 3166-1 English short name.
     */
    public function __construct(
        $alpha2Code,
        $alpha3Code,
        $longName,
        $numericCode,
        $shortName
    ) {
        $this->alpha2Code = $alpha2Code;
        $this->alpha3Code = $alpha3Code;
        $this->longName = $longName;
        $this->numericCode = $numericCode;
        $this->shortName = $shortName;
    }

    /**
     * {@inheritDoc}
     */
    public function getAlpha2Code()
    {
        return $this->alpha2Code;
    }

    /**
     * {@inheritDoc}
     */
    public function getAlpha3Code()
    {
        return $this->alpha3Code;
    }

    /**
     * {@inheritDoc}
     */
    public function getLongName()
    {
        return $this->longName;
    }

    /**
     * {@inheritDoc}
     */
    public function getNumericCode()
    {
        return $this->numericCode;
    }

    /**
     * {@inheritDoc}
     */
    public function getShortName()
    {
        return $this->shortName;
    }
}
