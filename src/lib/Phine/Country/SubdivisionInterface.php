<?php

namespace Phine\Country;

/**
 * Defines how a subdivision class must be implemented.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
interface SubdivisionInterface
{
    /**
     * Returns the ISO 3166-2 code.
     *
     * @return string The ISO 3166-2 code.
     */
    public function getCode();

    /**
     * Returns the ISO 3166-2 name.
     *
     * @return string The short name.
     */
    public function getName();
}
