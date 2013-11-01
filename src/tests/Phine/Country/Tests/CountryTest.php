<?php

namespace Phine\Country\Tests;

use Phine\Country\Country;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods in the {@link Country} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class CountryTest extends TestCase
{
    /**
     * The country instance being tested.
     *
     * @var Country
     */
    private $country;

    /**
     * Make sure that we can retrieve the alpha-2 code.
     */
    public function testGetAlpha2Code()
    {
        $this->assertEquals(
            'TS',
            $this->country->getAlpha2Code(),
            'The alpha-2 code "TS" should be returned.'
        );
    }

    /**
     * Make sure that we can retrieve the alpha-3 code.
     */
    public function testGetAlpha3Code()
    {
        $this->assertEquals(
            'TST',
            $this->country->getAlpha3Code(),
            'The alpha-3 code "TST" should be returned.'
        );
    }

    /**
     * Make sure that we can retrieve the long name.
     */
    public function testGetLongName()
    {
        $this->assertEquals(
            'Test Case',
            $this->country->getLongName(),
            'The long name "Test Case" should be returned.'
        );
    }

    /**
     * Make sure that we can retrieve the numeric code.
     */
    public function testGetNumericCode()
    {
        $this->assertEquals(
            123,
            $this->country->getNumericCode(),
            'The numeric code "123" should be returned.'
        );
    }

    /**
     * Make sure that we can retrieve the short name.
     */
    public function testGetShortName()
    {
        $this->assertEquals(
            'Test',
            $this->country->getShortName(),
            'The short name "Test" should be returned.'
        );
    }

    /**
     * Creates a new instance of `Country` for testing.
     */
    protected function setUp()
    {
        $this->country = new Country('TS', 'TST', 'Test Case', 123, 'Test');
    }
}
