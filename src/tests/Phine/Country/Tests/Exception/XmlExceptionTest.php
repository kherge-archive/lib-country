<?php

namespace Phine\Country\Tests\Exception;

use DOMDocument;
use Phine\Country\Exception\XmlException;
use PHPUnit_Framework_TestCase as TestCase;

/**
 * Tests the methods in the {@link XmlException} class.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class XmlExceptionTest extends TestCase
{
    /**
     * Make sure that the errors are properly formatted and consumed.
     */
    public function testCreateUsingErrors()
    {
        $internal = libxml_use_internal_errors(true);
        $file = tempnam(sys_get_temp_dir(), 'country');

        file_put_contents($file, '<');

        $doc = new DOMDocument();
        @$doc->load($file);

        $errors = libxml_get_errors();

        libxml_use_internal_errors($internal);

        $this->assertEquals(
            <<<MESSAGE
An error was encountered reading an XML document:
[Fatal] [line 1] [column 2] StartTag: invalid element name in "$file".

MESSAGE
            ,
            XmlException::createUsingErrors($errors)->getMessage(),
            'All errors should be present and properly formatted.'
        );
    }
}
