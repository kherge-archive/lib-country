<?php

namespace Phine\Country\Tests\Loader;

use Phine\Country\Country;
use Phine\Country\Loader\Loader;
use Phine\Country\Subdivision;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods in the {@link Loader} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class LoaderTest extends TestCase
{
    /**
     * The loader instance being tested.
     *
     * @var Loader
     */
    private $loader;

    /**
     * Make sure that we can retrieve all of the countries.
     */
    public function testLoadCountries()
    {
        $countries = $this->loader->loadCountries();

        $this->assertCount(
            249,
            $countries,
            'All of the countries should be returned.'
        );

        $this->checkCountry($countries['US']);
    }

    /**
     * Make sure that we can retrieve a specific country.
     *
     * In addition to verifying that the country is returned, we also need
     * to make sure that all of the data has been properly set. Also, if a
     * country is not found, nothing (`null`) should be returned.
     */
    public function testLoadCountry()
    {
        $this->checkCountry($this->loader->loadCountry('US'));

        $this->assertNull(
            $this->loader->loadCountry('TEST'),
            'No country should be returned.'
        );
    }

    /**
     * Make sure that an exception is thrown if we cannot load an XML file.
     */
    public function testLoadFail()
    {
        $loader = new Loader('/does/not/exist.xml');

        $this->setExpectedException(
            'Phine\\Country\\Exception\\XmlException',
            'failed to load external entity'
        );

        $loader->loadCountries();
    }

    /**
     * Make sure that we can retrieve a specific subdivision.
     *
     * In addition to verifying that the subdivision is returned, we also need
     * to make sure that all of the data has been properly set. Also, if a
     * subdivision is not found, nothing (`null`) should be returned.
     */
    public function testLoadSubdivision()
    {
        $this->checkSubdivision($this->loader->loadSubdivision('US-CA'));

        $this->assertNull(
            $this->loader->loadSubdivision('TEST'),
            'No subdivision should be returned.'
        );
    }

    /**
     * Make sure that we can retrieve all of the subdivisions.
     *
     * In addition to being able to retrieve all subdivisions, we should also
     * be able to retrieve all subdivisions of a specific country. If there are
     * no subdivisions available, an empty array should be returned.
     */
    public function testLoadSubdivisions()
    {
        $subdivisions = $this->loader->loadSubdivisions();

        $this->assertCount(
            3771,
            $subdivisions,
            'All parent subdivisions should be returned.'
        );

        $this->checkSubdivision($subdivisions['US-CA']);

        $subdivisions = $this->loader->loadSubdivisions('US');

        $this->assertCount(
            57,
            $subdivisions,
            'Only the subdivisions for "US" should be returned.'
        );

        $this->checkSubdivision($subdivisions['US-CA']);
    }

    /**
     * Creates a new `Loader` instance for testing.
     */
    protected function setUp()
    {
        $this->loader = new Loader();
    }

    /**
     * Checks that the "US" country has had its values properly set.
     */
    private function checkCountry(Country $country)
    {
        $this->assertEquals(
            'US',
            $country->getAlpha2Code(),
            'The alpha-2 code should be set.'
        );

        $this->assertEquals(
            'USA',
            $country->getAlpha3Code(),
            'The alpha-3 code should be set.'
        );

        $this->assertEquals(
            'United States of America',
            $country->getLongName(),
            'The long name should be set.'
        );

        $this->assertEquals(
            840,
            $country->getNumericCode(),
            'The numeric code should be set.'
        );

        $this->assertEquals(
            'United States',
            $country->getShortName(),
            'The short name should be set.'
        );
    }

    /**
     * Checks that the "US-CA" subdivision has had its values properly set.
     */
    private function checkSubdivision(Subdivision $subdivision)
    {
        $this->assertEquals(
            'US-CA',
            $subdivision->getCode(),
            'The code should be set.'
        );

        $this->assertEquals(
            'California',
            $subdivision->getName(),
            'The name should be set.'
        );
    }
}
