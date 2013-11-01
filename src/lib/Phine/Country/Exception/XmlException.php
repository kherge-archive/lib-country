<?php

namespace Phine\Country\Exception;

use libXMLError;
use Phine\Exception\Exception;

/**
 * Exception thrown for XML related errors.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class XmlException extends Exception
{
    /**
     * Creates a new exception using an array of `libXMLError` instances.
     *
     * @param libXMLError[] $errors A list of errors.
     *
     * @return XmlException A new exception.
     */
    public static function createUsingErrors(array $errors)
    {
        $message = "An error was encountered reading an XML document:\n";

        foreach ($errors as $error) {
            switch ($error->level) {
                case LIBXML_ERR_ERROR:
                    $message .= '[Error] ';
                    break;
                case LIBXML_ERR_FATAL:
                    $message .= '[Fatal] ';
                    break;
                case LIBXML_ERR_WARNING:
                    $message .= '[Warning] ';
                    break;
            }

            $message .= sprintf(
                "[line %d] [column %d] %s in \"%s\".\n",
                $error->line,
                $error->column,
                trim($error->message),
                $error->file
            );
        }

        return new self($message);
    }
}
