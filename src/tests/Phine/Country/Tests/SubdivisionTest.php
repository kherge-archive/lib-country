<?php

namespace Phine\Country\Tests;

use Phine\Country\Subdivision;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods in the {@link Subdivision} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class SubdivisionTest extends TestCase
{
    /**
     * The subdivision instance being tested.
     *
     * @var Subdivision
     */
    private $subdivision;

    /**
     * Make sure that we can retrieve the code.
     */
    public function testGetCode()
    {
        $this->assertEquals(
            'TS-TST',
            $this->subdivision->getCode(),
            'The code "TS-TST" should be returned.'
        );
    }

    /**
     * Make sure that we can retrieve the name.
     */
    public function testGetName()
    {
        $this->assertEquals(
            'Test Case',
            $this->subdivision->getName(),
            'The name "Test Case" should be returned.'
        );
    }

    /**
     * Creates a new `Subdivision` instance for testing.
     */
    protected function setUp()
    {
        $this->subdivision = new Subdivision(
            'TS-TST',
            'Test Case'
        );
    }
}
