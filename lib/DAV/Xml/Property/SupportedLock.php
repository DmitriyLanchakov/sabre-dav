<?php

namespace Sabre\DAV\Xml\Property;

use Sabre\DAV;
use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

/**
 * This class represents the {DAV:}supportedlock property.
 *
 * This property is defined here:
 * http://tools.ietf.org/html/rfc4918#section-15.10
 *
 * This property contains information about what kind of locks
 * this server supports.
 *
 * @copyright Copyright (C) 2007-2015 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://www.rooftopsolutions.nl/)
 * @license http://code.google.com/p/sabredav/wiki/License Modified BSD License
 */
class SupportedLock implements XmlSerializable {

    /**
     * supportsLocks
     *
     * @var bool
     */
    public $supportsLocks = false;

    /**
     * __construct
     *
     * @param bool $supportsLocks
     */
    function __construct($supportsLocks) {

        $this->supportsLocks = $supportsLocks;

    }

    /**
     * The xmlSerialize metod is called during xml writing.
     *
     * Use the $writer argument to write its own xml serialization.
     *
     * An important note: do _not_ create a parent element. Any element
     * implementing XmlSerializble should only ever write what's considered
     * its 'inner xml'.
     *
     * The parent of the current element is responsible for writing a
     * containing element.
     *
     * This allows serializers to be re-used for different element names.
     *
     * If you are opening new elements, you must also close them again.
     *
     * @param Writer $writer
     * @return void
     */
    function xmlSerialize(Writer $writer) {

        if (!$this->supportsLocks) return null;

        $writer->writeElement('{DAV:}lockentry', [
            '{DAV:}lockscope' => ['{DAV:}exclusive' => null],
            '{DAV:}locktype' =>  ['{DAV:}write' => null],
        ]);
        $writer->writeElement('{DAV:}lockentry', [
            '{DAV:}lockscope' => ['{DAV:}shared' => null],
            '{DAV:}locktype' =>  ['{DAV:}write' => null],
        ]);

    }
}
