<?php

namespace Phine\Country;

/**
 * Manages the data for an individual subdivision.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class Subdivision implements SubdivisionInterface
{
    /**
     * The ISO 3166-2 code.
     *
     * @var string
     */
    private $code;

    /**
     * The ISO 3166-2 name.
     *
     * @var string
     */
    private $name;

    /**
     * Sets the attributes of this subdivision.
     *
     * @param string $code The ISO 3166-2 code.
     * @param string $name The ISO 3166-2 name.
     */
    public function __construct($code, $name)
    {
        $this->code = $code;
        $this->name = $name;
    }

    /**
     * {@inheritDoc}
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }
}
